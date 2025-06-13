<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class Home extends BaseController
{

    /**
     * Retrieve category ID and blog URL for the blog
     * @param $locale
     * @return array
     */
    private function getBlogConfig($locale): array
    {
        $category_id = getenv('BLOG_EN_ID');
        switch ($locale) {
            case 'th':
                $category_id = getenv('BLOG_TH_ID');
                break;
            case 'ja':
                $category_id = getenv('BLOG_JA_ID');
                break;
        }
        return [
            'category_id' => $category_id,
            'blog_url'    => getenv('BLOG_URL')
        ];
    }

    /**
     * Format the date in the selected locale format
     * @param string $locale
     * @param string $date
     * @return string
     */
    private function formatDate(string $locale, string $date): string
    {
        $date = substr($date, 0, 10);
        if ('th' == $locale) {
            $months_in_thai = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
            $time  = strtotime($date);
            $date  = date('j', $time);
            $month = intval(date('m', $time))-1;
            $year  = intval(date('Y', $time))+543;
            return $date . ' ' . $months_in_thai[$month] . ' ' . $year;
        } else if ('ja' == $locale) {
            return date('Y年m月d日', strtotime($date));;
        }
        return date('d M Y', strtotime($date));
    }

    /**
     * Strip tags and remove [...] from the excerpt
     * Please note that the word count is set at WordPress, theme's file, functions.php
     * @param string $excerpt
     * @return string
     */
    private function fixExcerpt(string $excerpt): string
    {
        $excerpt = strip_tags($excerpt);
        return trim(str_replace('[&hellip;]', '', $excerpt));
    }

    /**
     * Call cURL
     * @param string $url
     * @param string $method
     * @return array
     */
    private function callCurl(string $url, string $method = 'GET'): array
    {
        // cURL
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_HEADER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
            $response   = curl_exec($ch);
            $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            $headers    = substr($response, 0, $headerSize);
            $body       = substr($response, $headerSize);
            curl_close($ch);
            return [
                'headers' => $headers,
                'body'    => json_decode($body, true)
            ];
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * Format blog posts
     * @param $url
     * @param $locale
     * @return array
     */
    private function retrieveBlogPosts($url, $locale): array
    {
        $response    = $this->callCurl($url);
        $posts       = $response['body'];
        $headers     = $response['headers'];
        $array_posts = [];
        $tag_list    = [];
        $media_list  = [];
        $author_list = [];
        if (isset($posts[0])) {
            // POSTS
            $tags    = [];
            $media   = [];
            $authors = [];
            foreach ($posts as $post) {
                $array_posts[] = [
                    'url'      => base_url($locale . '/blog/view/' . $post['id'] . '#' . urldecode($post['slug'])),
                    'title'    => $post['title']['rendered'],
                    'author'   => $post['author'],
                    'date'     => $this->formatDate($locale, $post['date']),
                    'excerpt'  => $this->fixExcerpt($post['excerpt']['rendered']),
                    'tag_ids'  => $post['tags'],
                    'media_id' => $post['featured_media']
                ];
                if (!empty($post['tags'])) {
                    foreach ($post['tags'] as $tag) {
                        $tags[] = $tag;
                    }
                }
                if (!empty($post['featured_media'])) {
                    $media[] = $post['featured_media'];
                }
                $authors[] = $post['author'];
            }
            $tags    = array_unique($tags);
            $media   = array_unique($media);
            $authors = array_unique($authors);
            $config  = $this->getBlogConfig($locale);
            // TAGS
            if (!empty($tags)) {
                $tag_count = count($tags);
                $per_page  = 30;
                $num_call  = ceil($tag_count/$per_page);
                for ($c = 0; $c < $num_call; $c++) {
                    $start              = $c * $per_page;
                    $tags_for_this_page = array_slice($tags, $start, $per_page);
                    $response = $this->callCurl($config['blog_url'] . 'tags?per_page=' . $per_page . '&include=' . implode(',', $tags_for_this_page));
                    $raw_tags = $response['body'] ?? [];
                    foreach ($raw_tags as $tag) {
                        if (isset($tag['id'], $tag['slug'])) {
                            $tag_list[$tag['id']] = $tag['slug'];
                        }
                    }
                }
            }
            // MEDIA
            if (!empty($media)) {
                $response  = $this->callCurl($config['blog_url'] . 'media?include=' . implode(',', $media));
                $raw_media = $response['body'];
                foreach ($raw_media as $media_item) {
                    $media_list[$media_item['id']] = $media_item['media_details']['sizes']['thumbnail']['source_url'];
                }
            }
            // AUTHORS
            if (!empty($authors)) {
                $response    = $this->callCurl($config['blog_url'] . 'users?include=' . implode(',', $authors));
                $raw_authors = $response['body'];
                foreach ($raw_authors as $author) {
                    $author_list[$author['id']] = $author['name'];
                }
            }
        }
        $header_fields = explode("\n", $headers);
        $total_posts   = 0;
        $total_pages   = 0;
        foreach ($header_fields as $field) {
            $data = explode(':', $field);
            if ('x-wp-total' == strtolower($data[0])) {
                $total_posts = $data[1];
            }
            if ('x-wp-totalpages' == strtolower($data[0])) {
                $total_pages = $data[1];
            }
        }
        return [
            'posts'       => $array_posts,
            'tags'        => $tag_list,
            'media'       => $media_list,
            'authors'     => $author_list,
            'total_pages' => $total_pages,
            'total_posts' => $total_posts,
        ];
    }

    /**
     * Home page
     * @return string
     */
    public function index(): string
    {
        $locale = $this->request->getLocale();
        $data   = [
            'page'   => lang('Theme.navigations.home'),
            'handle' => 'home',
            'locale' => $locale
        ];
        return view('home', $data);
    }

    /**
     * Reviews page
     * @return string
     */
    public function reviews(): string
    {
        $locale = $this->request->getLocale();
        $data   = [
            'page'   => lang('Theme.navigations.reviews'),
            'handle' => 'reviews',
            'locale' => $locale
        ];
        return view('reviews', $data);
    }

    /**
     * Instructors page
     * @return string
     */
    public function instructors(): string
    {
        $locale = $this->request->getLocale();
        $data   = [
            'page'   => lang('Theme.navigations.instructors'),
            'handle' => 'instructors',
            'locale' => $locale
        ];
        return view('instructors', $data);
    }

    /**
     * Contact page
     * @return string
     */
    public function contact(): string
    {
        $locale = $this->request->getLocale();
        $data   = [
            'page'   => lang('Theme.navigations.contact'),
            'handle' => 'contact',
            'locale' => $locale
        ];
        return view('contact', $data);
    }

    /**
     * Q and A page
     * @return string
     */
    public function q_and_a(): string
    {
        $locale = $this->request->getLocale();
        $data   = [
            'page'   => lang('Theme.navigations.q-and-a'),
            'handle' => 'q-and-a',
            'locale' => $locale
        ];
        return view('q-and-a', $data);
    }

    /**
     * Packages page
     * @return string
     */
    public function packages(): string
    {
        $locale = $this->request->getLocale();
        $data   = [
            'page'   => lang('Theme.navigations.packages'),
            'handle' => 'packages',
            'locale' => $locale
        ];
        return view('packages', $data);
    }

    /**
     * Form submission handler
     * @return string
     */
    public function formSubmission(): string
    {
        $name    = $this->request->getPost('name');
        $from    = $this->request->getPost('email');
        $phone   = $this->request->getPost('phone');
        $message = $this->request->getPost('message');
        $to      = getenv('CONTACT_FORM_EMAIL');
        $fr      = getenv('CONTACT_FORM_FROM');
        // Send the email
        $email = Services::email();
        $email->setTo($to);
        $email->setFrom($fr);
        $email->setSubject('Contact Form Submission');
        $email->setMessage("Contact Form Submission\n\nName: $name\nEmail: $from\nPhone: $phone\nMessage: $message");
        if ($email->send()) {
            return 'OK';
        } else {
            // Set 500 status code
            $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
            return lang('Contact.responses.error');
        }
    }

    /******************************************* BLOG *****************************************************************/

    /**
     * Blog page
     * @return string
     */
    public function blog(): string
    {
        $locale      = $this->request->getLocale();
        $config      = $this->getBlogConfig($locale);
        $page        = $this->request->getVar('page') ?? 1;
        $category_id = $config['category_id'];
        $blog_url    = $config['blog_url'] . 'posts?page=' . $page . '&per_page=10&categories=' . $category_id;
        $contents    = $this->retrieveBlogPosts($blog_url, $locale);
        $data        = [
            'page'        => lang('Theme.navigations.blog'),
            'handle'      => 'blog',
            'mode'        => 'list',
            'locale'      => $locale,
            'posts'       => $contents['posts'],
            'tags'        => $contents['tags'],
            'media'       => $contents['media'],
            'authors'     => $contents['authors'],
            'q'           => null,
            'pg'          => $page,
            'tag'         => null,
            'total_pages' => $contents['total_pages'],
            'total_posts' => $contents['total_posts'],
        ];
        return view('blog_list', $data);
    }

    /**
     * Search blog
     * @return string
     */
    public function blog_search(): string
    {
        $locale      = $this->request->getLocale();
        $config      = $this->getBlogConfig($locale);
        $search      = $this->request->getVar('q');
        $page        = $this->request->getVar('page') ?? 1;
        $category_id = $config['category_id'];
        $blog_url    = $config['blog_url'] . 'posts?page=' . $page . '&per_page=10&categories=' . $category_id . '&search=' . $search;
        $contents    = $this->retrieveBlogPosts($blog_url, $locale);
        $data        = [
            'page'        => lang('Theme.navigations.blog'),
            'handle'      => 'blog',
            'mode'        => 'search',
            'url'         => base_url($locale . '/blog/search?q=' . $search),
            'locale'      => $locale,
            'posts'       => $contents['posts'],
            'tags'        => $contents['tags'],
            'media'       => $contents['media'],
            'authors'     => $contents['authors'],
            'q'           => $search,
            'pg'          => $page,
            'tag'         => null,
            'total_pages' => $contents['total_pages'],
            'total_posts' => $contents['total_posts'],
        ];
        return view('blog_list', $data);
    }

    /**
     * View blog tags
     * @param int $tag_id
     * @return string
     */
    public function blog_tag(int $tag_id): string
    {
        $locale      = $this->request->getLocale();
        $config      = $this->getBlogConfig($locale);
        $page        = $this->request->getVar('page') ?? 1;
        $category_id = $config['category_id'];
        $blog_url    = $config['blog_url'] . 'posts?page=' . $page . '&per_page=10&categories=' . $category_id . '&tags=' . $tag_id;
        $contents    = $this->retrieveBlogPosts($blog_url, $locale);
        $tag_url     = $config['blog_url'] . 'tags/' . $tag_id;
        $tag_data    = $this->callCurl($tag_url);
        $tag_slug    = @$tag_data['body']['slug'];
        $data        = [
            'page'        => lang('Theme.navigations.blog'),
            'handle'      => 'blog',
            'mode'        => 'tag',
            'url'         => base_url($locale . '/blog/tag/' . $tag_id),
            'locale'      => $locale,
            'posts'       => $contents['posts'],
            'tags'        => $contents['tags'],
            'media'       => $contents['media'],
            'authors'     => $contents['authors'],
            'q'           => null,
            'pg'          => $page,
            'tag'         => $tag_slug,
            'total_pages' => $contents['total_pages'],
            'total_posts' => $contents['total_posts'],
        ];
        return view('blog_list', $data);
    }

    /**
     * View the blog post itself
     * @param int $id
     * @return string
     */
    public function blog_view(int $id) : string
    {
        $locale     = $this->request->getLocale();
        $config     = $this->getBlogConfig($locale);
        $url        = $config['blog_url'] . 'posts/' . $id;
        $response   = $this->callCurl($url);
        $post_data  = $response['body'];
        $post_title = $post_data['title']['rendered'];
        $tag_ids    = $post_data['tags'];
        $tags       = [];
        if (!empty($tag_ids)) {
            $tag_url  = $config['blog_url'] . 'tags?include=' . implode(',', $tag_ids);
            $raw_tags = $this->callCurl($tag_url);
            if (!empty($raw_tags['body']) && is_array($raw_tags['body'])) {
                foreach ($raw_tags['body'] as $tag) {
                    $tags[$tag['id']] = $tag['name'];
                }
            }
        }
        $seo_image = '';
        if (!empty($post_data['featured_media'])) {
            $media_url = $config['blog_url'] . 'media/' . $post_data['featured_media'];
            $raw_media = $this->callCurl($media_url);
            if (!empty($raw_media['body'])) {
                $seo_image = $raw_media['body']['media_details']['sizes']['medium']['source_url'] ?? $raw_media['body']['media_details']['sizes']['full']['source_url'];
                if (empty($seo_image)) {
                    $seo_image = $raw_media['body']['media_details']['sizes']['thumbnail']['source_url'] ?? null;
                }
            }
        }
        $user_url  = $config['blog_url'] . 'users/' . $post_data['author'];
        $raw_user  = $this->callCurl($user_url);
        $user_name = lang('Theme.author');
        if (!empty($raw_user['body'])) {
            $user_name = $raw_user['body']['name'];
        }
        $data = [
            'page'            => $post_title . ' - ' . lang('Theme.navigations.blog'),
            'handle'          => 'blog',
            'mode'            => 'view',
            'url'             => base_url($locale . '/blog/view/' . $id . '#' . $post_data['slug']),
            'date'            => $this->formatDate($locale, $post_data['date']),
            'locale'          => $locale,
            'title'           => $post_title,
            'post'            => $post_data,
            'tags'            => $tags,
            'seo_description' => $this->fixExcerpt($post_data['excerpt']['rendered']),
            'seo_image'       => $seo_image,
            'user_name'       => $user_name,
        ];
        return view('blog_view', $data);
    }
}
