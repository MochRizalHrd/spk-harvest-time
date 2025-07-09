<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldsToRiwayat extends Migration
{
    public function up()
    {
        $fields = [
            'umur_ikan' => [
                'type'       => 'DECIMAL',
                'constraint' => '5,2',
                'after'      => 'kode_alternatif',
            ],
            'berat_ikan' => [
                'type'       => 'DECIMAL',
                'constraint' => '5,2',
                'after'      => 'umur_ikan',
            ],
            'konsumsi_pakan' => [
                'type'       => 'DECIMAL',
                'constraint' => '5,2',
                'after'      => 'berat_ikan',
            ],
            'aktivitas_ikan' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'after'      => 'konsumsi_pakan',
            ],
            'kematian_ikan' => [
                'type'       => 'DECIMAL',
                'constraint' => '5,2',
                'after'      => 'aktivitas_ikan',
            ],
        ];

        $this->forge->addColumn('riwayat', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('riwayat', [
            'umur_ikan',
            'berat_ikan',
            'konsumsi_pakan',
            'aktivitas_ikan',
            'kematian_ikan'
        ]);
    }
}
