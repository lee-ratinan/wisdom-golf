<?php

namespace App\Controllers;

class Home extends BaseController
{

    /**
     * Home page - this is the only page
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
}
