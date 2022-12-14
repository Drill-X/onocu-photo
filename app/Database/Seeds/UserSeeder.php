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
            $admin_user = new User([
                'username' => 'admin',
                'email'    => 'admin',
                'password' => getenv('DEFAULT_ADMIN_PASSWORD'),
            ]);
            $users->save($admin_user);

            $admin_user = $users->findById($users->getInsertID());
            $admin_user->addGroup('superadmin');
        } else {
            $admin_user->fill([
                'username' => 'admin',
                'email' => 'admin',
                'password' => getenv('DEFAULT_ADMIN_PASSWORD'),
            ]);
            $users->save($admin_user);
        }
        
        $test_user = $users->findByCredentials(['username' => 'testuser']);
        // Create test (normal) user
        if(empty($test_user)){
            $test_user = new User([
                'username' => 'testuser',
                'email'    => 'testuser',
                'password' => getenv('DEFAULT_ADMIN_PASSWORD'),
            ]);
            $users->save($test_user);

            $test_user = $users->findById($users->getInsertID());
            $test_user->addGroup('user');
        } else {
            $test_user->fill([
                'username' => 'testuser',
                'email' => 'testuser',
                'password' => getenv('DEFAULT_ADMIN_PASSWORD'),
            ]);
            $users->save($test_user);
        }
    }
}