<!doctype html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'SPK Bandeng') ?></title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Fonts: Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Tambahkan ini di <head> HTML -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Navbar -->
  <!-- Tambahkan di <head> -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


  <!-- Custom Font Style -->
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    .navbar-scroll {
      background-color: #ffffff !important;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
      transition: all 0.3s ease;
    }

    #mobileMenu {
      transition: all 0.3s ease;
      overflow-y: auto;
    }

    #mobileMenu.show {
      left: 0;
    }
  </style>
</head>

<body class="d-flex flex-column">

  <!-- Navbar -->
  <?= view('user/layouts/navbar') ?>

  <!-- Main Content -->
  <main class="flex-fill py-0">
    <div class="container-fluid px-0">
      <?= $this->renderSection('content') ?>
    </div>
  </main>

  <!-- Footer -->
  <?= view('user/layouts/footer') ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const navbar = document.getElementById("navbar");

    window.addEventListener("scroll", () => {
      if (window.scrollY > 30) {
        navbar.classList.add("navbar-scroll");
      } else {
        navbar.classList.remove("navbar-scroll");
      }
    });


    const menuToggle = document.getElementById('menuToggle');
    const closeMenu = document.getElementById('closeMenu');
    const mobileMenu = document.getElementById('mobileMenu');

    menuToggle.addEventListener('click', () => {
      mobileMenu.classList.remove('d-none');
    });

    closeMenu.addEventListener('click', () => {
      mobileMenu.classList.add('d-none');
    });
  </script>

</body>

</html>