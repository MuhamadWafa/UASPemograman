<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Manajemen Studio</h2>
    <a href="index.php?url=tambah-studio" class="btn btn-primary shadow-sm">+ Tambah Studio</a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-4">
        <form action="index.php" method="GET" class="row g-2 mb-4">
            <input type="hidden" name="url" value="dashboard-admin">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Cari nama studio..." value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-dark w-100">Cari</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="50">No</th>
                        <th>Nama Studio</th>
                        <th>Harga/Jam</th>
                        <th>Fasilitas</th>
                        <th width="180" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = (isset($_GET['page']) ? ($_GET['page'] - 1) * 5 : 0) + 1;
                    // FIX: Menggunakan $daftar_studio sesuai kiriman dari index.php
                    if (isset($daftar_studio) && $daftar_studio->num_rows > 0): 
                        while($row = $daftar_studio->fetch_assoc()): 
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td class="fw-bold"><?= $row['nama_studio'] ?></td>
                            <td class="text-danger fw-bold">Rp <?= number_format($row['harga_per_jam'], 0, ',', '.') ?></td>
                            <td><small class="text-muted"><?= $row['fasilitas'] ?></small></td>
                            <td class="text-center">
                                <a href="index.php?url=edit-studio&id=<?= $row['id_studio'] ?>" class="btn btn-warning btn-sm px-3">Edit</a>
                                <a href="index.php?url=hapus-studio&id=<?= $row['id_studio'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus studio ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php 
                        endwhile; 
                    else: 
                    ?>
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i>Belum ada data studio. Silakan tambah data baru.</i>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>