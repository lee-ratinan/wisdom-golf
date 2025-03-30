<?php

namespace App\Controllers;

class Home extends BaseController
{

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
}
