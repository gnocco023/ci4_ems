<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CenterSeeder extends Seeder
{
    public function run()
    {



        $data = [
            [
                'name' => 'Bago NCDC',
                'description' => '',
                'center_type_id' => 1,
            ],
            [
                'name' => 'Hindi Makita CDC',
                'description' => '',
                'center_type_id' => 1,
            ],
            [
                'name' => 'Ronald Mcdonald CDC',
                'description' => 'A privately funded child development center',
                'center_type_id' => 2,
            ],
        ];


        $this->db->table('tbl_center')->insertBatch($data);
    }
}
