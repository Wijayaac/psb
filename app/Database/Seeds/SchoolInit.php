<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolInit extends Seeder
{
    public function run()
    {
        // schools data seed
        $data = [
            [
                'id' => 1,
                'name' => 'Davidson College',
            ],
            [
                'id' => 2,
                'name' => 'University of Illinois',
            ],
            [
                'id' => 3,
                'name' => 'Northwestern University',
            ],
            [
                'id' => 4,
                'name' => 'DePauw University',
            ],
            [
                'id' => 5,
                'name' => 'Deli University',
            ],

        ];
        foreach ($data as $item) {
            // inserting data into database table school
            $this->db->table('school')->insert($item);
        }
    }
}
