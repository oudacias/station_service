<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Subvolucompteurs extends Migration
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
            'volucompteur_id'   => [
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
            'recette_id'   => [
            'type'           => 'INT',
            'null' => true
            ], 
            'created_at datetime DEFAULT CURRENT_TIMESTAMP',
            'updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',

        ]);
        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('subvolucompteurs');
    }

    public function down()
    {
        //
    }
}
