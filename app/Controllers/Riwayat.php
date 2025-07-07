<?php

namespace App\Controllers;

class Riwayat extends BaseController
{
    public function view()
    {
        $riwayat = [
            [
                'id' => 1,
                'umur_ikan' => 90,
                'berat_ikan' => 250,
                'konsumsi_pakan' => 'tinggi',
                'aktivitas_ikan' => 'aktif',
                'kematian_ikan' => 2.5,
                'rekomendasi' => 'Panen Sekarang',
                'created_at' => '2025-07-06 10:45:00'
            ],
            // ... data lainnya
        ];

        return view('user/pages/riwayat', [
            'title' => 'Riwayat - SPK Panen Bandeng',$riwayat
        ]);
    }
}
