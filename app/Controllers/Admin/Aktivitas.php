<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\AktivitasModel;

class Aktivitas extends BaseController
{
    protected $aktivitasModel;

    public function __construct()
    {

        $this->aktivitasModel = new AktivitasModel();
    }


    //Menampilkan skala rata ikan
    public function view()
    {
        $data = [
            'aktivitas' => $this->aktivitasModel->findAll(),
            'title' => 'Skala Aktivitas Ikan'
        ];
        return view('admin/pages/aktivitas', $data);
    }

    // Tambah skala umur
    public function addAktivitas()
    {

        $data = [
            'kategori' => $this->request->getPost('kategori'),
            'nilai' => $this->request->getPost('nilai'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $this->aktivitasModel->save($data);

        return redirect()->to(base_url('aktivitas'))->with('success', 'Skala aktivitas ikan berhasil ditambahkan.');
    }

    //Edit skala umur
    public function editAktivitas($id)
    {
        $aktivitasModel = new AktivitasModel();
        $aktivitas = $aktivitasModel->find($id);

        // Ambil data dari form
        $kategori       = $this->request->getPost('kategori');
        $nilai          = $this->request->getPost('nilai');
        $keterangan     = $this->request->getPost('keterangan');

        $data = [
            'kategori'      => $kategori,
            'nilai'         => $nilai,
            'keterangan'    => $keterangan,
        ];

        $aktivitasModel->update($id, $data);

        return redirect()->to(base_url('aktivitas'))->with('success', 'Skala aktivitas ikan berhasil diperbarui.');
    }

    //Hapus skala umur
    public function deleteAktivitas($id)
    {
        $aktivitasModel = new AktivitasModel();
        $aktivitasModel->delete($id);
        return redirect()->to(base_url('aktivitas'))->with('success', 'Skala aktivitas ikan berhasil dihapus.');
    }
}
