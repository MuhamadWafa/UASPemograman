<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0">
            <div class="card-header bg-danger text-white">
                <h4 class="mb-0">Booking Studio: <?= $data_studio['nama_studio'] ?></h4>
            </div>
            <div class="card-body p-4">
                <form action="index.php?url=proses-pesan" method="POST">
                    <input type="hidden" name="id_studio" value="<?= $data_studio['id_studio'] ?>">
                    <input type="hidden" name="harga" value="<?= $data_studio['harga_per_jam'] ?>">
                    
                    <div class="mb-3">
                        <label class="form-label">Harga per Jam</label>
                        <input type="text" class="form-control bg-light" value="Rp <?= number_format($data_studio['harga_per_jam'], 0, ',', '.') ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Latihan</label>
                        <input type="date" name="tanggal" class="form-control" required min="<?= date('Y-m-d') ?>">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jam Mulai</label>
                            <input type="time" name="jam" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Durasi (Jam)</label>
                            <input type="number" name="durasi" class="form-control" placeholder="Contoh: 2" min="1" required>
                        </div>
                    </div>

                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-danger btn-lg">Konfirmasi Booking</button>
                        <a href="index.php?url=home" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>