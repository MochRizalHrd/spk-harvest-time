<?= $this->extend('user/layouts/mainLayout') ?>
<?= $this->section('content') ?>

<div class="container py-5 px-3 px-md-4">
  <!-- Header -->
  <div class="card border-0 shadow-sm mb-4 rounded-4" style="background-color: #f8f9fa; padding-top: 30px;">
    <div class="card-body py-4 px-4 px-md-5 d-flex align-items-center gap-3">
      <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
        <i class="bi bi-clock-history fs-4"></i>
      </div>
      <div>
        <h4 class="mb-1 fw-bold text-dark">Riwayat Rekomendasi Panen</h4>
        <small class="text-muted">Lihat hasil penilaian yang telah disimpan sebelumnya.</small>
      </div>
    </div>
  </div>

  <!-- Tabel Riwayat -->
  <div class="card shadow-sm border-0 rounded-4">
    <div class="card-body p-4">
      <div class="table-responsive">
        <table class="table table-striped align-middle">
          <thead class="table-light text-center">
            <tr>
              <th>No</th>
              <th>Kode Alternatif</th>
              <th>Nama Alternatif</th>
              <th>Tanggal</th>
              <th>Umur Ikan</th>
              <th>Berat (g)</th>
              <th>Konsumsi Pakan(kg)</th>
              <th>Aktivitas</th>
              <th>Skor SAW</th> <!-- ✅ Tambahan -->
              <!-- <th>Rekomendasi</th> -->
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($riwayat) && is_array($riwayat)) : ?>
              <?php foreach ($riwayat as $i => $data) : ?>
                <tr class="text-center">
                  <td><?= $i + 1 ?></td>
                  <td><?= $data['kode_alternatif'] ?></td>
                  <td><?= $data['nama_alternatif'] ?></td>
                  <td><?= date('d M Y,', strtotime($data['created_at'])) ?></td>
                  <td><?= $data['umur_ikan'] ?> bulan</td>
                  <td><?= $data['berat_ikan'] ?> gram</td>
                  <td><?= ucfirst($data['konsumsi_pakan']) ?>kg</td>
                  <td><?= ucfirst($data['aktivitas_ikan']) ?></td>
                  <td><strong><?= number_format($data['skor'], 2) ?></strong></td> 
                  
                  <td>
                    <div class="d-flex gap-2 justify-content-center">
              
                      <form action="<?= base_url('riwayat/delete/' . $data['id']) ?>" method="post" onsubmit="return confirm('Hapus riwayat ini?')">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-sm btn-outline-danger">
                          <i class="bi bi-trash"></i> Hapus
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              <?php endforeach ?>
            <?php else : ?>
              <tr>
                <td colspan="9" class="text-center text-muted py-4">
                  <i class="bi bi-info-circle"></i> Belum ada riwayat rekomendasi disimpan.
                </td>
              </tr>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
