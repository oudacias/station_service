<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Volucompteurs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => [
            'type'           => 'INT',
            'unsigned'       => true,
            'auto_increment' => true
            ],
            'pompe_id'   => [
            'type'           => 'INT',
            'null' => false
            ], 
            'product_id'   => [
            'type'           => 'INT',
            'null' => false
            ], 
            'compteur_initial'   => [
            'type'           => 'FLOAT',
            'default' => 0
            ], 
            'compteur_final'   => [
            'type'           => 'FLOAT',
            'default' => 0
            ], 
            'prix_unitaire'   => [
            'type'           => 'FLOAT',
            'default' => 0
            ], 
            'compteur_final1'   => [
            'type'           => 'FLOAT',
            'default' => 0
            ], 
            'prix_unitaire1'   => [
            'type'           => 'FLOAT',
            'default' => 0
            ], 
            'compteur_final2'   => [
            'type'           => 'FLOAT',
            'default' => 0
            ], 
            'prix_unitaire2'   => [
            'type'           => 'FLOAT',
            'default' => 0
            ], 
            'compteur_final3'   => [
            'type'           => 'FLOAT',
            'default' => 0
            ], 
            'prix_unitaire3'   => [
            'type'           => 'FLOAT',
            'default' => 0
            ], 
            'compteur_final4'   => [
            'type'           => 'FLOAT',
            'default' => 0
            ], 
            'prix_unitaire4'   => [
            'type'           => 'FLOAT',
            'default' => 0
            ], 
            'compteur_final5'   => [
            'type'           => 'FLOAT',
            'default' => 0
            ], 
            'prix_unitaire5'   => [
            'type'           => 'FLOAT',
            'default' => 0
            ], 
            'compteur_final6'   => [
            'type'           => 'FLOAT',
            'default' => 0
            ], 
            'prix_unitaire6'   => [
            'type'           => 'FLOAT',
            'default' => 0
            ], 
            'recette_id'   => [
            'type'           => 'INT',
            'null' => true
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
        $this->forge->createTable('volucompteurs');

    }

    public function down()
    {
        //
    }
}
