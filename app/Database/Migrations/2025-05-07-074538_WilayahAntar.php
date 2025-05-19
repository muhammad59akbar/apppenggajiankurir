<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use PHPUnit\Framework\Constraint\Constraint;

class WilayahAntar extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_wilayah' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_wilayah' => [
                'type'  => 'VARCHAR',
                'Constraint' => '100'
            ],
            'kodepos' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],

        ]);
        $this->forge->addKey('id_wilayah', true);
        $this->forge->createTable('wilayah_antar');
    }

    public function down()
    {
        //
        $this->forge->dropTable('wilayah_antar');
    }
}
