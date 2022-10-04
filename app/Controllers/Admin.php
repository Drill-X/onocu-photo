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

        if ($this->request->getMethod() === 'post' && $this->validate(['id' => 'required|integer'])) {
            $id = $this->request->getPost('id');
            $users->delete($id, true);
            return redirect()->route('admin')->withInput()->with('message', 'User successfully deleted!')->withCookies();
        }

        return redirect()->route('admin')->withInput()->with('error', 'Something went wrong!')->withCookies();
    }

    public function createMagicLink($userId) 
    {

    }

    public function modUser()
    {
        return;
    }
}
