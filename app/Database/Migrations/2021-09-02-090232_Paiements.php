<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Paiements extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => [
            'type'           => 'INT',
            'unsigned'       => true,
            ],
            'recette_id'     => [
                'type'           => 'INT',
                'constraint' => 11, 'unsigned' => true, 'default' => 0
            ],
            'client_id'     => [
                'type'           => 'INT',
                'constraint' => 11, 'unsigned' => true, 'default' => 0
            ],
            'reference'   => [
            'type'           => 'TEXT',
            'null' => true
            ],
            'type_paiement'   => [
            'type'           => 'INT',
            'null' => true
            ],
            'montant'   => [
            'type'           => 'Float',
            'default' => 0
            ],
            'commission'   => [
            'type'           => 'Float',
            'default' => 0
            ],
            'montant_restant'   => [
            'type'           => 'Float',
            'default' => 0
            ],
            'quantite'   => [
            'type'           => 'Float',
            'default' => 0
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
        $this->forge->addForeignKey('client_id', 'clients', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('recette_id', 'recettes', 'id', 'CASCADE', 'CASCADE');

        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('paiements');
    
    }

    public function down()
    {
        //
    }
}
