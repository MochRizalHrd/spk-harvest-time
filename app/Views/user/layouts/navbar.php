<!-- Google Fonts & Bootstrap Icons (di <head>) -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<!-- Navbar -->
<nav id="navbar" class="navbar navbar-expand-lg navbar-light fixed-top px-3 bg-transparent" style="font-family: 'Poppins', sans-serif; transition: background-color 0.3s, box-shadow 0.3s;">

    <div class="container-fluid">
        <a class="navbar-brand fw-semibold" href="#">KUBE Anugerah</a>

        <!-- Desktop Menu -->
        <div class="collapse navbar-collapse d-none d-lg-flex">
            <ul class="navbar-nav ms-auto gap-3 py-2">
                <li class="nav-item">
                    <a class="nav-link text-dark hover:text-light fw-medium d-flex align-items-center gap-1" href="<?= base_url('/') ?>">
                        </i> Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-medium d-flex align-items-center gap-1" href="<?= base_url('inputdata') ?>">
                        <i class="bi bi-lightbulb"></i> Input Data
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-medium d-flex align-items-center gap-1" href="<?= base_url('rekomendasi') ?>">
                        <i class="bi bi-lightbulb"></i> Rekomendasi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-medium d-flex align-items-center gap-1" href="<?= base_url('riwayat') ?>">
                        <i class="bi bi-journal-text"></i> Riwayat
                    </a>
                </li>
                <?php if (session()->get('isLoggedIn')): ?>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-medium d-flex align-items-center gap-1" href="<?= base_url('dashboard') ?>">
                            <i class="bi bi-person-circle"></i> Dashboard
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <!-- <button type="button" class="btn btn-primary">Login</button> -->
                        <a class="btn btn-primary text-light fw-medium d-flex align-items-center gap-1" href="<?= base_url('login') ?>">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                    </li>
                <?php endif; ?>
            </ul>

        </div>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler border-0 d-lg-none" type="button" id="menuToggle">
            <i class="bi bi-list fs-2 text-dark"></i>
        </button>
    </div>
</nav>

<!-- Mobile Offcanvas Menu (Fullscreen) -->
<div id="mobileMenu" class="position-fixed top-0 end-0 w-100 h-100 bg-white d-none flex-column p-4 animate__animated animate__fadeInRight" style="z-index: 1055;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <span class="fw-semibold fs-4">KUBE Anugerah</span>
        <button class="btn border-0" id="closeMenu">
            <i class="bi bi-x-lg fs-4"></i>
        </button>
    </div>
    <ul class="nav flex-column gap-3">
        <li class="nav-item">
            <a href="<?=base_url('/')?>" class="nav-link text-dark d-flex align-items-center gap-2">
                <i class="bi bi-house-door"></i> Home
            </a>
        </li>

        <li class="nav-item">
            <a href="<?=base_url('inputdata')?>" class="nav-link text-dark d-flex align-items-center gap-2">
                <i class="bi bi-pencil-square"></i> Input Data
            </a>
        </li>

        <li class="nav-item">
            <a href="<?=base_url('rekomendasi')?>" class="nav-link text-dark d-flex align-items-center gap-2">
                <i class="bi bi-bar-chart-line"></i> Rekomendasi
            </a>
        </li>

        <li class="nav-item">
            <a href="<?=base_url('riwayat')?>" class="nav-link text-dark d-flex align-items-center gap-2">
                <i class="bi bi-clock-history"></i> Riwayat
            </a>
        </li>

        <li class="nav-item">
            <a href="<?=base_url('register')?>" class="nav-link text-dark d-flex align-items-center gap-2">
                <i class="bi bi-person-circle"></i> Login/Register
            </a>
        </li>

    </ul>
</div>