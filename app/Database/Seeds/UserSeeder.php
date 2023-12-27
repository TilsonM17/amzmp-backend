<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'email' => 'admin@admin.com',
            'password'    => 'admin',
        ];
        
        $this->db->table('user')->insert($data);
    }
}