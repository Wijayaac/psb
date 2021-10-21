<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RegisterMigration extends Migration
{
    public function up()
    {
        // Create table register 
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 8,
                'unsigned' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => 50,

            ],
            'address' => [
                'type' => 'TEXT',
                'constraint' => 500,

            ],
            'code' => [
                'type' => 'INT',
                'constraint' => 7,

            ],
            'school' => [
                'type' => 'INT',
                'constraint' => 2,

            ],
            'status' => [
                'type' => 'INT',
                'constraint' => 1,

            ],
            'transcript' => [
                'type' => 'VARCHAR',
                'constraint' => 50,

            ],
            'created_at DATETIME default CURRENT_TIMESTAMP',
            'updated_at DATETIME default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('register');
    }

    public function down()
    {
        // Drop table register
        $this->forge->dropTable('register');
    }
}
