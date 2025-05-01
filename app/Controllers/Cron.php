<?php

namespace App\Controllers;

class Cron extends BaseController
{

    /**
     * Generate Sitemap.xml
     * @return void
     */
    private function generateSitemap(): void
    {
        // MAIN PAGES
        $main_pages = [
            ['/', '2024-04-07', 'monthly', '1.0'],
            ['/instructors', '2024-04-07', 'monthly', '0.8'],
            ['/reviews', '2024-04-07', 'monthly', '0.8'],
            ['/q-and-a', '2024-04-07', 'monthly', '0.6'],
            ['/packages', '2024-04-07', 'monthly', '0.7'],
            ['/contact', '2024-04-07', 'monthly', '0.8'],
            ['/blog', '2024-05-01', 'weekly', '0.5']
        ];
        $languages  = [
            '',
            '/en',
            '/th',
            '/ja',
        ];
        $xml        = [];
        foreach ($main_pages as $page) {
            foreach ($languages as $lang) {
                $xml[] = [
                    'loc'        => base_url($lang . $page[0]),
                    'lastmod'    => $page[1],
                    'changefreq' => $page[2],
                    'priority'   => $page[3],
                ];
            }
        }
        // BLOG PAGES
        $blog_url           = getenv('BLOG_URL');
        $category_ids       = [
            getenv('BLOG_EN_ID') => '/en/blog/view/',
            getenv('BLOG_TH_ID') => '/th/blog/view/',
            getenv('BLOG_JA_ID') => '/ja/blog/view/',
        ];
        foreach ($category_ids as $id => $path) {
            $url    = $blog_url . 'posts?context=embed&per_page=50&categories=' . $id;
            try {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_HEADER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
                $response   = curl_exec($ch);
                $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
                $body       = substr($response, $headerSize);
                $posts      = json_decode($body, true);
                foreach ($posts as $post) {
                    $published = strtotime(substr(@$post['date'], 0, 10));
                    $age       = (time() - $published) / 86400;
                    $priority  = 0.5;
                    if ($age < 180) {
                        $priority = 0.7;
                    } elseif ($age < 730) { // 2 years
                        $priority = 0.6;
                    }
                    $xml[]     = [
                        'loc'        => base_url($path . $post['id']),
                        'lastmod'    => date('Y-m-d', $published),
                        'changefreq' => 'monthly',
                        'priority'   => $priority,
                    ];
                }
                curl_close($ch);
            } catch (\Exception $e) {
                continue;
            }
        }
        $final_xml = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">' . PHP_EOL;
        foreach ($xml as $item) {
            $final_xml .= '<url>';
            foreach ($item as $key => $value) {
                $final_xml .= '<' . $key . '>' . $value . '</' . $key . '>' . PHP_EOL;
            }
            $final_xml .= '</url>' . PHP_EOL;
        }
        $final_xml .= '</urlset>';
        $path       = str_replace('writable', 'public', WRITEPATH . 'sitemap.xml');
        file_put_contents($path, $final_xml);
    }

    /**
     * Cronjob to run weekly
     * @return void
     */
    public function weekly(): void
    {
        $this->generateSitemap();
    }
}