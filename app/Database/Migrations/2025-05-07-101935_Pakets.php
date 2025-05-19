<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pakets extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_karung' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_karung' => [
                'type'  => 'VARCHAR',
                'Constraint' => '255'
            ],
            'gambar_karung' => [
                'type'  => 'VARCHAR',
                'Constraint' => '255'
            ],
            'id_kurir' => [
                'type' => 'INT',
                'unsigned'   => true,
                'null'       => true,
            ],
            'id_wilayah' => [
                'type' => 'INT',
                'unsigned'   => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Pending', 'Di Antar', 'Selesai'],
                'default' => 'Pending',
            ],
            'tanggal_kirim' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'tanggal_selesai' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_karung', true);
        $this->forge->addForeignKey('id_kurir', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_wilayah', 'wilayah_antar', 'id_wilayah', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pakets');
    }

    public function down()
    {
        //
        $this->forge->dropTable('pakets');
    }
}
