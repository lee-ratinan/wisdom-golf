<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

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
}
