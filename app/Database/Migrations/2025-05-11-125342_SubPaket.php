<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SubPaket extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_subpaket' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_karung' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'kode_paket' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'foto_subpaket' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat_pengantaran' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'no_telp' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'nama_penerima' => [
                'type' => 'VARCHAR',
                'constraint' => '150'
            ],
            'foto_penerima' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Di Antar', 'Selesai', 'Dikembalikan'],
                'default' => 'Di Antar',
            ],
        ]);
        $this->forge->addKey('id_subpaket', true);
        $this->forge->addForeignKey('id_karung', 'pakets', 'id_karung', 'CASCADE', 'CASCADE');
        $this->forge->createTable('subpakets');
    }

    public function down()
    {
        //
        $this->forge->dropTable('subpakets');
    }
}
