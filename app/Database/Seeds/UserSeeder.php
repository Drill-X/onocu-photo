<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Shield\Entities\User;

class UserSeeder extends Seeder
{
    public function run()
    {

        $users = model('UserModel');
        $admin_user = $users->findByCredentials(['username' => 'admin']);

        // Create admin user
        if(empty($admin_user)){
            $user = new User([
                'username' => 'admin',
                'email'    => '',
                'password' => getenv('DEFAULT_ADMIN_PASSWORD'),
            ]);
            $users->save($user);

            $user = $users->findById($users->getInsertID());
            $user->addGroup('superadmin');
        }
        
        // Create test (normal) user
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