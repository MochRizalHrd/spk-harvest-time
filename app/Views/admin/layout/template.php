<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Dashboard' ?></title>

    <!-- CSS SB Admin -->
    <link href="<?= base_url('sb-admin/css/styles.css') ?>" rel="stylesheet">
    <link href="<?= base_url('sb-admin/css/custom.css') ?>" rel="stylesheet">

    <!-- jQuery (harus sebelum Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Tambahkan di <head> layout/template.php -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&display=swap" rel="stylesheet">


</head>

<body class="sb-nav-fixed">

    <!-- Navbar -->
    <?= $this->include('admin/layout/navbar') ?>

    <!-- Sidenav -->
    <div id="layoutSidenav">
        <?= $this->include('admin/layout/sidebar') ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <?= $this->renderSection('content') ?>
                </div>
            </main>

            <!-- Footer -->
            <?= $this->include('admin/layout/footer') ?>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap Bundle JS (termasuk Popper.js)
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('sb-admin/js/scripts.js') ?>"></script>
</body>

</html>