<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sidebar-modern" id="sidenavAccordion">

        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading text-uppercase text-white-50 small">Menu</div>

                <?php $uri = uri_string(); ?>

                <a class="nav-link <?= $uri == '' ? 'active' : '' ?>" href="<?= base_url() ?>">
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

                <a class="nav-link <?= $uri == 'pembobotan' ? 'active' : '' ?>" href="<?= base_url('pembobotan') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-balance-scale"></i></div>
                    Pembobotan Nilai Kriteria
                </a>

                <a class="nav-link <?= $uri == 'rating' ? 'active' : '' ?>" href="<?= base_url('rating') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-check-circle"></i></div>
                    Rating Kecocokan Nilai
                </a>

                <a class="nav-link <?= $uri == 'perhitungan' ? 'active' : '' ?>" href="<?= base_url('perhitungan') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-calculator"></i></div>
                    Proses Perhitungan
                </a>

                <a class="nav-link <?= $uri == 'user' ? 'active' : '' ?>" href="<?= base_url('user') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                    Manajemen User
                </a>

                <a class="nav-link <?= $uri == 'profil' ? 'active' : '' ?>" href="<?= base_url('profil') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                    Profil User
                </a>

            </div>
        </div>
        <div class="sb-sidenav-footer text-white-50">
            <div class="small">Login sebagai:</div>
            Admin
        </div>
    </nav>
</div>