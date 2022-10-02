<?php

namespace App\Controllers;

class UserAuth extends BaseController
{
    public function index()
    {
        return view('templates/header')
            . view('auth/login')
            . view('templates/footer');
    }

    public function logout()
    {
        return; // TODO
    }
    
    public function login()
    {
        return; // TODO
    }

}
