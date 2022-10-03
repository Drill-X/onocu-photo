<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Shield\Entities\User;

class UserSeeder extends Seeder
{
    public function run()
    {

        // Create admin user
        $users = model('UserModel');
        $user = new User([
            'username' => 'admin',
            'email'    => '',
            'password' => getenv('DEFAULT_ADMIN_PASSWORD'),
        ]);
        $users->save($user);

        $user = $users->findById($users->getInsertID());
        $user->addGroup('superadmin');

        
        // Create test (normal) user
        $users = model('UserModel');
        $user = new User([
            'username' => 'test_user',
            'email'    => '',
            'password' => getenv('DEFAULT_ADMIN_PASSWORD'),
        ]);
        $users->save($user);

        $user = $users->findById($users->getInsertID());
        $users->addToDefaultGroup($user);
    }
}