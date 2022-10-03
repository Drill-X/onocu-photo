<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        // IMPORTANT TODO: Authenticate user
        // Get a list of all users
        $users = model('UserModel');
        $user_list = $users->findAll();

        return view('admin_panel', $user_list);
    }

    public function addUser() 
    {
        return;
    }

    public function delUser()
    {
        return;
    }

    public function modUser()
    {
        return;
    }
}
