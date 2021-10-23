<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserInfo extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => [
                'type'           => 'INT',
                'constraint' => 11, 'unsigned' => true, 'default' => 0
            ],
            'nom'   => [
                'type'           => 'TEXT',
                'null' => false
            ],
            'prenom'   => [
                'type'           => 'TEXT',
                'null' => false
            ],
            'station_id'         => [
                'type'           => 'INT',
                'constraint' => 11, 'unsigned' => true, 'default' => 0
            ],

        ]);
        $this->forge->addPrimaryKey('id', true);
        $this->forge->addForeignKey('id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('station_id', 'stations', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user_info');
    }

    public function down()
    {
        //
    }
}
