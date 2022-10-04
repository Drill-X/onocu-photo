<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $users = model('UserModel');
        $data = ['user_list' => $users->findAll()];

        return view('admin_panel', $data);
    }

    public function addUser() 
    {
        // This function should create a user with a username and add it to the database
    }

    public function delUser()
    {
        $users = model('UserModel');

        if ($this->validate(['ueserId' => 'required|is_natural'])) {
            $id = $this->request->getPost('userId');
            $users->delete($id, true);
            return redirect()->route('admin')->withInput()->with('message', 'User successfully deleted!')->withCookies();
        }

        return redirect()->route('admin')->withInput()->with('error', $this->validator->getErrors())->withCookies();
    }

    public function createMagicLink($userId) 
    {

    }

    public function modUser()
    {
        return;
    }
}
