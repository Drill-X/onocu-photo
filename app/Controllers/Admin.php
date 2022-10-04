<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        // IMPORTANT TODO: Authenticate user
        // Get a list of all users
        $users = model('UserModel');
        $data = ['user_list' => $users->findAll()];

        return view('admin_panel', $data);
    }

    public function addUser() 
    {
        return;
    }

    public function delUser()
    {
        $users = model('UserModel');

        if ($this->request->getMethod() === 'post' && $this->validate(['id' => 'required|integer'])) {
            // TODO: Finish later
        }

        return;
    }

    public function modUser()
    {
        return;
    }
}
