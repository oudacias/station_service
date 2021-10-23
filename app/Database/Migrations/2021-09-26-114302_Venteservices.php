<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Venteservices extends Migration
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
                'constraint' => 11, 'unsigned' => true, 'default' => 0
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
                'constraint' => 11, 'unsigned' => true, 'default' => 0
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
        $this->forge->addForeignKey('recette_id', 'recettes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('produit_id', 'produits', 'id', 'CASCADE', 'CASCADE');

        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('venteservices');
    }

    public function down()
    {
        //
    }
}
