<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterUmurIkanDecimal extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('alternatif', [
            'umur_ikan' => [
                'type'       => 'DECIMAL',
                'constraint' => '4,1',
                'null'       => false,
            ],
        ]);
    }

    public function down()
    {
        // Kembalikan ke sebelumnya (misalnya INTEGER atau DECIMAL(3,0))
        $this->forge->modifyColumn('alternatif', [
            'umur_ikan' => [
                'type'       => 'DECIMAL',
                'constraint' => '3,0',
                'null'       => false,
            ],
        ]);
    }
}
