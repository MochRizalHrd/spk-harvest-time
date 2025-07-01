<?= $this->extend('user/layouts/mainLayout') ?>

<?= $this->section('content') ?>
<div class="container px-4 px-md-4 py-4">

    <!-- Header -->
    <div class="card border-0 shadow-sm mb-4" style="background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%); color: white;">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <i class="bi bi-clipboard-check-fill display-6 me-3"></i>
                <div>
                    <h4 class="mb-0">Form Penilaian Kelayakan Panen Ikan Bandeng</h4>
                    <small class="text-white-50">Masukkan data dari kolam untuk mengetahui waktu panen terbaik.</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Kolom Kiri: Form -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0" style="background-color: #f4f9ff;">
                <div class="card-body">
                    <h5 class="mb-3">📋 Data Kolam</h5>
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="umurIkan" class="form-label">Umur Ikan (hari)</label>
                            <input type="number" class="form-control" id="umurIkan" name="umur_ikan" min="0" required>
                        </div>

                        <div class="mb-3">
                            <label for="beratIkan" class="form-label">Berat Rata-rata Ikan (gram)</label>
                            <input type="number" class="form-control" id="beratIkan" name="berat_ikan" min="0" required>
                        </div>

                        <div class="mb-3">
                            <label for="konsumsiPakan" class="form-label">Tingkat Konsumsi Pakan</label>
                            <select class="form-select" id="konsumsiPakan" name="konsumsi_pakan" required>
                                <option value="">-- Pilih --</option>
                                <option value="tinggi">Tinggi</option>
                                <option value="sedang">Sedang</option>
                                <option value="rendah">Rendah</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="aktivitasIkan" class="form-label">Aktivitas Ikan</label>
                            <select class="form-select" id="aktivitasIkan" name="aktivitas_ikan" required>
                                <option value="">-- Pilih --</option>
                                <option value="aktif">Aktif</option>
                                <option value="normal">Normal</option>
                                <option value="pasif">Pasif</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="kematianIkan" class="form-label">Tingkat Kematian Ikan (%)</label>
                            <input type="number" class="form-control" id="kematianIkan" name="kematian_ikan" min="0" max="100" step="0.1" required>
                        </div>

                        <div class="text-center text-md-end">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-search me-1"></i> Cek Rekomendasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Placeholder Output -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0" style="background-color: #fdfdfd;">
                <div class="card-body">
                    <h5 class="mb-3">📊 Hasil Rekomendasi</h5>
                    <div class="text-muted">
                        Hasil rekomendasi waktu panen akan muncul di sini setelah Anda mengisi form.
                        <br><br>
                        <div class="bg-light border rounded p-4 text-center">
                            <i class="bi bi-bar-chart-line display-6 text-secondary"></i>
                            <p class="mt-3 mb-0">Belum ada data. Silakan isi form untuk memulai perhitungan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>