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
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
            $response = curl_exec($ch);
            curl_close($ch);
            return json_decode($response, true);
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
        $posts = $this->callCurl($url);
        $array = [];
        $tags  = [];
        $media = [];
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $array[] = [
                    'url'      => base_url($locale . '/blog/view/' . $post['slug'] . '/' . $post['id']),
                    'title'    => @$post['title']['rendered'],
                    'date'     => @date('d M Y', strtotime(substr($post['date'], 0, 10))),
                    'excerpt'  => @$post['excerpt']['rendered'],
                    'tag_ids'  => @$post['tags'],
                    'media_id' => @$post['featured_media']
                ];
                if (!empty($post['tags'])) {
                    foreach ($post['tags'] as $tag) {
                        $tags[] = $tag;
                    }
                }
                if (!empty($post['featured_media'])) {
                    $media[] = $post['featured_media'];
                }
            }
            $tags  = array_unique($tags);
            $media = array_unique($media);
        }
        return [
            'posts' => $array,
            'tags'  => $tags,
            'media' => $media
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
        // TAGS
        $tags        = [];
        if (!empty($contents['tags'])) {
            $raw_tags    = $this->callCurl($config['blog_url'] . 'tags?include=' . implode(',', $contents['tags']));
            foreach ($raw_tags as $tag) {
                $tags[$tag['id']] = $tag['slug'];
            }
        }
        // MEDIA
        $media_list = [];
        if (!empty($contents['media'])) {
            $raw_media = $this->callCurl($config['blog_url'] . 'media?include=' . implode(',', $contents['media']));
            foreach ($raw_media as $media_item) {
                $media_list[$media_item['id']] = $media_item['media_details']['sizes']['thumbnail']['source_url'];
            }
        }
        $data        = [
            'page'   => lang('Theme.navigations.blog'),
            'handle' => 'blog',
            'mode'   => 'list',
            'locale' => $locale,
            'posts'  => $contents['posts'],
            'tags'   => $tags,
            'media'  => $media_list,
        ];
        return view('blog_list', $data);
    }

    /**
     * @param string $slug
     * @param int $id
     * @return string
     */
    public function blog_view(string $slug, int $id) : string
    {
        $locale = $this->request->getLocale();
        $data   = [
            'page'    => lang('Theme.navigations.blog'),
            'handle'  => 'blog',
            'mode'    => 'view',
            'config'  => $this->getBlogConfig($locale),
            'locale'  => $locale,
            'blog_id' => $id
        ];
        return view('blog_read', $data);
    }
}
