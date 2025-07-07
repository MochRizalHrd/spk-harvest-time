<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<!-- <h5 class="mb-3"><?= esc($title) ?></h5> -->
<div class="container py-5">

  <!-- Judul -->
  <div class="mb-4">
    <h3 class="fw-bold text-primary">📊 Hasil Perhitungan SAW</h3>
    <p class="text-muted">Berikut adalah detail proses dari metode SAW (Simple Additive Weighting).</p>
  </div>

  <!-- Matriks Keputusan -->
  <div class="mb-5">
    <h5 class="fw-semibold mb-3">1️⃣ Matriks Keputusan</h5>
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="table-light">
          <tr>
            <th>Alternatif</th>
            <?php foreach ($kriteria as $kri): ?>
              <th><?= esc($kri['kode']) ?> <br><small>(<?= esc($kri['kriteria']) ?>)</small></th>
            <?php endforeach ?>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($matriks as $idAlt => $row): ?>
            <tr>
              <td><?= esc($alternatif[$idAlt]['kode']) ?> - <?= esc($alternatif[$idAlt]['nama']) ?></td>
              <?php foreach ($kriteria as $kri): ?>
                <td><?= esc($row[$kri['id']]) ?></td>
              <?php endforeach ?>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Normalisasi -->
  <div class="mb-5">
    <h5 class="fw-semibold mb-3">2️⃣ Matriks Normalisasi</h5>
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="table-light">
          <tr>
            <th>Alternatif</th>
            <?php foreach ($kriteria as $kri): ?>
              <th><?= esc($kri['kode']) ?></th>
            <?php endforeach ?>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($normalisasi as $idAlt => $row): ?>
            <tr>
              <td><?= esc($alternatif[$idAlt]['kode']) ?></td>
              <?php foreach ($kriteria as $kri): ?>
                <td><?= esc(number_format($row[$kri['id']], 4)) ?></td>
              <?php endforeach ?>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Skor Akhir -->
  <div class="mb-5">
    <h5 class="fw-semibold mb-3">3️⃣ Nilai Preferensi & Peringkat</h5>
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead class="table-primary">
          <tr>
            <th>Peringkat</th>
            <th>Kode</th>
            <th>Nama Alternatif</th>
            <th>Skor</th>
          </tr>
        </thead>
        <tbody>
          <?php $rank = 1; foreach ($hasil as $row): ?>
            <tr>
              <td><strong>#<?= $rank++ ?></strong></td>
              <td><?= esc($row['kode_alternatif']) ?></td>
              <td><?= esc($row['nama_alternatif']) ?></td>
              <td><?= esc(number_format($row['skor'], 4)) ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
<?= $this->endSection() ?>
