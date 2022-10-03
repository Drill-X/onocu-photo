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
            'email'    => 'admin',
            'password' => getenv('DEFAULT_ADMIN_PASSWORD'),
        ]);
        $users->save($user);

        $user = $users->findById($users->getInsertID());
        $user->addGroup('superadmin');

        
    }
}