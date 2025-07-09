<nav class="sb-topnav navbar navbar-expand navbar-light bg-white custom-navbar shadow-sm">
    <!-- Brand -->
    <a class="navbar-brand ps-3 fw-bold text-primary" href="<?= base_url() ?>">SPK Harvest Time</a>

    <!-- Sidebar Toggle (jika kamu ingin) -->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-primary" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Right -->
    <ul class="navbar-nav ms-auto me-3">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown">
                <i class="fas fa-user-circle me-1"></i> Admin
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Profil</a></li>
                <li><a class="dropdown-item" href="<?=base_url('logout')?>">Keluar</a></li>
            </ul>
        </li>
    </ul>
</nav>