<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Moyenpaiement extends Migration
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
            'created_at datetime DEFAULT CURRENT_TIMESTAMP',
            'updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',

        ]);
        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('moyenpaiements');
    
    }


    public function down()
    {
        //
    }
}
