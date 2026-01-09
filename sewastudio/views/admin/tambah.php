<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0">
            <div class="card-header bg-primary text-white p-3">
                <h4 class="mb-0">Tambah Studio Baru</h4>
            </div>
            <div class="card-body p-4">
                <form action="index.php?url=proses-tambah" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Studio</label>
                        <input type="text" name="nama" class="form-control" placeholder="Contoh: Death Room" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Harga per Jam (Rp)</label>
                        <input type="number" name="harga" class="form-control" placeholder="150000" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama File Gambar</label>
                        <input type="text" name="gambar" class="form-control" placeholder="contoh: studio1.jpg">
                        <small class="text-muted text-italic">*Pastikan file sudah ada di folder assets/images/</small>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Fasilitas</label>
                        <textarea name="fasilitas" class="form-control" rows="3" placeholder="Gitar, Bass, Drum, dll" required></textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="index.php?url=dashboard-admin" class="btn btn-secondary px-4">Kembali</a>
                        <button type="submit" class="btn btn-primary px-4">Simpan Studio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>