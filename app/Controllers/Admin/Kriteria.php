<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\KriteriaModel;

class Kriteria extends BaseController
{
    protected $kriteriaModel;

    public function __construct()
    {

        $this->kriteriaModel = new KriteriaModel();
    }


    //Menampilkan data kriteria
    public function view()
    {
        $data = [
            'kriteria' => $this->kriteriaModel->findAll(),
            'title' => 'Data Kriteria'
        ];
        return view('admin/pages/kriteria', $data);
    }

    // Tambah data kriteria
    public function addKriteria()
    {

        $data = [
            'kode' => $this->request->getPost('kode'),
            'kriteria' => $this->request->getPost('kriteria'),
            'jenis' => $this->request->getPost('jenis'),
            'bobot' => $this->request->getPost('bobot'),
        ];

        $this->kriteriaModel->save($data);

        return redirect()->to(base_url('kriteria'))->with('success', 'Data kriteria berhasil ditambahkan.');
    }

    //Edit data kriteria
    public function editKriteria($id)
    {
        $kriteriaModel = new KriteriaModel();
        $kriteria = $kriteriaModel->find($id);

        // Ambil data dari form

        $kode       = $this->request->getPost('kode');
        $kriteria       = $this->request->getPost('kriteria');
        $jenis       = $this->request->getPost('jenis');
        $bobot          = $this->request->getPost('bobot');

        $data = [
            'kode'      => $kode,
            'kriteria'      => $kriteria,
            'jenis'      => $jenis,
            'bobot'     => $bobot,
        ];

        $kriteriaModel->update($id, $data);

        return redirect()->to(base_url('kriteria'))->with('success', 'Data kriteria berhasil diperbarui.');
    }

    //Hapus data kriteria
    public function deleteKriteria($id)
    {
        $kriteriaModel = new KriteriaModel();
        $kriteriaModel->delete($id);
        return redirect()->to(base_url('kriteria'))->with('success', 'Data kriteria berhasil dihapus.');
    }
}
