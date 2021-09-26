<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Stations extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => [
            'type'           => 'INT',
            'unsigned'       => true,
            'auto_increment' => true
            ],
            'nom'   => [
            'type'           => 'TEXT',
            'null' => false
            ],
            'localisation'   => [
            'type'           => 'TEXT',
            'null' => true
            ],
            'created_at datetime DEFAULT CURRENT_TIMESTAMP',
            'updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('stations');
    
    }

    public function down()
    {
        //
    }
}
