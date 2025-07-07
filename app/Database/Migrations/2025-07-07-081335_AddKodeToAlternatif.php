<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKodeToAlternatif extends Migration
{
    public function up()
    {
        $this->forge->addColumn('alternatif', [
            'kode' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'after'      => 'id',
                'null'       => true  
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('alternatif', 'kode');
    }
}
