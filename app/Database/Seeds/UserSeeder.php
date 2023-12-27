<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'email' => 'admin@admin.com',
            'password'    => password_hash('admin', PASSWORD_BCRYPT),
        ];

        $this->db->table('users')->insert($data);
    }
}
