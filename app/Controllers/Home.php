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
            'locale' => $locale
        ];
        return view('reviews', $data);
    }

    /**
     * Coaches page
     * @return string
     */
    public function coaches(): string
    {
        $locale = $this->request->getLocale();
        $data   = [
            'locale' => $locale
        ];
        return view('coaches', $data);
    }

    /**
     * Contact page
     * @return string
     */
    public function contact(): string
    {
        $locale = $this->request->getLocale();
        $data   = [
            'locale' => $locale
        ];
        return view('contact', $data);
    }
}
