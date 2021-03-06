<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Creditclients extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => [
            'type'           => 'INT',
            'unsigned'       => true,
            'auto_increment' => true
            ],
            'client_id'   => [
            'type'           => 'INT',
            'null' => false
            ], 
            'produit_id'   => [
            'type'           => 'INT',
            'null' => false
            ], 
            'reference'   => [
            'type'           => 'TEXT',
            'default' => 0
            ], 
            'montant'   => [
            'type'           => 'FLOAT',
            'default' => 0
            ], 
            'qt'   => [
            'type'           => 'FLOAT',
            'default' => 0
            ], 
            'recette_id'   => [
            'type'           => 'INT',
            'null' => false
            ], 
            'valide'         => [
            'type'           => 'boolean',
            'default'        => false
            ],
            'cloture'         => [
            'type'           => 'boolean',
            'default'        =>  false
            ],
            'created_at datetime DEFAULT CURRENT_TIMESTAMP',
            'updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',

        ]);
        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('creditclients');
    }

    public function down()
    {
        //
    }
}
