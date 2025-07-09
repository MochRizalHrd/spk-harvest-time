<?php

namespace App\Controllers;

class InputData extends BaseController
{

    public function view()
    {
        // Ambil data dari session jika ada
        $sessionData = session()->get('dataKolam');
        $skala = [
            'C1' => [
                'title' => 'Skala Umur Ikan (C1)',
                'data' => [
                    ['Sangat Muda', '1', '&lt; 4 bulan'],
                    ['Muda', '2', '4 bulan'],
                    ['Cukup Matang', '3', '&gt; 4 – 5 bulan'],
                    ['Optimal', '4', '5 bulan'],
                    ['Sangat Matang', '5', '&gt; 5 bulan'],
                ]
            ],
            'C2' => [
                'title' => 'Skala Berat Rata-Rata Ikan (C2)',
                'data' => [
                    ['Sangat Ringan', '1', '&lt; 70 gram'],
                    ['Ringan', '2', '70 – 80 gram'],
                    ['Cukup Berat', '3', '&gt; 80 – 100 gram'],
                    ['Optimal', '4', '100 – 120 gram'],
                    ['Sangat Berat', '5', '&gt; 120 gram'],
                ]
            ],
            'C3' => [
                'title' => 'Skala Konsumsi Pakan Ikan (C3)',
                'data' => [
                    ['Sangat Rendah', '1', '&lt; 5 kg'],
                    ['Rendah', '2', '5 – 6 kg'],
                    ['Sedang', '3', '&gt; 6 – 7 kg'],
                    ['Tinggi', '4', '&gt; 7 – 8 kg'],
                    ['Sangat Tinggi', '5', '&gt; 8 kg'],
                ]
            ],
            'C4' => [
                'title' => 'Skala Aktivitas Ikan (C4)',
                'data' => [
                    ['Sangat Aktif', '5', 'Berenang aktif & merata'],
                    ['Aktif', '4', 'Sebagian besar aktif'],
                    ['Cukup Aktif', '3', 'Beberapa terlihat lesu'],
                    ['Kurang Aktif', '2', 'Banyak terlihat lesu'],
                    ['Sangat Lesu', '1', 'Hampir semua sangat lesu'],
                ]
            ],
            'C5' => [
                'title' => 'Skala Kematian Ikan (C5)',
                'data' => [
                    ['Sangat Rendah', '5', '0 ekor'],
                    ['Rendah', '4', '1–2 ekor'],
                    ['Cukup', '3', '3–5 ekor'],
                    ['Tinggi', '2', '6–10 ekor'],
                    ['Sangat Tinggi', '1', '&gt; 10 ekor'],
                ]
            ]
        ];

        return view('user/pages/inputData', [
            'title' => 'Input Data - SPK Panen Bandeng',
            'dataKolam'  => $sessionData,
            'skala' => $skala
        ]);
    }

    public function simpanData()
    {
        // Ambil data dari form
        $data = [
            'kode'            => $this->request->getPost('kode'),
            'nama'            => $this->request->getPost('nama'),
            'umur_ikan'       => $this->request->getPost('umur_ikan'),
            'berat_ikan'      => $this->request->getPost('berat_ikan'),
            'konsumsi_pakan'  => $this->request->getPost('konsumsi_pakan'),
            'aktivitas_ikan'  => $this->request->getPost('aktivitas_ikan'),
            'kematian_ikan'   => $this->request->getPost('kematian_ikan'),
        ];

        // Ambil semua alternatif sebelumnya dari session (jika belum ada, buat array kosong)
        $dataKolam = session()->get('dataKolam') ?? [];

        // Tambahkan data baru ke array
        $dataKolam[] = $data;

        // Simpan kembali ke session
        session()->set('dataKolam', $dataKolam);

        // Redirect ke halaman input lagi atau halaman hasil
        return redirect()->to(base_url('inputdata'))->with('success', 'Alternatif berhasil ditambahkan.');
    }


    public function resetData()
    {
        // Hapus session dataKolam
        session()->remove('dataKolam');

        // Redirect kembali ke halaman inputdata dengan pesan sukses
        return redirect()->to(base_url('inputdata'))->with('success', 'Data berhasil direset.');
    }
}
