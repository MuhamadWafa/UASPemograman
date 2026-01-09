<?php
class StudioManager {
    private $koneksi;

    public function __construct($db) {
        $this->koneksi = $db;
    }

    public function ambilSemua($kata_kunci = '', $batas = 9, $mulai_dari = 0) {
        $cari = "%$kata_kunci%";
        $sql = "SELECT * FROM studio WHERE nama_studio LIKE ? LIMIT ? OFFSET ?";
        $perintah = $this->koneksi->prepare($sql);
        $perintah->bind_param("sii", $cari, $batas, $mulai_dari);
        $perintah->execute();
        return $perintah->get_result();
    }

    public function getById($id) {
        $sql = "SELECT * FROM studio WHERE id_studio = ?";
        $perintah = $this->koneksi->prepare($sql);
        $perintah->bind_param("i", $id);
        $perintah->execute();
        return $perintah->get_result()->fetch_assoc();
    }

    public function tambahData($nama, $harga, $fasilitas, $gambar) {
        $sql = "INSERT INTO studio (nama_studio, harga_per_jam, fasilitas, gambar) VALUES (?, ?, ?, ?)";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("siss", $nama, $harga, $fasilitas, $gambar);
        return $stmt->execute();
    }

    public function updateData($id, $nama, $harga, $fasilitas, $gambar) {
        $sql = "UPDATE studio SET nama_studio=?, harga_per_jam=?, fasilitas=?, gambar=? WHERE id_studio=?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("sissi", $nama, $harga, $fasilitas, $gambar, $id);
        return $stmt->execute();
    }

    public function hapusData($id) {
        $sql = "DELETE FROM studio WHERE id_studio = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function hitungTotal($kata_kunci = '') {
        $cari = "%$kata_kunci%";
        $sql = "SELECT COUNT(*) as total FROM studio WHERE nama_studio LIKE ?";
        $perintah = $this->koneksi->prepare($sql);
        $perintah->bind_param("s", $cari);
        $perintah->execute();
        $hasil = $perintah->get_result()->fetch_assoc();
        return $hasil['total'];
    }

    public function simpanSewa($id_user, $id_studio, $tgl, $jam, $durasi, $total) {
        $sql = "INSERT INTO penyewaan (id_user, id_studio, tanggal_sewa, jam_mulai, durasi, total_harga) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->koneksi->prepare($sql);
        if (!$stmt) die("Error: " . $this->koneksi->error);
        $stmt->bind_param("iissii", $id_user, $id_studio, $tgl, $jam, $durasi, $total);
        return $stmt->execute();
    }

    public function riwayatSewa($id_user) {
        $sql = "SELECT p.*, s.nama_studio FROM penyewaan p 
                JOIN studio s ON p.id_studio = s.id_studio 
                WHERE p.id_user = ? ORDER BY p.id_sewa DESC";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("i", $id_user);
        $stmt->execute();
        return $stmt->get_result();
    }
}