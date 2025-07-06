<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\KematianModel;

class Kematian extends BaseController
{
    protected $kematianModel;

    public function __construct()
    {

        $this->kematianModel = new KematianModel();
    }


    //Menampilkan skala tingkat konsumsi 
    public function view()
    {
        $data = [
            'kematian' => $this->kematianModel->findAll(),
            'title' => 'Skala Tingkat Kematian Ikan'
        ];
        return view('admin/pages/kematian', $data);
    }

    // Tambah skala tingkat konsumsi
    public function addKematian()
    {

        $data = [
            'kategori' => $this->request->getPost('kategori'),
            'nilai' => $this->request->getPost('nilai'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $this->kematianModel->save($data);

        return redirect()->to(base_url('kematian'))->with('success', 'Skala tingkat kematian ikan berhasil ditambahkan.');
    }

    //Edit skala tingkat konsumsi
    public function editKematian($id)
    {
        $kematianModel = new KematianModel();
        $kematian = $kematianModel->find($id);

        // Ambil data dari form
        $kategori       = $this->request->getPost('kategori');
        $nilai          = $this->request->getPost('nilai');
        $keterangan     = $this->request->getPost('keterangan');

        $data = [
            'kategori'      => $kategori,
            'nilai'         => $nilai,
            'keterangan'    => $keterangan,
        ];

        $kematianModel->update($id, $data);

        return redirect()->to(base_url('kematian'))->with('success', 'Skala tingkat kematian ikan berhasil diperbarui.');
    }

    //Hapus skala tingkat konsumsi
    public function deleteKematian($id)
    {
        $kematianModel = new KematianModel();
        $kematianModel->delete($id);
        return redirect()->to(base_url('kematian'))->with('success', 'Skala tingkat kematian ikan berhasil dihapus.');
    }
}
