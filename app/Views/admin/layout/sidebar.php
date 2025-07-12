<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sidebar-modern" id="sidenavAccordion">

        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading text-uppercase text-white-50 small">Menu</div>

                <?php $uri = uri_string(); ?>

                <a class="nav-link <?= $uri == 'dashboard' ? 'active' : '' ?>" href="<?= base_url('dashboard') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <a class="nav-link <?= $uri == 'kriteria' ? 'active' : '' ?>" href="<?= base_url('kriteria') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-sliders-h"></i></div>
                    Data Kriteria
                </a>

                <a class="nav-link <?= $uri == 'alternatif' ? 'active' : '' ?>" href="<?= base_url('alternatif') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-seedling"></i></div>
                    Data Alternatif
                </a>

                <a class="nav-link <?= $uri == 'umur' ? 'active' : '' ?>" href="<?= base_url('umur') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-hourglass-half"></i></div>
                    Skala Umur
                </a>

                <a class="nav-link <?= $uri == 'rata' ? 'active' : '' ?>" href="<?= base_url('rata') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-weight"></i></div>
                    Skala Berat Rata-Rata
                </a>

                <a class="nav-link <?= $uri == 'konsumsi' ? 'active' : '' ?>" href="<?= base_url('konsumsi') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-fish"></i></div>
                    Skala Tingkat Konsumsi
                </a>

                <a class="nav-link <?= $uri == 'aktivitas' ? 'active' : '' ?>" href="<?= base_url('aktivitas') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-water"></i></div>
                    Skala Aktivitas
                </a>

                <a class="nav-link <?= $uri == 'kematian' ? 'active' : '' ?>" href="<?= base_url('kematian') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-circle-exclamation"></i></div>
                    Skala Tingkat Kematian
                </a>

                <!-- <a class="nav-link <?= $uri == 'rating' ? 'active' : '' ?>" href="<?= base_url('rating') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-check-circle"></i></div>
                    Rating Kecocokan Nilai
                </a> -->

                <a class="nav-link <?= $uri == 'perhitungan' ? 'active' : '' ?>" href="<?= base_url('perhitungan') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-calculator"></i></div>
                    Proses Perhitungan
                </a>

             

            </div>
        </div>
        <div class="sb-sidenav-footer text-white-50">
            <div class="small">Login sebagai:</div>
            Admin
        </div>
    </nav>
</div>