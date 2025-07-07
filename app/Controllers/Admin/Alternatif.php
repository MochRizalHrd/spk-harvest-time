<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\AlternatifModel;

class Alternatif extends BaseController
{
    protected $alternatifModel;

    public function __construct()
    {

        $this->alternatifModel = new AlternatifModel();
    }


    public function view(): string
    {
        $data = [
            'alternatif' => $this->alternatifModel->findAll(),
            'title' => 'Data Alternatif'
        ];
        return view('admin/pages/alternatif', $data);   // Kirim ke view
    }

    // Tambah rating
    public function addAlternatif()
    {

        $data = [
            'kode' => $this->request->getPost('kode'),
            'nama' => $this->request->getPost('nama'),
            'umur_ikan' => $this->request->getPost('umur_ikan'),
            'rata_rata_ikan' => $this->request->getPost('rata_rata_ikan'),
            'tingkat_konsumsi' => $this->request->getPost('tingkat_konsumsi'),
            'aktivitas_ikan' => $this->request->getPost('aktivitas_ikan'),
            'tingkat_kematian' => $this->request->getPost('tingkat_kematian'),
        ];

        $this->alternatifModel->save($data);

        return redirect()->to(base_url('alternatif'))->with('success', 'Data alternatif berhasil ditambahkan.');
    }

    //Edit Alternatif
    public function editAlternatif($id)
    {
        $alternatifModel = new AlternatifModel();
        $alternatif = $alternatifModel->find($id);

        // Ambil data dari form
        $kode                 = $this->request->getPost('kode');
        $nama                 = $this->request->getPost('nama');
        $umur_ikan            = $this->request->getPost('umur_ikan');
        $rata_rata_ikan       = $this->request->getPost('rata_rata_ikan');
        $tingkat_konsumsi     = $this->request->getPost('tingkat_konsumsi');
        $aktivitas_ikan       = $this->request->getPost('aktivitas_ikan');
        $tingkat_kematian     = $this->request->getPost('tingkat_kematian');

        $data = [
            'kode'                   => $kode,
            'nama'                   => $nama,
            'umur_ikan'              => $umur_ikan,
            'rata_rata_ikan'         => $rata_rata_ikan,
            'tingkat_konsumsi'       => $tingkat_konsumsi,
            'aktivitas_ikan'         => $aktivitas_ikan,
            'tingkat_kematian'       => $tingkat_kematian,
        ];

        $alternatifModel->update($id, $data);

        return redirect()->to(base_url('alternatif'))->with('success', 'Data alternatif berhasil diperbarui.');
    }

    public function deleteAlternatif($id)
    {
        $alternatifModel = new AlternatifModel();
        $alternatifModel->delete($id);
        return redirect()->to(base_url('rating'))->with('success', 'Data alternatif berhasil dihapus.');
    }
}
