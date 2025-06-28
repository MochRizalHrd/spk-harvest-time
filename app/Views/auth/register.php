<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Register - SPK Panen Bandeng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap + Font -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            /* background: linear-gradient(135deg, #28a745, #a8e063); */
            background: linear-gradient(180deg, #0d47a1 0%, #1976d2 100%) !important;
            font-family: 'Nunito', sans-serif;
            min-height: 100vh;
        }

        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .text-register {
            color: #0d47a1;
        }

        .form-control {
            border-radius: 0.5rem;
        }

        .btn-register {
            background: linear-gradient(180deg, #0d47a1 0%, #1976d2 100%) !important;
            color: #fff;

        }

        .btn-register:hover {
            color: #fff;
        }

        .text-spa {
            color: #0d47a1;
        }
    </style>
</head>

<body>

    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-md-5">
            <div class="card p-4">
                <div class="card-body">
                    <h4 class="text-center fw-bold mb-3 text-register">Register</h4>
                    <p class="text-center text-muted mb-4 small">Buat akun untuk SPK Panen Bandeng</p>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>

                    <form method="post" action="<?= base_url('/register/process') ?>">
                        <div class="form-floating mb-3">
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                            <label>Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                            <label>Email</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                            <label>Password</label>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-block rounded-pill btn-register">Daftar</button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <a href="<?= base_url('/login') ?>" class="small text-spa">Sudah punya akun?</a>
                    </div>
                </div>
                <div class="card-footer text-muted text-center small">
                    &copy; <?= date('Y') ?> SPK Panen Bandeng
                </div>
            </div>
        </div>
    </div>

</body>

</html>