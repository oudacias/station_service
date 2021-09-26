<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pompes extends Migration
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
            'station_id'         => [
            'type'           => 'INT',
            'null'        => false
            ],
            'reservoir_id'         => [
            'type'           => 'INT',
            'null'        => false
            ],
            
            'created_at datetime DEFAULT CURRENT_TIMESTAMP',
            'updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',

        ]);

        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('pompes');
    
    }

    public function down()
    {
        //
    }
}
