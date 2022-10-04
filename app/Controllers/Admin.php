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

    /* 
     * Add a user to the database
     */
    public function addUser() 
    {
        $users = model('UserModel');

        $rules = [
            'username' => config('AuthSession')->usernameValidationRules,
            'password' => config('Auth')->passwordValidators,
        ];

        if ($this->validate($rules)) 
        {
            $user = new User([
                'username' => $this->request->getPost('username'),
                'email'    => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
            ]);
            $users->save($user);
            
            // To get the complete user object with ID, we need to get from the database
            $user = $users->findById($users->getInsertID());
            
            // Add to default group
            $users->addToDefaultGroup($user);

            return redirect()->route('admin')->withInput()->with('message', 'User successfully created!')->withCookies();
        }

        return redirect()->route('admin')->withInput()->with('errors', $this->validator->getErrors())->withCookies();
    }

    /* 
     * Delete a user from the database (by id)
     */
    public function delUser()
    {
        $users = model('UserModel');

        if ($this->validate(['userId' => 'required|is_natural'])) 
        {
            $id = $this->request->getPost('userId');
            $users->delete($id, true);
            return redirect()->route('admin')->withInput()->with('message', 'User successfully deleted!')->withCookies();
        }

        return redirect()->route('admin')->withInput()->with('errors', $this->validator->getErrors())->withCookies();
    }

    /* 
     * Create a magic link to login as a user without using a password
     */
    public function getLoginLink() 
    {

    }

    /* 
     * Modify and existing user
     */
    public function modUser()
    {
        return;
    }
}
