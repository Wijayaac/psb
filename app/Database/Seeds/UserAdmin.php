<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserAdmin extends Seeder
{
    public function run()
    {
        //admin data seed
        $salt = uniqid('', true);
        $data = [
            'id' => 1,
            'username' => 'adminpsb',
            'password' => md5('123456') . $salt,
            'salt' => $salt,
            'role' => 1,
        ];

        $this->db->table('user')->insert($data);
    }
}
