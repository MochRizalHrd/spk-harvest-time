<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\UmurModel;

class Umur extends BaseController
{
    protected $umurModel;

    public function __construct()
    {

        $this->umurModel = new UmurModel();
    }


    //Menampilkan skala umur
    public function view()
    {
        $data = [
            'umur' => $this->umurModel->findAll(),
            'title' => 'Skala Umur Ikan'
        ];
        return view('admin/pages/umur', $data);
    }

    // Tambah skala umur
    public function addUmur()
    {

        $data = [
            'kategori' => $this->request->getPost('kategori'),
            'nilai' => $this->request->getPost('nilai'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $this->umurModel->save($data);

        return redirect()->to(base_url('umur'))->with('success', 'Skala umur berhasil ditambahkan.');
    }

    //Edit skala umur
    public function editUmur($id)
    {
        $umurModel = new UmurModel();
        $umur = $umurModel->find($id);

        // Ambil data dari form
        $kategori       = $this->request->getPost('kategori');
        $nilai          = $this->request->getPost('nilai');
        $keterangan     = $this->request->getPost('keterangan');

        $data = [
            'kategori'      => $kategori,
            'nilai'         => $nilai,
            'keterangan'    => $keterangan,
        ];

        $umurModel->update($id, $data);

        return redirect()->to(base_url('umur'))->with('success', 'Skala umur berhasil diperbarui.');
    }

    //Hapus skala umur
    public function deleteUmur($id)
    {
        $umurModel = new UmurModel();
        $umurModel->delete($id);
        return redirect()->to(base_url('umur'))->with('success', 'Skala umur berhasil dihapus.');
    }
}
