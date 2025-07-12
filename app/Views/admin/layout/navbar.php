<nav class="sb-topnav navbar navbar-expand navbar-light bg-white custom-navbar shadow-sm">
    <!-- Brand -->
    <a class="navbar-brand ps-3 fw-bold text-primary" href="<?= base_url() ?>">SPK Harvest Time</a>

    <!-- Sidebar Toggle (jika kamu ingin) -->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-primary" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Right -->
    <ul class="navbar-nav ml-auto mr-3">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle mr-1"></i> Admin
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Profil</a>
                <a class="dropdown-item" href="<?= base_url('logout') ?>">Keluar</a>
            </div>
        </li>
    </ul>

</nav>