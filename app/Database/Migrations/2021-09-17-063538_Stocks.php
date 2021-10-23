<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Stocks extends Migration
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
            'stock_comptable'         => [
            'type'           => 'FLOAT',
            'null'        => false
            ],
            'stock_physique'         => [
            'type'           => 'FLOAT',
            'null'        => false
            ],
            'sortie'         => [
            'type'           => 'FLOAT',
            'null'        => false
            ],
            'entree'         => [
            'type'           => 'FLOAT',
            'null'        => false
            ],
            'manquant_excedent'         => [
            'type'           => 'FLOAT',
            'null'        => false
            ],
            'reservoir_id'         => [
                'type'           => 'INT',
                'constraint' => 11, 'unsigned' => true, 'default' => 0
            ],
            'produit_id'         =>[
                'type'           => 'INT',
                'constraint' => 11, 'unsigned' => true, 'default' => 0
            ],
            'recette_id'         => [
                'type'           => 'INT',
                'constraint' => 11, 'unsigned' => true, 'default' => 0
            ],

            
            'valide'         => [
            'type'           => 'boolean',
            'default'        => false
            ],
            'cloture'         => [
            'type'           => 'boolean',
            'default'        => false
            ],
            
            'created_at datetime DEFAULT CURRENT_TIMESTAMP',
            'updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',

        ]);

        $this->forge->addPrimaryKey('id', true);
        $this->forge->addForeignKey('recette_id', 'recettes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('produit_id', 'produits', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('reservoir_id', 'reservoires', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('stocks');
    
    }

    public function down()
    {
        //
    }
}
