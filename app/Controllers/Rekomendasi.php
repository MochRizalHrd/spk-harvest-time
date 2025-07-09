<?php

namespace App\Controllers;

use App\Models\KriteriaModel;
use App\Models\AlternatifModel;
use App\Models\NilaiModel;

class Rekomendasi extends BaseController
{
    public function view()
    {
        $hasil = session()->get('hasilSAW') ?? [];
        $normalisasi = session()->get('normalisasi') ?? [];
        $kriteria = session()->get('kriteria') ?? [];

        return view('user/pages/rekomendasi', [
            'title'        => 'Rekomendasi - SPK Panen Bandeng',
            'hasil'        => $hasil,
            'normalisasi'  => $normalisasi,
            'kriteria'     => $kriteria,
        ]);
    }




    public function prosesSAW()
    {
        $sessionData = session()->get('dataKolam');
        if (!$sessionData || !is_array($sessionData)) {
            return redirect()->to('inputdata')->with('error', 'Silakan isi minimal satu data kolam terlebih dahulu.');
        }
        // dd($sessionData);

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
                'id'                => $altId,
                'kode'              => $data['kode'] ?? 'ALT-' . str_pad($altId, 3, '0', STR_PAD_LEFT),
                'nama'              => $data['nama'] ?? 'Kolam' . $altId,
                'umur_ikan'         => $data['umur_ikan'] ?? null,
                'berat_ikan'        => $data['berat_ikan'] ?? null,
                'konsumsi_pakan'    => $data['konsumsi_pakan'] ?? null,
                'aktivitas_ikan'    => $data['aktivitas_ikan'] ?? null,
                'kematian_ikan'     => $data['kematian_ikan'] ?? null,
            ];


            foreach ($kriteria as $kri) {
                $kode = $kri['kode'];
                $idKri = $kri['id'];
                $kolom = $mapping[$kode] ?? null;
                $nilai = 0;

                if ($kolom && isset($data[$kolom])) {
                    switch ($kode) {
                        case 'C1':
                            $umur = (float)$data[$kolom];
                            if ($umur < 4) $nilai = 1;
                            elseif ($umur == 4) $nilai = 2;
                            elseif ($umur > 4 && $umur < 5) $nilai = 3;
                            elseif ($umur == 5) $nilai = 4;
                            else $nilai = 5;
                            break;

                        case 'C2':
                            $berat = (float)$data[$kolom];
                            if ($berat < 40) $nilai = 1;
                            elseif ($berat >= 40 && $berat <= 50) $nilai = 2;
                            elseif ($berat > 50 && $berat <= 75) $nilai = 3;
                            elseif ($berat > 75 && $berat <= 110) $nilai = 4;
                            else $nilai = 5;
                            break;

                        case 'C3':
                            $pakan = (float)$data[$kolom];
                            if ($pakan >= 2 && $pakan < 3) $nilai = 1;
                            elseif ($pakan >= 3 && $pakan < 5) $nilai = 2;
                            elseif ($pakan >= 5 && $pakan < 7) $nilai = 3;
                            elseif ($pakan >= 7 && $pakan <= 8) $nilai = 4;
                            else $nilai = 5;
                            break;

                        case 'C4':
                            $nilai = match (strtolower($data[$kolom])) {
                                'sangat aktif' => 5,
                                'aktif' => 4,
                                'cukup aktif' => 3,
                                'kurang aktif' => 2,
                                'sangat lesu' => 1,
                                default => 0,
                            };
                            break;

                        case 'C5':
                            $nilai = match (strtolower($data[$kolom])) {
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
        // dd($alternatif, $matriks);

        // Normalisasi Matriks
        $normalisasi = [];

        foreach ($kriteria as $kri) {
            $idKri = $kri['id'];
            $jenis = strtolower($kri['jenis']);

            // Ambil semua nilai untuk kriteria ini
            $nilaiKriteria = [];
            foreach ($alternatif as $alt) {
                $idAlt = $alt['id'];
                if (isset($matriks[$idAlt][$idKri])) {
                    $nilaiKriteria[] = $matriks[$idAlt][$idKri];
                }
            }

            $max = max($nilaiKriteria);
            $min = min($nilaiKriteria);

            foreach ($alternatif as $alt) {
                $idAlt = $alt['id'];
                $nilai = $matriks[$idAlt][$idKri] ?? 0;

                $normal = 0;
                if ($jenis === 'benefit') {
                    $normal = ($max > 0) ? $nilai / $max : 0;
                } else {
                    $normal = ($nilai > 0) ? $min / $nilai : 0;
                }

                $normalisasi[$idAlt][$idKri] = round($normal, 4);
            }
        }

        // dd($matriks, $normalisasi, $max);

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

        session()->set('hasilSAW', $hasil);
        session()->set('normalisasi', $normalisasi);
        session()->set('kriteria', $kriteria);


        return view('user/pages/rekomendasi', [
            'title' => 'Hasil Rekomendasi SAW',
            'kriteria' => $kriteria,
            'normalisasi' => $normalisasi,
            'hasil' => $hasil,
        ]);
    }
}
