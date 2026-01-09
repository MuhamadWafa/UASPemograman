<?php
class KoneksiUtama { // Harus sama persis dengan baris 11 di index.php
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db   = "sewastudio"; // Sesuaikan dengan nama DB Anda
    public $db_koneksi;

    public function ambilKoneksi() {
        $this->db_koneksi = null;
        try {
            $this->db_koneksi = new mysqli($this->host, $this->user, $this->pass, $this->db);
        } catch (Exception $e) {
            die("Koneksi Gagal: " . $e->getMessage());
        }
        return $this->db_koneksi;
    }
}