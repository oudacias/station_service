<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Listeprixproduits extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => [
            'type'           => 'INT',
            'unsigned'       => true,
            'auto_increment' => true
            ],
            'produit_id'   => [
            'type'           => 'INT',
            'null' => false
            ],  
            'prix'   => [
            'type'           => 'FLOAT',
            'default' => 0
            ], 
            'type'   => [
            'type'           => 'TEXT',
            'default' => 0
            ], 
            'date_prix_debut'   => [
            'type'           => 'DATE',
            'null' => false
            ], 
            'date_prix_fin'   => [
            'type'           => 'DATE',
            'null' => true
            ], 
            'created_at datetime DEFAULT CURRENT_TIMESTAMP',
            'updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',

        ]);
        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('listeprixproduits');
    }

    public function down()
    {
        //
    }
}
