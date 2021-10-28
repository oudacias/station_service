<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Recette extends Migration
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
            'null' => true
            ], 
            'responsable_id'   => [
            'type'           => 'INT',
            'null' => true
            ], 
            'valide'         => [
            'type'           => 'boolean',
            'default'        => false
            ],
            'cloture'         => [
            'type'           => 'boolean',
            'default'        => false
            ],
            'volucompteur'         => [
            'type'           => 'FLOAT',
            'null' => true
            ],
            'stock'         => [
            'type'           => 'FLOAT',
            'null' => true
            ],
            'credit'         => [
            'type'           => 'FLOAT',
            'null' => true
            ],
            'paiement'         => [
            'type'           => 'FLOAT',
            'null' => true
            ],
            'ventes_services'  => [
            'type'           => 'FLOAT',
            'null' => true
            ],
            'depense'  => [
            'type'           => 'FLOAT',
            'null' => true
            ],
            'diff'  => [
            'type'           => 'FLOAT',
            'null' => true
            ],
            'recette_date'   => [
            'type'           => 'date',
            'null' => false
            ],
            
            'created_at datetime DEFAULT CURRENT_TIMESTAMP',
            'updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',

        ]);

        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('recettes');
    }

    public function down()
    {
        //
    }
}
