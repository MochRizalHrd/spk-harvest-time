<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKodeToDataKriteria extends Migration
{
    public function up()
    {
        $this->forge->addColumn('data_kriteria', [
            'kode' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'after'      => 'id', // opsional: letakkan setelah kolom 'id'
                'null'       => true  // atau false jika wajib
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('data_kriteria', 'kode');
    }
}
