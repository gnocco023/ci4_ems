<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AccountSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'lastname' => 'Almighty',
                'firstname' => 'Bruce',
                'middlename' => '',
                'sex' => 'M',
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'password' =>  sha1('123456'),
                'service_provider_type_id' => 3
            ], [
                'lastname' => 'Alonzo',
                'firstname' => 'Bea',
                'middlename' => '',
                'sex' => 'F',
                'email' => 'teacher@gmail.com',
                'username' => 'teacher',
                'password' =>  sha1('123456'),
                'service_provider_type_id' => 1
            ], [
                'lastname' => 'Squarepants',
                'firstname' => 'Spongebob',
                'middlename' => '',
                'sex' => 'P',
                'email' => 'worker@gmail.com',
                'username' => 'worker',
                'password' =>  sha1('123456'),
                'service_provider_type_id' => 2
            ]
        ];


        $this->db->table('tbl_account')->insertBatch($data);
    }
}
