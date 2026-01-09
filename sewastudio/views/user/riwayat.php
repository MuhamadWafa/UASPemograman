<div class="row">
    <div class="col-md-12">
        <h2 class="fw-bold mb-4">Riwayat Booking Rockstar</h2>
        <div class="card shadow-sm border-0 border-top border-danger border-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th class="ps-4">No</th>
                                <th>Nama Studio</th>
                                <th>Tanggal Latihan</th>
                                <th>Jam Mulai</th>
                                <th>Durasi</th>
                                <th>Total Bayar</th>
                                <th class="pe-4 text-center">Status / Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            if (isset($daftar_sewa) && $daftar_sewa->num_rows > 0): 
                                while($row = $daftar_sewa->fetch_assoc()): 
                            ?>
                                <tr>
                                    <td class="ps-4"><?= $no++ ?></td>
                                    <td class="fw-bold text-danger"><?= $row['nama_studio'] ?></td>
                                    <td><?= date('d M Y', strtotime($row['tanggal_sewa'])) ?></td>
                                    <td><?= $row['jam_mulai'] ?></td>
                                    <td><?= $row['durasi'] ?> Jam</td>
                                    <td class="fw-bold text-success">Rp <?= number_format($row['total_harga'], 0, ',', '.') ?></td>
                                    <td class="pe-4 text-center">
                                        <a href="index.php?url=pembayaran&total=<?= $row['total_harga'] ?>" class="btn btn-outline-dark btn-sm fw-bold">
                                            Info Bayar
                                        </a>
                                    </td>
                                </tr>
                            <?php 
                                endwhile; 
                            else: 
                            ?>
                                <tr>
                                    <td colspan="7" class="text-center py-5 text-muted">Belum ada riwayat booking.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>