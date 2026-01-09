<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeathPit Studio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .navbar-brand { font-family: 'Rock Salt', cursive; }

        /* PERBAIKAN: Gunakan PHP untuk memastikan path gambar selalu benar dari index.php */
        .navbar-skull-theme {
            background-color: #1a1a1a !important; 
            /* Jalur gambar relatif terhadap index.php */
            background-image: url('assets/images/tengkorak.png'); 
            background-size: 80px; 
            background-repeat: repeat;
            border-bottom: 4px solid #dc3545;
            position: relative;
        }

        /* Memberikan lapisan gelap transparan agar menu tetap terbaca jelas di atas corak */
        .navbar-skull-theme::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.6); 
            z-index: 0;
        }

        .navbar .container {
            position: relative;
            z-index: 1; /* Supaya teks berada di atas lapisan gelap */
        }

        .nav-link { font-weight: 600; }
        .admin-badge { background-color: #ffc107; color: black !important; font-weight: bold; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-skull-theme shadow mb-4">
    <div class="container">
        <a class="navbar-brand text-danger fs-3" href="index.php">DEATHPIT</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link" href="index.php?url=home">Home</a></li>
                
                <?php if(isset($_SESSION['role'])): ?>
                    <?php if($_SESSION['role'] == 'admin'): ?>
                        <li class="nav-item"><a class="nav-link badge admin-badge px-3 mx-2" href="index.php?url=dashboard-admin">PANEL ADMIN</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link text-info" href="index.php?url=riwayat">Riwayat Sewa</a></li>
                    <?php endif; ?>
                    
                    <li class="nav-item ms-3">
                        <span class="text-white me-2 small">Rockstar: <strong><?= $_SESSION['username'] ?></strong></span>
                        <a class="btn btn-outline-danger btn-sm" href="index.php?url=logout">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item"><a class="btn btn-danger btn-sm px-4" href="index.php?url=login">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container">