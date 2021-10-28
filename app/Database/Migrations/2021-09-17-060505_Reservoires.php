<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reservoires extends Migration
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
            'stock_initial'         => [
            'type'           => 'FLOAT',
            'null'        => false
            ],
            'station_id'         => [
            'type'           => 'INT',
            'null'        => false
            ],
            'produit_id'         => [
            'type'           => 'INT',
            'null'        => false
            ],
            'actif'         => [
            'type'           => 'boolean',
            'default'        => 0
            ],
            
            'created_at datetime DEFAULT CURRENT_TIMESTAMP',
            'updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',

        ]);

        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('reservoires');
    
    }


    public function down()
    {
        //
    }
}
