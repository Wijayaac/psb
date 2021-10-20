<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {

        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/login');
        }
        if ($this->session->get('role') != 1) {
            return redirect()->to('/user');
        }

        return view('view_home');
    }
}
