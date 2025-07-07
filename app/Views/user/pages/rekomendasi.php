<?= $this->extend('user/layouts/mainLayout') ?>

<?= $this->section('content') ?>
<section class="container px-3 px-md-4 pt-5 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-10 col-md-11">
      <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4 p-md-5">

          <?php
          $sessionData = session()->get('dataKolam');
          if (!is_array($sessionData)) $sessionData = [$sessionData];
          ?>

          <!-- Box Utama -->
          <?php if (!empty($hasil)): ?>
            <?php $hasilSAW = $hasil[0]; ?>
            <?php
              $statusPanen = 'Belum Direkomendasikan';
              $warna = 'secondary';
              $ikon = 'question-circle';

              if ($hasilSAW['skor'] >= 0.75) {
                  $statusPanen = 'Waktu Panen Sudah Tepat!';
                  $warna = 'success';
                  $ikon = 'check-circle-fill';
              } elseif ($hasilSAW['skor'] >= 0.5) {
                  $statusPanen = 'Hampir Siap Panen';
                  $warna = 'warning';
                  $ikon = 'exclamation-circle-fill';
              } else {
                  $statusPanen = 'Belum Siap Panen';
                  $warna = 'danger';
                  $ikon = 'x-circle-fill';
              }
            ?>

            <div class="bg-light border rounded-4 p-4 p-md-5 text-center mb-5">
              <i class="bi bi-<?= $ikon ?> text-<?= $warna ?> fs-1 mb-3"></i>
              <h4 class="fw-bold text-<?= $warna ?> mb-3"><?= $statusPanen ?></h4>

              <p class="text-muted mb-4">
                Berdasarkan alternatif <strong><?= esc($hasilSAW['nama_alternatif']) ?></strong>, sistem memberikan skor:
                <strong><?= number_format($hasilSAW['skor'], 4) ?></strong><br>
                <?= $statusPanen === 'Waktu Panen Sudah Tepat!' ? 'Lanjutkan proses panen untuk hasil maksimal.' : 'Pantau dan evaluasi kondisi kolam secara berkala.' ?>
              </p>

              <!-- Tombol -->
              <div class="mt-4 d-flex flex-wrap justify-content-center gap-2">
                <a href="<?= base_url('riwayat') ?>" class="btn btn-outline-primary rounded-pill px-4">
                  <i class="bi bi-clock-history me-1"></i> Lihat Riwayat
                </a>
                <a href="<?= base_url('download-hasil') ?>" class="btn btn-success rounded-pill px-4">
                  <i class="bi bi-download me-1"></i> Simpan Hasil
                </a>
              </div>
            </div>
          <?php endif; ?>


          <!-- Tabel Semua Hasil -->
          <h5 class="fw-bold mb-3 text-dark">📊 Hasil Perhitungan Semua Alternatif</h5>
          <div class="table-responsive border rounded-3 shadow-sm bg-white">
            <table class="table table-bordered align-middle mb-0">
              <thead class="table-light">
                <tr class="text-center">
                  <th>No</th>
                  <th>Nama Alternatif</th>
                  <th>Kode</th>
                  <th>Skor SAW</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($hasil as $i => $row): ?>
                  <?php
                    $keterangan = '';
                    if ($row['skor'] >= 0.75) {
                      $keterangan = 'Siap Panen';
                    } elseif ($row['skor'] >= 0.5) {
                      $keterangan = 'Hampir Siap';
                    } else {
                      $keterangan = 'Belum Siap';
                    }
                  ?>
                  <tr class="text-center">
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($row['nama_alternatif']) ?></td>
                    <td><?= esc($row['kode_alternatif']) ?></td>
                    <td><strong><?= number_format($row['skor'], 4) ?></strong></td>
                    <td>
                      <span class="badge bg-<?= $keterangan === 'Siap Panen' ? 'success' : ($keterangan === 'Hampir Siap' ? 'warning text-dark' : 'danger') ?>">
                        <?= $keterangan ?>
                      </span>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>
