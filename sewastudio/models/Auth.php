<?php
class Auth {
    private $koneksi;

    public function __construct($db) {
        $this->koneksi = $db;
    }

    public function login($username, $password) {
        // 1. Ambil data user berdasarkan username
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $hasil = $stmt->get_result();

        if ($hasil->num_rows > 0) {
            $data = $hasil->fetch_assoc();
            
            // 2. Cek Password (Mendukung teks biasa DAN password_hash)
            $cek_password = false;
            if (password_verify($password, $data['password'])) {
                $cek_password = true; // Jika password di-hash
            } elseif ($password === $data['password']) {
                $cek_password = true; // Jika password teks biasa
            }

            if ($cek_password) {
                // 3. Set Session (Penting untuk pembedaan Admin/User)
                $_SESSION['id_user']  = $data['id_user'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['role']     = $data['role']; 
                return true;
            }
        }
        return false;
    }
}