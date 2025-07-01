<?= $this->extend('user/layouts/mainLayout') ?>

<?= $this->section('content') ?>

<section class="container-fluid px-4 py-4">
    <div class="bg-dark text-white rounded-top-4 rounded-bottom-2 p-4 position-relative overflow-hidden" style="background: url('<?= base_url('images/hero.jpeg') ?>') center center / cover no-repeat;">
        <!-- Overlay gelap untuk kontras -->
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50 rounded-4"></div>

        <div class="row align-items-center position-relative z-1">
            <!-- Kiri: Konten Hero -->
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold">Optimalkan Waktu Panen<br>Ikan Bandeng</h1>
                <p class="lead mt-3 mb-4">
                    Sistem Pendukung Keputusan cerdas berbasis data untuk membantu petambak menentukan waktu panen terbaik secara objektif dan produktif.
                </p>
                <a href="#solusi" class="btn btn-light btn-md rounded-2x1 px-4">Lihat Solusi</a>
            </div>

            <!-- Kanan: Kartu Statistik -->
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-flex flex-wrap gap-3 justify-content-end">
                    <!-- Kartu 1 -->
                    <div class="bg-white text-dark rounded-3 p-3 shadow-sm" style="width: 200px;">
                        <small class="text-muted">Top 5 Kolam Bandeng</small>
                        <div class="mt-2">
                            <img src="<?= base_url('images/ikan.png') ?>" alt="Chart" class="img-fluid">
                        </div>
                    </div>
                    <!-- Kartu 2 -->
                    <div class="bg-white text-dark rounded-3 p-3 shadow-sm" style="width: 200px;">
                        <small class="text-muted">Estimasi Produksi</small>
                        <div class="mt-2">
                            <img src="<?= base_url('images/fish.png') ?>" alt="Produksi" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Transition Wave -->
<div style="height: 80px; background: white; clip-path: ellipse(75% 100% at 50% 0); margin-top: -1px;"></div>

<!-- Fitur Section -->
<section class="bg-white text-center py-2 pb-4">
    <div class="container">
        <h2 class="fw-bold mb-4">Sistem Pendukung Keputusan<br> Panen Ikan Bandeng yang Cerdas</h2>
        <p class="mb-5">Didesain untuk membantu petambak menentukan waktu panen terbaik secara objektif, efisien, dan berbasis data.</p>

        <div class="row g-4">
            <!-- Fitur 1 -->
            <div class="col-md-3">
                <div class="p-4 border rounded shadow-sm h-100">
                    <img src="<?= base_url('images/fish.png') ?>" alt="icon" width="40" class="mb-3">
                    <h5 class="fw-bold">Akurat & Teruji</h5>
                    <p class="small">Menggunakan metode AHP/SAW untuk hasil keputusan yang logis dan dapat dipertanggungjawabkan.</p>
                </div>
            </div>

            <!-- Fitur 2 -->
            <div class="col-md-3">
                <div class="p-4 border rounded shadow-sm h-100">
                    <img src="<?= base_url('images/ikan.png') ?>" alt="icon" width="40" class="mb-3">
                    <h5 class="fw-bold">Optimasi Panen</h5>
                    <p class="small">Membantu menentukan waktu panen ikan yang optimal berdasarkan berbagai kriteria teknis dan lingkungan.</p>
                </div>
            </div>

            <!-- Fitur 3 -->
            <div class="col-md-3">
                <div class="p-4 border rounded shadow-sm h-100">
                    <img src="<?= base_url('images/fish.png') ?>" alt="icon" width="40" class="mb-3">
                    <h5 class="fw-bold">Data Tambak</h5>
                    <p class="small">Input dan analisis berdasarkan data nyata dari tambak seperti umur ikan, kualitas air, dan pakan.</p>
                </div>
            </div>

            <!-- Fitur 4 -->
            <div class="col-md-3">
                <div class="p-4 border rounded shadow-sm h-100">
                    <img src="<?= base_url('images/ikan.png') ?>" alt="icon" width="40" class="mb-3">
                    <h5 class="fw-bold">Mudah Digunakan</h5>
                    <p class="small">Tampilan antarmuka sederhana, cocok untuk petambak tanpa latar belakang teknis.</p>
                </div>
            </div>
        </div>
    </div>
</section>



<?= $this->endSection() ?>