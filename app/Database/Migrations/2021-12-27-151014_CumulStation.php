<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CumulStation extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => [
            'type'           => 'INT',
            'unsigned'       => true,
            'auto_increment' => true
            ],
            'station_id'   => [
            'type'           => 'INT',
            'null' => false
            ],  
            'cumul'   => [
            'type'           => 'FLOAT',
            'default' => 0
            ], 
            'date_recette'   => [
            'type'           => 'DATE',
            'null' => false
            ], 
            'recette_id'   => [
            'type'           => 'DATE',
            'null' => false
            ], 
            'created_at datetime DEFAULT CURRENT_TIMESTAMP',
            'updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',

        ]);
        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('cumulStation');
    }

    public function down()
    {
        //
    }
}
