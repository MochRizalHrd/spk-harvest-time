<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRiwayatTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'INT', 'auto_increment' => true],
            'user_id'          => ['type' => 'INT'],
            'nama_alternatif'  => ['type' => 'VARCHAR', 'constraint' => 100],
            'kode_alternatif'  => ['type' => 'VARCHAR', 'constraint' => 50],
            'skor'             => ['type' => 'DECIMAL', 'constraint' => '5,4'],
            'status_panen'     => ['type' => 'VARCHAR', 'constraint' => 50],
            'created_at'       => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('riwayat');
    }


    public function down()
    {
        $this->forge->dropTable('riwayat');
    }
}
