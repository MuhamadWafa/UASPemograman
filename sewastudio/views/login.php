<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Rockstar - DeathPit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #1a1a1a;
            /* Corak tengkorak yang sama dengan header */
            background-image: url('assets/images/skull-pattern.svg');
            background-size: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 15px;
        }

        .card {
            background-color: rgba(33, 37, 41, 0.9); /* Dark transparan */
            border: 2px solid #dc3545; /* Border merah khas DeathPit */
            border-radius: 15px;
            color: white;
            backdrop-filter: blur(5px);
        }

        .card-header {
            border-bottom: 1px solid #444;
            text-align: center;
            padding: 2rem 1rem;
        }

        .brand-name {
            font-family: 'Rock Salt', cursive;
            color: #dc3545;
            font-size: 2rem;
            text-shadow: 2px 2px #000;
        }

        .form-control {
            background-color: #2b2f32;
            border: 1px solid #444;
            color: white;
        }

        .form-control:focus {
            background-color: #32373a;
            border-color: #dc3545;
            color: white;
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            font-weight: 600;
            letter-spacing: 1px;
            padding: 10px;
        }

        .btn-danger:hover {
            background-color: #bb2d3b;
            transform: scale(1.02);
            transition: 0.3s;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="card shadow-lg">
        <div class="card-header">
            <div class="brand-name mb-2">DEATHPIT</div>
            <p class="text-muted mb-0">Enter the pit to book your session</p>
        </div>
        <div class="card-body p-4">
            <form action="index.php?url=proses-login" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Rockstar name" required autofocus>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="••••••••" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-danger text-uppercase">Masuk Pit</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center border-0 pb-4">
            <a href="index.php?url=home" class="text-decoration-none text-muted small">← Kembali ke Beranda</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>