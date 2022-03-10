<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Client extends Migration
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
            'null' => true
            ],
            'actif'         => [
            'type'           => 'boolean',
            'default'        => true
            ],
            'plafond'         => [
            'type'           => 'FLOAT',
            'null' => true
            ],
            'solde'         => [
            'type'           => 'FLOAT',
            'null' => true
            ],
            'reliquat'  => [
            'type'           => 'FLOAT',
            'null' => true
            ],
            'solde_libre'  => [
            'type'           => 'FLOAT',
            'null' => true
            ],
            'solde_libre_actif'         => [
            'type'           => 'boolean',
            'default'        => false
            ],
            'station_id'  => [
            'type'           => 'INT',
            'null' => true
            ],
            'created_at datetime DEFAULT CURRENT_TIMESTAMP',
            'updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',

        ]);

        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('clients');
    
    }
    

    public function down()
    {
        //
    }
}
