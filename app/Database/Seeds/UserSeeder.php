<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Shield\Entities\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = model('UserModel');
        $user = new User([
            'username' => 'admin',
            'email'    => null,
            'password' => getenv('DEFAULT_ADMIN_PASSWORD'),
        ]);
        
        $user->addGroup('superadmin');

        $users->save($user);
    }
}