<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\KonsumsiModel;

class Konsumsi extends BaseController
{
    protected $konsumsiModel;

    public function __construct()
    {

        $this->konsumsiModel = new KonsumsiModel();
    }


    //Menampilkan skala tingkat konsumsi 
    public function view()
    {
        $data = [
            'konsumsi' => $this->konsumsiModel->findAll(),
            'title' => 'Skala Tingkat Konsumsi Ikan'
        ];
        return view('admin/pages/konsumsi', $data);
    }

    // Tambah skala tingkat konsumsi
    public function addKonsumsi()
    {

        $data = [
            'kategori' => $this->request->getPost('kategori'),
            'nilai' => $this->request->getPost('nilai'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $this->konsumsiModel->save($data);

        return redirect()->to(base_url('konsumsi'))->with('success', 'Skala tingkat konsumsi ikan berhasil ditambahkan.');
    }

    //Edit skala tingkat konsumsi
    public function editKonsumsi($id)
    {
        $konsumsiModel = new KonsumsiModel();
        $konsumsi = $konsumsiModel->find($id);

        // Ambil data dari form
        $kategori       = $this->request->getPost('kategori');
        $nilai          = $this->request->getPost('nilai');
        $keterangan     = $this->request->getPost('keterangan');

        $data = [
            'kategori'      => $kategori,
            'nilai'         => $nilai,
            'keterangan'    => $keterangan,
        ];

        $konsumsiModel->update($id, $data);

        return redirect()->to(base_url('konsumsi'))->with('success', 'Skala tingkat konsumsi ikan berhasil diperbarui.');
    }

    //Hapus skala tingkat konsumsi
    public function deleteKonsumsi($id)
    {
        $konsumsiModel = new KonsumsiModel();
        $konsumsiModel->delete($id);
        return redirect()->to(base_url('konsumsi'))->with('success', 'Skala tingkat konsumsi ikan berhasil dihapus.');
    }
}
