<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\KriteriaModel;
use App\Models\AlternatifModel;
use App\Models\NilaiModel;

class Perhitungan extends BaseController
{

    public function prosesSAW()
    {

        $kriteriaModel = new KriteriaModel();
        $alternatifModel = new AlternatifModel();

        // 1. Ambil semua data kriteria & alternatif
        $kriteria = $kriteriaModel->findAll();         // kolom: id, kode, jenis, bobot
        $alternatif = $alternatifModel->findAll();     // kolom: umur_ikan, rata_rata_ikan, dst.

        // 👉 Buat alternatif terindeks berdasarkan ID (altMap)
        $altMap = [];
        foreach ($alternatif as $alt) {
            $altMap[$alt['id']] = $alt;
        }

        // 2. Mapping kolom alternatif berdasarkan kode kriteria
        $mapping = [
            'C1' => 'umur_ikan',
            'C2' => 'rata_rata_ikan',
            'C3' => 'tingkat_konsumsi',
            'C4' => 'aktivitas_ikan',
            'C5' => 'tingkat_kematian',
        ];

        // 3. Matriks Keputusan
        $matriks = [];
        foreach ($alternatif as $alt) {
            foreach ($kriteria as $kri) {
                $kode = $kri['kode'];           // C1, C2, dst
                $kolom = $mapping[$kode] ?? null;
                $nilai = 0;

                if ($kolom && isset($alt[$kolom])) {
                    switch ($kode) {
                        case 'C1': // Umur Ikan (hari)
                            $umur = (int)$alt[$kolom];
                            if ($umur < 4) $nilai = 1;
                            elseif ($umur === 4) $nilai = 2;
                            elseif ($umur > 4 && $umur < 5) $nilai = 3;
                            elseif ($umur === 5) $nilai = 4;
                            else $nilai = 5;
                            break;

                        case 'C2': // Berat Ikan (gram)
                            $berat = (float)$alt[$kolom];
                            if ($berat < 70) $nilai = 1;
                            elseif ($berat >= 70 && $berat <= 80) $nilai = 2;
                            elseif ($berat > 80 && $berat <= 100) $nilai = 3;
                            elseif ($berat > 100 && $berat <= 120) $nilai = 4;
                            else $nilai = 5;
                            break;

                        case 'C3': // Konsumsi Pakan (kg)
                            $pakan = (float)$alt[$kolom];
                            if ($pakan < 5) $nilai = 1;
                            elseif ($pakan >= 5 && $pakan <= 6) $nilai = 2;
                            elseif ($pakan > 6 && $pakan <= 7) $nilai = 3;
                            elseif ($pakan > 7 && $pakan <= 8) $nilai = 4;
                            else $nilai = 5;
                            break;

                        case 'C4': // Aktivitas Ikan (text)
                            $nilai = match (strtolower($alt[$kolom])) {
                                'sangat aktif' => 5,
                                'aktif' => 4,
                                'cukup aktif' => 3,
                                'kurang aktif' => 2,
                                'sangat lesu' => 1,
                                default => 0,
                            };
                            break;

                        case 'C5': // Tingkat Kematian Ikan (text)
                            $nilai = match (strtolower($alt[$kolom])) {
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

                $matriks[$alt['id']][$kri['id']] = $nilai;
            }
        }

        // dd($matriks);

        // 4. Normalisasi
        $normalisasi = [];
        foreach ($kriteria as $kri) {
            $idKri = $kri['id'];
            $jenis = strtolower($kri['jenis']); // benefit/cost
            $kolomNilai = array_column($matriks, $idKri);
            $max = max($kolomNilai);
            $min = min($kolomNilai);

            foreach ($alternatif as $alt) {
                $nilai = $matriks[$alt['id']][$idKri];

                if ($jenis === 'benefit') {
                    $normal = ($max > 0) ? $nilai / $max : 0;
                } else {
                    $normal = ($nilai > 0) ? $min / $nilai : 0;
                }

                $normalisasi[$alt['id']][$idKri] = round($normal, 4);
            }
        }
        // dd($matriks, $normalisasi);

        // 5. Hitung Nilai Preferensi
        $hasil = [];
        foreach ($alternatif as $alt) {
            $skor = 0;
            foreach ($kriteria as $kri) {
                $idKri = $kri['id'];
                $bobot = (float)$kri['bobot'];
                $skor += $normalisasi[$alt['id']][$idKri] * $bobot;
            }

            $hasil[] = [
                'id_alternatif' => $alt['id'],
                'kode_alternatif' => $alt['kode'],
                'nama_alternatif' => $alt['nama'],
                'skor' => round($skor, 4),
            ];
        }

        // 6. Urutkan berdasarkan skor tertinggi
        usort($hasil, fn($a, $b) => $b['skor'] <=> $a['skor']);
        // dd($hasil);

        // 7. Tampilkan hasil ke view

        return view('admin/pages/perhitungan', [
            'title' => 'Perhitungan - SPK Panen Bandeng',
            'kriteria'    => $kriteria,
            'alternatif'  => $altMap,
            'matriks'     => $matriks,
            'normalisasi' => $normalisasi,
            'hasil'       => $hasil
        ]);
    }
}
