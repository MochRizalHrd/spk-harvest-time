<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top" style="margin-bottom: 0; padding-bottom: 0;">
    <div class="container-fluid px-4 px-md-5 py-2">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2 " href="<?= base_url('/') ?>" style="font-size:large 
text-primary">
            <img src="<?= base_url('images/hero.jpg') ?>" alt="Logo" width="32" height="32" class="d-inline-block rounded-4">
            SPK Panen Bandeng
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Navigasi Kiri -->
            <ul class="navbar-nav ms-auto gap-1 me-lg-3">
                <li class="nav-item">
                    <a class="nav-link px-3 <?= uri_string() == '' ? 'active fw-semibold text-primary' : '' ?>" href="<?= base_url('/') ?>">
                        Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 <?= uri_string() == 'tentang' ? 'active fw-semibold text-primary' : '' ?>" href="<?= base_url('tentang') ?>">
                        Tentang Kami
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3<?= uri_string() == 'rekomendasi' ? 'active fw-semibold text-primary' : '' ?>" href="<?= base_url('rekomendasi') ?>">
                        Rekomendasi Panen
                    </a>
                </li>
            </ul>

            <!-- Area Login / Profil -->
            <?php if (session()->get('isLoggedIn')): ?>
                <!-- Jika sudah login -->
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?= base_url('images/avatar.jpg') ?>" alt="profile" width="36" height="36" class="rounded-circle me-2" style="object-fit: cover;">
                        <span class="d-none d-md-inline fw-semibold"><?= session()->get('nama') ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                        <li><a class="dropdown-item" href="<?= base_url('profil') ?>">Profil Saya</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="<?= base_url('logout') ?>">Logout</a></li>
                    </ul>
                </div>
            <?php else: ?>
                <!-- Jika belum login -->
                <a href="<?= base_url('login') ?>" class="btn btn-outline-primary rounded-2 px-6 px-md-4">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>