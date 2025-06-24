<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\RatingModel;

class Rating extends BaseController
{
    protected $ratingModel;

    public function __construct()
    {

        $this->ratingModel = new RatingModel();
    }


    public function view(): string
    {
        $data = [
            'rating' => $this->ratingModel->findAll(),
            'title' => 'Data Rating Kecocokan Nilai'
        ];
        return view('admin/pages/rating', $data);   // Kirim ke view
    }

    // Tambah rating
    public function addRating()
    {

        $data = [
            'nama' => $this->request->getPost('nama'),
            'umur_ikan' => $this->request->getPost('umur_ikan'),
            'rata_rata_ikan' => $this->request->getPost('rata_rata_ikan'),
            'tingkat_konsumsi' => $this->request->getPost('tingkat_konsumsi'),
            'aktivitas_ikan' => $this->request->getPost('aktivitas_ikan'),
            'tingkat_kematian' => $this->request->getPost('tingkat_kematian'),
        ];

        $this->ratingModel->save($data);

        return redirect()->to(base_url('rating'))->with('success', 'Data rating kecocokan nilai berhasil ditambahkan.');
    }

    //Edit rating
    public function editRating($id)
    {
        $ratingModel = new RatingModel();
        $rating = $ratingModel->find($id);

        // Ambil data dari form
        $nama                 = $this->request->getPost('nama');
        $umur_ikan            = $this->request->getPost('umur_ikan');
        $rata_rata_ikan       = $this->request->getPost('rata_rata_ikan');
        $tingkat_konsumsi     = $this->request->getPost('tingkat_konsumsi');
        $aktivitas_ikan       = $this->request->getPost('aktivitas_ikan');
        $tingkat_kematian     = $this->request->getPost('tingkat_kematian');

        $data = [
            'nama'                   => $nama,
            'umur_ikan'              => $umur_ikan,
            'rata_rata_ikan'         => $rata_rata_ikan,
            'tingkat_konsumsi'       => $tingkat_konsumsi,
            'aktivitas_ikan'         => $aktivitas_ikan,
            'tingkat_kematian'       => $tingkat_kematian,
        ];

        $ratingModel->update($id, $data);

        return redirect()->to(base_url('rating'))->with('success', 'Data rating kecocokan nilai berhasil diperbarui.');
    }

    public function deleteRating($id)
    {
        $ratingModel = new RatingModel();
        $ratingModel->delete($id);
        return redirect()->to(base_url('rating'))->with('success', 'Data rating kecocokan nilai dihapus.');
    }
}
