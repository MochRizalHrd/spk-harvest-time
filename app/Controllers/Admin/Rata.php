<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\RataModel;

class Rata extends BaseController
{
    protected $rataModel;

    public function __construct()
    {

        $this->rataModel = new RataModel();
    }


    //Menampilkan skala rata ikan
    public function view()
    {
        $data = [
            'rata' => $this->rataModel->findAll(),
            'title' => 'Skala Berat Rata-Rata Ikan'
        ];
        return view('admin/pages/rata', $data);
    }

    // Tambah skala umur
    public function addRata()
    {

        $data = [
            'kategori' => $this->request->getPost('kategori'),
            'nilai' => $this->request->getPost('nilai'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $this->rataModel->save($data);

        return redirect()->to(base_url('rata'))->with('success', 'Skala berat rata-rata ikan berhasil ditambahkan.');
    }

    //Edit skala umur
    public function editRata($id)
    {
        $rataModel = new RataModel();
        $rata = $rataModel->find($id);

        // Ambil data dari form
        $kategori       = $this->request->getPost('kategori');
        $nilai          = $this->request->getPost('nilai');
        $keterangan     = $this->request->getPost('keterangan');

        $data = [
            'kategori'      => $kategori,
            'nilai'         => $nilai,
            'keterangan'    => $keterangan,
        ];

        $rataModel->update($id, $data);

        return redirect()->to(base_url('rata'))->with('success', 'Skala berat rata-rata ikan berhasil diperbarui.');
    }

    //Hapus skala umur
    public function deleteRata($id)
    {
        $rataModel = new RataModel();
        $rataModel->delete($id);
        return redirect()->to(base_url('rata'))->with('success', 'Skala berat rata-rata ikan berhasil dihapus.');
    }
}
