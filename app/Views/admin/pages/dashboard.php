<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="container py-4">
    <h3 class="mb-4 fw-bold text-dark"><?=$title?></h3>

    <div class="row g-4">
        <!-- Kriteria -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 bg-success bg-opacity-10">
                <div class="card-body text-center">
                    <i class="bi bi-list-check fs-2 text-white mb-2"></i>
                    <h5 class="fw-bold text-white"><?= $total_kriteria ?></h5>
                    <p class="text-white mb-0">Jumlah Kriteria</p>
                </div>
            </div>
        </div>

        <!-- Alternatif -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 bg-success bg-opacity-10">
                <div class="card-body text-center">
                    <i class="bi bi-people fs-2 text-success mb-2"></i>
                    <h5 class="fw-bold text-white"><?= $total_alternatif ?></h5>
                    <p class="text-white mb-0">Jumlah Alternatif</p>
                </div>
            </div>
        </div>

        <!-- Users -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 bg-primary bg-opacity-10">
                <div class="card-body text-center">
                    <i class="bi bi-person fs-2 text-success mb-2"></i>
                    <h5 class="fw-bold text-white"><?= $total_users ?></h5>
                    <p class="text-white mb-0">Jumlah User</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
