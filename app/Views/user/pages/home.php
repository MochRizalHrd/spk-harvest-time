<?= $this->extend('user/layouts/mainLayout') ?>

<?= $this->section('content') ?>

<section class="text-white d-flex align-items-center justify-content-center text-center" style="
  min-height: 55vh;
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(to right, rgba(90, 200, 250, 0.6), rgba(176, 68, 246, 0.6)),
              url('<?= base_url('') ?>') center center / cover no-repeat;
  background-blend-mode: overlay;
">
    <div class="container py-5 mt-3">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <h1 class="fw-bold mb-2" style="font-size: 2.5rem;">
                    Sistem Rekomendasi Panen <br />Ikan Bandeng
                </h1>
                <p class="mb-4 text-white-80" style="font-size: 1.125rem;">
                    Optimalkan hasil panen tambak Anda dengan teknologi berbasis data yang cerdas dan akurat.
                </p>
                <a href="<?= base_url('rekomendasi') ?>" class="btn btn-light btn-md px-4">
                    Cek Rekomendasi
                </a>
            </div>
        </div>
    </div>
</section>



<!-- Transition Wave -->
<div style="height: 10px; background: white; clip-path: ellipse(75% 100% at 50% 0); margin-top: -1px;"></div>

<!-- Fitur Section -->
<section class="bg-white text-center pb-4">
    <div class="container">
        <div class="row g-4">
            <!-- Fitur 1 -->
            <div class="col-md-3">
                <div class="p-4 border rounded shadow-sm h-100 text-center">
                    <i class="bi bi-check2-circle fs-1 text-primary mb-3"></i>
                    <h5 class="fw-bold">Akurat & Teruji</h5>
                    <p class="small">Menggunakan metode AHP/SAW untuk hasil keputusan yang logis dan dapat dipertanggungjawabkan.</p>
                </div>
            </div>

            <!-- Fitur 2 -->
            <div class="col-md-3">
                <div class="p-4 border rounded shadow-sm h-100 text-center">
                    <i class="bi bi-graph-up-arrow fs-1 text-success mb-3"></i>
                    <h5 class="fw-bold">Optimasi Panen</h5>
                    <p class="small">Menentukan waktu panen ikan yang optimal berdasarkan kriteria teknis & lingkungan.</p>
                </div>
            </div>

            <!-- Fitur 3 -->
            <div class="col-md-3">
                <div class="p-4 border rounded shadow-sm h-100 text-center">
                    <i class="bi bi-database-check fs-1 text-info mb-3"></i>
                    <h5 class="fw-bold">Data Tambak</h5>
                    <p class="small">Analisis berdasarkan data nyata dari tambak seperti umur ikan, kualitas air, dan pakan.</p>
                </div>
            </div>

            <!-- Fitur 4 -->
            <div class="col-md-3">
                <div class="p-4 border rounded shadow-sm h-100 text-center">
                    <i class="bi bi-ui-checks-grid fs-1 text-warning mb-3"></i>
                    <h5 class="fw-bold">Mudah Digunakan</h5>
                    <p class="small">Antarmuka sederhana, cocok untuk petambak tanpa latar belakang teknis.</p>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="py-5 bg-light" style="font-family: 'Poppins', sans-serif;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-semibold">Kenapa Harus Menentukan <br /> Waktu Panen Dengan Tepat?</h2>
            <p class="text-muted mt-2">Menggunakan sistem SPK membantu petambak membuat keputusan lebih cerdas dan efisien.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <div class="mb-3 text-primary fs-1"><i class="bi bi-graph-up-arrow"></i></div>
                    <h5 class="fw-semibold">Meningkatkan Hasil Panen</h5>
                    <p class="text-muted">Panen di waktu optimal menghasilkan ukuran dan kualitas ikan bandeng terbaik.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <div class="mb-3 text-success fs-1"><i class="bi bi-clock-history"></i></div>
                    <h5 class="fw-semibold">Efisiensi Waktu</h5>
                    <p class="text-muted">SPK mengurangi kebingungan dan mempercepat proses pengambilan keputusan panen.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <div class="mb-3 text-danger fs-1"><i class="bi bi-exclamation-triangle"></i></div>
                    <h5 class="fw-semibold">Minim Risiko Kerugian</h5>
                    <p class="text-muted">Salah waktu panen bisa menyebabkan kerugian besar. SPK membantu menghindarinya.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <div class="mb-3 text-warning fs-1"><i class="bi bi-lightbulb"></i></div>
                    <h5 class="fw-semibold">Berbasis Data & Cerdas</h5>
                    <p class="text-muted">SPK menganalisis berbagai faktor seperti umur ikan, kondisi cuaca, dan kualitas air.</p>
                </div>
            </div>
        </div>
    </div>
</section>



<?= $this->endSection() ?>