<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMigration extends Migration
{
    public function up()
    {
        //add user table into DB
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'photo varchar(255) NOT NULL DEFAULT "untitled.png"',
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'salt' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'role' => [
                'type' => 'INT',
                'constraint' => 2,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 8,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        //drop table used when migration refresh
        $this->forge->dropTable('user');
    }
}
