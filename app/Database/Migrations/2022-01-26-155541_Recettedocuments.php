<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Recettedocuments extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => [
            'type'           => 'INT',
            'unsigned'       => true,
            'auto_increment' => true
            ],
            'rubrique'   => [
            'type'           => 'TEXT',
            'null' => false
            ],  
            'recette_id'   => [
            'type'           => 'INT',
            'null' => false
            ],  
            'chemin_document'   => [
            'type'           => 'TEXT',
            ], 
            'created_at datetime DEFAULT CURRENT_TIMESTAMP',
            'updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',

        ]);
        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('recettedocuments');
    }

    public function down()
    {
        //
    }
}
