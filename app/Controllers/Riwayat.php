<?php

namespace App\Controllers;

use App\Models\RiwayatModel;

class Riwayat extends BaseController
{
    public function view()
    {
        $riwayatModel = new RiwayatModel();
        $userId = session()->get('user_id');
        $data = $riwayatModel->where('user_id', $userId)
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('user/pages/riwayat', [
            'title' => 'Riwayat Saya',
            'riwayat' => $data
        ]);
    }

    public function simpanRiwayat()
    {
        $hasilSAW = session()->get('hasilSAW');
        $dataKolam = session()->get('dataKolam');
        $userId = session()->get('user_id');

        if (!$hasilSAW || !$dataKolam || !$userId) {
            return redirect()->back()->with('error', 'Data tidak lengkap.');
        }

        $riwayatModel = new \App\Models\RiwayatModel();

        foreach ($hasilSAW as $hasil) {
            // Cari data input kolam berdasarkan kode
            $match = null;
            foreach ($dataKolam as $data) {
                if ($data['kode'] === $hasil['kode_alternatif']) {
                    $match = $data;
                    break;
                }
            }

            if (!$match) continue;

            // Tentukan keterangan
            $status = 'Belum Siap';
            if ($hasil['skor'] >= 0.75) $status = 'Siap Panen';
            elseif ($hasil['skor'] >= 0.5) $status = 'Hampir Siap';

            // Simpan
            $riwayatModel->save([
                'user_id' => $userId,
                'nama_alternatif' => $hasil['nama_alternatif'],
                'kode_alternatif' => $hasil['kode_alternatif'],
                'skor' => $hasil['skor'],
                'status_panen' => $status,
                'umur_ikan' => $match['umur_ikan'],
                'berat_ikan' => $match['berat_ikan'],
                'konsumsi_pakan' => $match['konsumsi_pakan'],
                'aktivitas_ikan' => $match['aktivitas_ikan'],
                'kematian_ikan' => $match['kematian_ikan'],
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return redirect()->to('/riwayat')->with('success', 'Semua hasil rekomendasi berhasil disimpan.');
    }


    public function delete($id)
    {
        $model = new \App\Models\RiwayatModel();
        $model->delete($id);
        return redirect()->back()->with('success', 'Riwayat berhasil dihapus.');
    }
}
