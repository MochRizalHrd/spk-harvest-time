<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'SPK Bandeng') ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

  <!-- Navbar-->
  <?= view('user/layouts/navbar') ?>

  <!-- Main Content -->
  <main class="flex-fill py-4">
    <div class="container">
      <?= $this->renderSection('content') ?>
    </div>
  </main>

  <!-- Footer-->
  <?= view('user/layouts/footer') ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
