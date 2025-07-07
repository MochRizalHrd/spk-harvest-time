<?php

namespace App\Controllers;

use App\Models\KriteriaModel;
use App\Models\AlternatifModel;
use App\Models\NilaiModel;

class Rekomendasi extends BaseController
{
    public function view()
    {
        return view('user/pages/rekomendasi', [
            'title' => 'Rekomendasi - SPK Panen Bandeng'
        ]);
    }

    public function prosesSAW()
    {
        // Ambil data dari session
        $sessionData = session()->get('dataKolam');
        if (!$sessionData) {
            return redirect()->to('inputdata')->with('error', 'Silakan isi data kolam terlebih dahulu.');
        }

        // Pastikan bentuk array multidimensi (untuk banyak alternatif)
        if (isset($sessionData['umur_ikan'])) {
            $sessionData = [$sessionData];
        }

        // Bangun array alternatif
        $alternatif = [];
        foreach ($sessionData as $i => $data) {
            $alternatif[] = [
                'id'   => $i + 1,
                'kode' => 'ALT-' . str_pad($i + 1, 3, '0', STR_PAD_LEFT),
                'nama' => 'Kolam #' . ($i + 1), // 👉 otomatis Kolam #1, Kolam #2, ...
            ];
        }


        $kriteriaModel = new KriteriaModel();
        $kriteria = $kriteriaModel->findAll();

        $mapping = [
            'C1' => 'umur_ikan',
            'C2' => 'berat_ikan',
            'C3' => 'konsumsi_pakan',
            'C4' => 'aktivitas_ikan',
            'C5' => 'kematian_ikan',
        ];

        $alternatif = [];
        $matriks = [];

        foreach ($sessionData as $index => $data) {
            $altId = count($alternatif) + 1; // alternatif = array penampung
            $alternatif[] = [
                'id'   => $altId,
                'kode' => $data['kode'] ?? 'ALT-' . str_pad($altId, 3, '0', STR_PAD_LEFT),
                'nama' => $data['nama'] ?? 'Kolam #' . $altId,
            ];

            foreach ($kriteria as $kri) {
                $kode = $kri['kode'];
                $idKri = $kri['id'];
                $kolom = $mapping[$kode] ?? null;
                $nilai = 0;

                if ($kolom && isset($data[$kolom])) {
                    $value = $data[$kolom];

                    switch ($kode) {
                        case 'C1': // Umur Ikan (bulan)
                            $v = (float)$value;
                            $nilai = ($v < 4) ? 1 : (($v == 4) ? 2 : (($v <= 5) ? 3 : (($v <= 6) ? 4 : 5)));
                            break;

                        case 'C2': // Berat Ikan (gram)
                            $v = (float)$value;
                            $nilai = ($v < 70) ? 1 : (($v <= 80) ? 2 : (($v <= 100) ? 3 : (($v <= 120) ? 4 : 5)));
                            break;

                        case 'C3': // Konsumsi Pakan (kg)
                            $v = (float)$value;
                            $nilai = ($v < 5) ? 1 : (($v <= 6) ? 2 : (($v <= 7) ? 3 : (($v <= 8) ? 4 : 5)));
                            break;

                        case 'C4': // Aktivitas Ikan
                            $nilai = match (strtolower($value)) {
                                'sangat aktif' => 5,
                                'aktif' => 4,
                                'cukup aktif' => 3,
                                'kurang aktif' => 2,
                                'sangat lesu' => 1,
                                default => 0,
                            };
                            break;

                        case 'C5': // Tingkat Kematian
                            $nilai = match (strtolower($value)) {
                                'sangat rendah' => 5,
                                'rendah' => 4,
                                'cukup' => 3,
                                'tinggi' => 2,
                                'sangat tinggi' => 1,
                                default => 0,
                            };
                            break;
                    }
                }

                $matriks[$altId][$idKri] = $nilai;
            }
        }

        // Normalisasi Matriks
        $normalisasi = [];
        foreach ($kriteria as $kri) {
            $idKri = $kri['id'];
            $jenis = strtolower($kri['jenis']);

            $nilaiKriteria = array_column($matriks, $idKri);
            $max = max($nilaiKriteria);
            $min = min($nilaiKriteria);

            foreach ($alternatif as $alt) {
                $idAlt = $alt['id'];
                $nilai = $matriks[$idAlt][$idKri];

                $normal = ($jenis === 'benefit')
                    ? ($max > 0 ? $nilai / $max : 0)
                    : ($nilai > 0 ? $min / $nilai : 0);

                $normalisasi[$idAlt][$idKri] = round($normal, 4);
            }
        }

        // Hitung Skor Preferensi
        $hasil = [];
        foreach ($alternatif as $alt) {
            $skor = 0;
            foreach ($kriteria as $kri) {
                $idKri = $kri['id'];
                $bobot = (float)$kri['bobot'];
                $skor += $normalisasi[$alt['id']][$idKri] * $bobot;
            }

            $hasil[] = [
                'id_alternatif'   => $alt['id'],
                'kode_alternatif' => $alt['kode'],
                'nama_alternatif' => $alt['nama'],
                'skor'            => round($skor, 4),
            ];
        }

        // Urutkan dari skor tertinggi
        usort($hasil, fn($a, $b) => $b['skor'] <=> $a['skor']);

        return view('user/pages/rekomendasi', [
            'title' => 'Hasil Rekomendasi SAW',
            'hasil' => $hasil,
        ]);
    }
}
