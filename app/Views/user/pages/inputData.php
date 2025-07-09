<?= $this->extend('user/layouts/mainLayout') ?>
<?= $this->section('content') ?>

<div class="container pt-5 pb-5 px-3 px-md-4">
    <!-- Header -->
    <div class="text-center mb-0">
        <div class="d-inline-flex align-items-center gap-3 bg-light px-4 py-5 rounded-4">
            <!-- <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                <i class="bi bi-clipboard-check-fill fs-4"></i>
            </div> -->
            <div class="text-start">
                <h4 class="fw-bold mb-1 text-dark ">Form Penilaian Kelayakan Panen Ikan Bandeng</h4>
                <small class="text-muted">Masukkan data aktual dari kolam untuk mendapatkan rekomendasi waktu panen terbaik.</small>
            </div>
        </div>
    </div>

    <!-- Section: Keterangan Skala Penilaian -->
    <section class="mb-5">
        <h4 class="fw-normal text-center text-primary mb-3">Keterangan Skala Penilaian</h4>

        <div class="accordion" id="accordionSkala">
            <?php

            $i = 1;
            foreach ($skala as $key => $value): ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading<?= $i ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $i ?>">
                            <?= $value['title'] ?>
                        </button>
                    </h2>
                    <div id="collapse<?= $i ?>" class="accordion-collapse collapse" data-bs-parent="#accordionSkala">
                        <div class="accordion-body">
                            <table class="table table-bordered table-md medium">
                                <thead class="table-light">
                                    <tr>
                                        <th>Kategori</th>
                                        <th>Nilai</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($value['data'] as $row): ?>
                                        <tr>
                                            <td><?= $row[0] ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td><?= $row[2] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php $i++;
            endforeach ?>
        </div>
    </section>

    <!-- Row: Form & Output -->
    <div class="row g-4 shadow-sm rounded-4 bg-light">
        <!-- Form Input -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 h-100 bg-light">
                <div class="card-body p-4 p-md-5">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-pencil-square fs-5"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0 text-primary">Input Data Kolam</h5>
                            <small class="text-muted">Isi data sesuai kondisi kolam saat ini.</small>
                        </div>
                    </div>

                    <form method="post" action="<?= base_url('simpanData') ?>">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kode Alternatif</label>
                            <input type="text" class="form-control" name="kode" placeholder="Masukan Kode Alternatif" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Alternatif</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Alternatif" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Umur Ikan <span class="text-muted">(bulan)</span></label>
                            <input type="decimal" class="form-control" name="umur_ikan" placeholder="Masukan umur ikan" min="0" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Berat Rata-rata Ikan <span class="text-muted">(kg)</span></label>
                            <input type="number" class="form-control" name="berat_ikan" placeholder="Masukan Berat Rata Rata Ikan satuan kg" min="0" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tingkat Konsumsi Pakan</label>
                            <input type="number" class="form-control" name="konsumsi_pakan" placeholder="Masukan Tingkat Konsumsi Pakan" min="0" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Aktivitas Ikan</label>
                            <select class="form-select" name="aktivitas_ikan" required>
                                <option value="">-- Pilih --</option>
                                <option value="Sangat Aktif">Sangat Aktif</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Cukup Aktif">Cukup Aktif</option>
                                <option value="Kurang Aktif">Kurang Aktif</option>
                                <option value="Sangat Lesu">Sangat Lesu</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tingkat Kematian Ikan</label>
                            <select class="form-select" name="kematian_ikan" required>
                                <option value="">-- Pilih --</option>
                                <option value="Sangat Rendah">Sangat Rendah</option>
                                <option value="Rendah">Rendah</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Tinggi">Tinggi</option>
                                <option value="Sangat Tinggi">Sangat Tinggi</option>
                            </select>
                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary px-4 py-2 btn-sm">
                                <i class="bi bi-save me-1 btn-sm"></i> Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Output Data -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 h-100 bg-light">
                <div class="card-body p-4 p-md-5">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-database-check fs-5"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0 text-primary">Data Kolam Tersimpan</h5>
                            <small class="text-muted">Berikut adalah daftar alternatif kolam yang Anda input.</small>
                        </div>
                    </div>

                    <?php
                    $dataList = session()->get('dataKolam');
                    if (!is_array($dataList)) {
                        $dataList = [$dataList];
                    }
                    ?>

                    <?php if (!empty($dataList)): ?>
                        <?php foreach ($dataList as $index => $data): ?>
                            <?php if (is_array($data)): ?>
                                <div class="mb-4 border rounded-3 bg-white overflow-hidden shadow-sm">
                                    <div class="px-3 py-2 border-bottom bg-light d-flex justify-content-between align-items-center">
                                        <span class="fw-semibold text-dark"><?= esc($data['kode'] ?? 'Alternatif #' . ($index + 1)) ?></span>
                                        <span class="badge bg-primary bg-opacity-75 text-white"><?= esc($data['nama'] ?? 'Alternatif') ?></span>
                                    </div>
                                    <div class="table-responsive p-3">
                                        <table class="table table-sm table-borderless">
                                            <tbody class="small">
                                                <tr>
                                                    <th class="text-muted" style="width: 40%;">Umur Ikan</th>
                                                    <td><?= esc($data['umur_ikan']) ?> bulan</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-muted">Berat Rata-Rata</th>
                                                    <td><?= esc($data['berat_ikan']) ?> gram</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-muted">Konsumsi Pakan</th>
                                                    <td><?= esc($data['konsumsi_pakan']) ?> kg</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-muted">Aktivitas</th>
                                                    <td><?= esc($data['aktivitas_ikan']) ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-muted">Tingkat Kematian</th>
                                                    <td><?= esc($data['kematian_ikan']) ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <div class="text-end mt-3">
                            <a href="<?= base_url('resetData') ?>" class="btn btn-danger btn-sm">
                                <i class="bi bi-x-circle me-1"></i> Reset Semua
                            </a>
                            <a href="<?= base_url('prosesSAW') ?>" class="btn btn-success btn-sm">
                                <i class="bi bi-send-fill me-1"></i> Proses Rekomendasi
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                            <i class="bi bi-info-circle-fill me-2"></i> Belum ada data kolam yang disimpan.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>




    </div>
</div>

<?= $this->endSection() ?>