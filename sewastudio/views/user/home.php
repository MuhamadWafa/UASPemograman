<h2 class="fw-bold border-bottom border-danger border-3 d-inline-block mb-4">Katalog Studio</h2>

<div class="row g-4">
    <?php if (isset($daftar_studio) && $daftar_studio->num_rows > 0): ?>
        <?php while($row = $daftar_studio->fetch_assoc()): ?>
            <div class="col-md-4">
                <div class="card h-100 shadow border-0 overflow-hidden">
                    <?php 
                        $nama_file = !empty($row['gambar']) ? $row['gambar'] : 'tengkorak.png';
                        $path_gambar = "assets/images/" . $nama_file;
                    ?>
                    <div style="height: 220px; overflow: hidden;">
                        <img src="<?= $path_gambar ?>" class="card-img-top w-100 h-100" alt="Studio Image" style="object-fit: cover;">
                    </div>
                    
                    <div class="card-body">
                        <h4 class="card-title fw-bold text-dark"><?= $row['nama_studio'] ?></h4>
                        <h5 class="text-danger fw-bold">Rp <?= number_format($row['harga_per_jam'], 0, ',', '.') ?> / Jam</h5>
                        <p class="card-text text-muted small mt-3">
                            <i class="bi bi-info-circle"></i> Fasilitas: <?= $row['fasilitas'] ?>
                        </p>
                    </div>
                    <div class="card-footer bg-white border-0 pb-3">
                        <a href="index.php?url=pesan&id=<?= $row['id_studio'] ?>" class="btn btn-danger w-100 py-2 fw-bold">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="col-12 text-center py-5">
            <h3 class="text-muted">Studio belum tersedia.</h3>
        </div>
    <?php endif; ?>
</div>