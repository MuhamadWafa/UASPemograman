<?php
ob_start(); 
session_start();

require_once 'config/database.php'; 
require_once 'models/Auth.php';     
require_once 'models/studio.php';   

$akses_db = new KoneksiUtama();
$db       = $akses_db->ambilKoneksi();
$auth     = new Auth($db);
$manager  = new StudioManager($db); 

$url = isset($_GET['url']) ? $_GET['url'] : 'home';

switch ($url) {
    case 'login': include 'views/login.php'; break;
    case 'proses-login':
        if ($auth->login($_POST['username'], $_POST['password'])) {
            $_SESSION['role'] == 'admin' ? header('Location: index.php?url=dashboard-admin') : header('Location: index.php?url=home');
            exit();
        } else {
            echo "<script>alert('Login Gagal!'); window.location='index.php?url=login';</script>";
        }
        break;
    case 'logout': session_destroy(); header('Location: index.php?url=login'); exit();

    // --- ADMIN ---
    case 'dashboard-admin':
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') { header('Location: index.php?url=login'); exit(); }
        $cari = isset($_GET['search']) ? $_GET['search'] : '';
        $daftar_studio = $manager->ambilSemua($cari);
        include 'views/layout/header.php'; include 'views/admin/dashboard.php'; include 'views/layout/footer.php';
        break;

    // --- USER ---
    case 'home':
        $daftar_studio = $manager->ambilSemua();
        include 'views/layout/header.php'; include 'views/user/home.php'; include 'views/layout/footer.php';
        break;

    case 'pesan':
        if (!isset($_SESSION['role'])) { header('Location: index.php?url=login'); exit(); }
        $data_studio = $manager->getById($_GET['id']);
        include 'views/layout/header.php'; include 'views/user/pesan.php'; include 'views/layout/footer.php';
        break;

    case 'proses-pesan':
        $total = $_POST['harga'] * $_POST['durasi'];
        if ($manager->simpanSewa($_SESSION['id_user'], $_POST['id_studio'], $_POST['tanggal'], $_POST['jam'], $_POST['durasi'], $total)) {
            // Lari ke halaman pembayaran sambil bawa info total harga
            header("Location: index.php?url=pembayaran&total=$total");
            exit();
        }
        break;

    case 'pembayaran':
        if (!isset($_SESSION['role'])) { header('Location: index.php?url=login'); exit(); }
        include 'views/layout/header.php'; include 'views/user/pembayaran.php'; include 'views/layout/footer.php';
        break;

    case 'riwayat':
        if (!isset($_SESSION['role'])) { header('Location: index.php?url=login'); exit(); }
        $daftar_sewa = $manager->riwayatSewa($_SESSION['id_user']);
        include 'views/layout/header.php'; include 'views/user/riwayat.php'; include 'views/layout/footer.php';
        break;

    default: header('Location: index.php?url=home'); break;
}
ob_end_flush();