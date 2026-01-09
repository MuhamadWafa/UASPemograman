<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0">
            <div class="card-header bg-warning text-dark p-3">
                <h4 class="mb-0 fw-bold">Edit Data Studio</h4>
            </div>
            <div class="card-body p-4">
                <form action="index.php?url=proses-edit" method="POST">
                    <input type="hidden" name="id" value="<?= $data['id_studio'] ?>">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Studio</label>
                        <input type="text" name="nama" class="form-control" value="<?= $data['nama_studio'] ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Harga per Jam (Rp)</label>
                        <input type="number" name="harga" class="form-control" value="<?= $data['harga_per_jam'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama File Gambar (di assets/images/)</label>
                        <input type="text" name="gambar" class="form-control" value="<?= $data['gambar'] ?>" placeholder="contoh: studio1.png">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Fasilitas</label>
                        <textarea name="fasilitas" class="form-control" rows="3" required><?= $data['fasilitas'] ?></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="index.php?url=dashboard-admin" class="btn btn-secondary px-4">Batal</a>
                        <button type="submit" class="btn btn-warning px-4 fw-bold">Update Studio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>