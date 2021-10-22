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
            'station_id'  => [
                'type'           => 'INT',
                'constraint' => 11, 'unsigned' => true, 'default' => 0
            ],
            'created_at datetime DEFAULT CURRENT_TIMESTAMP',
            'updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',

        ]);
        $this->forge->addForeignKey('station_id', 'stations', 'id', 'CASCADE', 'CASCADE');

        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('clients');
    }


    public function down()
    {
        //
    }
}
