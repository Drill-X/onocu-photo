<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return view('templates/header')
            . view('auth/login')
            . view('templates/footer');
    }

    
    

}
