<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SchoolMigration extends Migration
{
    public function up()
    {
        // Create schools table 
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => 'true'
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'created_at DATETIME default CURRENT_TIMESTAMP',
            'updated_at DATETIME default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('school');
    }

    public function down()
    {
        // Drop table school
        $this->forge->dropTable('school');
    }
}
