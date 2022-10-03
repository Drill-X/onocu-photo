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
        if(is_null($admin_user)){
            $admin_user = new User([
                'username' => 'admin',
                'email'    => '',
                'password' => getenv('DEFAULT_ADMIN_PASSWORD'),
            ]);
            $users->save($admin_user);

            $admin_user = $users->findById($users->getInsertID());
            $admin_user->addGroup('superadmin');
        } else {
            $admin_user->fill([
                'username' => 'admin',
                'email' => '',
                'password' => getenv('DEFAULT_ADMIN_PASSWORD'),
            ]);
            $users->save($admin_user);
        }
        
        $test_user = $users->findByCredentials(['username' => 'testuser']);
        // Create test (normal) user
        if(is_null($test_user)){
            $testuser = new User([
                'username' => 'testuser',
                'email'    => '',
                'password' => getenv('DEFAULT_ADMIN_PASSWORD'),
            ]);
            $users->save($test_user);

            $test_user = $users->findById($users->getInsertID());
            $test_user->addGroup('user');
        } else {
            $test_user->fill([
                'username' => 'testuser',
                'email' => '',
                'password' => getenv('DEFAULT_ADMIN_PASSWORD'),
            ]);
            $users->save($test_user);
        }
    }
}