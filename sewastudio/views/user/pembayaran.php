<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow border-0">
            <div class="card-header bg-dark text-white p-3 text-center">
                <h4 class="mb-0 fw-bold">METODE PEMBAYARAN</h4>
            </div>
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center border-end">
                        <h5 class="fw-bold mb-3">Opsi 1: Scan QRIS</h5>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=DeathPitStudioPay" class="img-fluid border p-2 mb-3" alt="QRIS">
                        <p class="small text-muted">Mendukung: GoPay, OVO, Dana, LinkAja</p>
                    </div>

                    <div class="col-md-6 ps-md-4">
                        <h5 class="fw-bold mb-3">Opsi 2: Transfer Bank</h5>
                        <div class="alert alert-light border">
                            <p class="mb-1"><strong>Bank BCA</strong></p>
                            <h4 class="text-danger fw-bold">8820 1234 567</h4>
                            <p class="small mb-0 text-muted">a.n. DeathPit Studio</p>
                        </div>
                        <div class="alert alert-light border">
                            <p class="mb-1"><strong>Bank Mandiri</strong></p>
                            <h4 class="text-danger fw-bold">1670 0012 3456</h4>
                            <p class="small mb-0 text-muted">a.n. DeathPit Studio</p>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="bg-light p-3 rounded mb-4">
                    <h5 class="fw-bold text-center mb-0">Total yang harus dibayar: 
                        <span class="text-danger">Rp <?= number_format($_GET['total'], 0, ',', '.') ?></span>
                    </h5>
                </div>

                <div class="alert alert-warning small">
                    <strong>PENTING:</strong> Kirimkan bukti transfer ke WhatsApp admin (0812-xxxx-xxxx) agar status booking Anda segera dikonfirmasi.
                </div>

                <div class="d-grid gap-2">
                    <a href="index.php?url=riwayat" class="btn btn-dark fw-bold py-2">Selesai & Cek Riwayat</a>
                </div>
            </div>
        </div>
    </div>
</div>