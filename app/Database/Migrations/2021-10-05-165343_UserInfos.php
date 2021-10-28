<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserInfos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => [
            'type'           => 'INT',
            'unsigned'       => true,
            'auto_increment' => true
            ],
            'user_id'         => [
            'type'           => 'INT',
            'null'        => false
            ],
            'nom'   => [
            'type'           => 'TEXT',
            'null' => false
            ],
            'prenom'   => [
            'type'           => 'TEXT',
            'null' => true
            ],
            'station_id'         => [
            'type'           => 'INT',
            'null'        => false
            ],
            'created_at datetime DEFAULT CURRENT_TIMESTAMP',
            'updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('user_infos');
    }

    public function down()
    {
        //
    }
}
