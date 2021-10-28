<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Depenses extends Migration
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
            'qt'   => [
            'type'           => 'FLOAT',
            'null' => false
            ], 
            'type_paiement'   => [
            'type'           => 'INT',
            'null' => false
            ], 
            'montant'   => [
            'type'           => 'FLOAT',
            'default' => 0
            ], 
            'recette_id'   => [
            'type'           => 'INT',
            'null' => false
            ], 
            'detail'   => [
            'type'           => 'TEXT',
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
        $this->forge->createTable('depenses');
    }

    public function down()
    {
        //
    }
}
