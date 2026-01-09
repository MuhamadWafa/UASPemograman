// --- 1. DATA MASTER (Disimpan di LocalStorage agar bisa ditambah/hapus) ---
let dataStudio = JSON.parse(localStorage.getItem('db_studio')) || [
    { id: 1, nama: "Death Room (VIP)", harga: 150000, fasilitas: "Gitar 2, Efek 2, Bass 1, Drum 1", gambar: "assets/images/studio1.png" },
    { id: 2, nama: "Pit Room (Reguler)", harga: 75000, fasilitas: "Gitar 2, Efek 2, Bass 1, Drum 1", gambar: "assets/images/studio2.png" },
    { id: 3, nama: "Kematian Room", harga: 50000, fasilitas: "Gitar 2, Efek 2, Bass 1, Drum 1", gambar: "assets/images/kematian.png" }
];

// Simpan data awal jika LocalStorage kosong
if (!localStorage.getItem('db_studio')) {
    localStorage.setItem('db_studio', JSON.stringify(dataStudio));
}

// --- 2. FUNGSI AUTH (Pembeda Admin & User) ---
function updateNavbar() {
    const user = JSON.parse(sessionStorage.getItem('session_user'));
    const nav = document.getElementById('nav-items');
    
    if (user) {
        let adminMenu = user.role === 'admin' ? 
            `<a href="#" class="nav-link text-info me-3 fw-bold" onclick="showPage('admin-dashboard')">KELOLA STUDIO</a>` : '';
        
        nav.innerHTML = `
            <a href="#" class="nav-link text-white me-3" onclick="showPage('home')">Home</a>
            <a href="#" class="nav-link text-white me-3" onclick="showPage('riwayat')">Riwayat</a>
            ${adminMenu}
            <span class="text-warning me-3 fw-bold">Halo, ${user.name} (${user.role})</span>
            <button class="btn btn-outline-danger btn-sm" onclick="logout()">Logout</button>
        `;
    } else {
        nav.innerHTML = `<button class="btn btn-danger btn-sm fw-bold px-3" onclick="showPage('login')">LOGIN</button>`;
    }
}

function login() {
    const user = document.getElementById('username').value;
    const role = document.getElementById('role-select').value;
    
    if (user.trim() !== "") {
        sessionStorage.setItem('session_user', JSON.stringify({ name: user, role: role }));
        updateNavbar();
        showPage('home');
    } else {
        alert("Masukkan nama!");
    }
}

function logout() {
    sessionStorage.removeItem('session_user');
    updateNavbar();
    showPage('home');
}

// --- 3. SISTEM NAVIGASI ---
function showPage(page, id = null) {
    const app = document.getElementById('app');
    const user = JSON.parse(sessionStorage.getItem('session_user'));

    if (page === 'home') {
        let html = `<h2 class="fw-bold border-bottom border-danger border-3 d-inline-block mb-4">Katalog Studio</h2><div class="row g-4">`;
        dataStudio.forEach(s => {
            html += `
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden">
                        <img src="${s.gambar}" class="card-img-top" style="height:200px; object-fit:cover" onerror="this.src='https://placehold.co/600x400?text=Studio'">
                        <div class="card-body">
                            <h4 class="fw-bold">${s.nama}</h4>
                            <h5 class="text-danger fw-bold">Rp ${Number(s.harga).toLocaleString('id-ID')} / Jam</h5>
                            <p class="text-muted small">${s.fasilitas}</p>
                        </div>
                        <div class="card-footer bg-white border-0 pb-3">
                            <button onclick="showPage('pesan', ${s.id})" class="btn btn-danger w-100 fw-bold">Pesan Sekarang</button>
                        </div>
                    </div>
                </div>`;
        });
        app.innerHTML = html + `</div>`;
    } 

    else if (page === 'login') {
        app.innerHTML = `
            <div class="row justify-content-center mt-5">
                <div class="col-md-4">
                    <div class="card shadow border-0 p-4">
                        <h3 class="fw-bold text-center mb-4">LOGIN ROCKSTAR</h3>
                        <input type="text" id="username" class="form-control mb-3" placeholder="Nama Anda">
                        <select id="role-select" class="form-select mb-3">
                            <option value="user">Sebagai User (Penyewa)</option>
                            <option value="admin">Sebagai Admin (Pemilik)</option>
                        </select>
                        <button class="btn btn-danger w-100 fw-bold" onclick="login()">MASUK</button>
                    </div>
                </div>
            </div>`;
    }

    // --- DASHBOARD ADMIN (Tambah/Hapus Studio) ---
    else if (page === 'admin-dashboard') {
        if (!user || user.role !== 'admin') return showPage('home');
        
        let rows = dataStudio.map((s, i) => `
            <tr>
                <td>${i+1}</td>
                <td>${s.nama}</td>
                <td class="text-danger fw-bold">Rp ${Number(s.harga).toLocaleString('id-ID')}</td>
                <td><button class="btn btn-sm btn-outline-danger" onclick="hapusStudio(${s.id})">Hapus</button></td>
            </tr>`).join('');

        app.innerHTML = `
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold">Manajemen Studio (Admin)</h2>
                <button class="btn btn-primary fw-bold" onclick="showPage('tambah-studio')">+ Tambah Studio</button>
            </div>
            <div class="card shadow border-0">
                <table class="table align-middle mb-0">
                    <thead class="table-dark"><tr><th>No</th><th>Nama Studio</th><th>Harga/Jam</th><th>Aksi</th></tr></thead>
                    <tbody>${rows}</tbody>
                </table>
            </div>`;
    }

    else if (page === 'tambah-studio') {
        app.innerHTML = `
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card shadow border-0 p-4">
                        <h4 class="fw-bold mb-3">Tambah Studio Baru</h4>
                        <input type="text" id="new-nama" class="form-control mb-2" placeholder="Nama Studio">
                        <input type="number" id="new-harga" class="form-control mb-2" placeholder="Harga per Jam">
                        <input type="text" id="new-fasilitas" class="form-control mb-3" placeholder="Fasilitas">
                        <button class="btn btn-primary w-100 fw-bold" onclick="simpanStudioBaru()">SIMPAN STUDIO</button>
                        <button class="btn btn-light w-100 mt-2" onclick="showPage('admin-dashboard')">Batal</button>
                    </div>
                </div>
            </div>`;
    }

    // (Fitur riwayat, pesan, dan pembayaran tetap ada di bawah)
    else if (page === 'riwayat') {
        if (!user) return showPage('login');
        const list = JSON.parse(localStorage.getItem('riwayat_studio')) || [];
        let rows = list.map((r, i) => `<tr><td>${i+1}</td><td class="text-danger fw-bold">${r.nama}</td><td>${r.tgl}</td><td class="text-success fw-bold">Rp ${r.total.toLocaleString('id-ID')}</td></tr>`).join('');
        app.innerHTML = `<h2 class="fw-bold mb-4">Riwayat Sewa</h2><div class="card shadow border-0"><table class="table mb-0"><thead class="table-dark"><tr><th>No</th><th>Studio</th><th>Tanggal</th><th>Total</th></tr></thead><tbody>${rows || '<tr><td colspan="4" class="text-center">Belum ada data</td></tr>'}</tbody></table></div>`;
    }
}

// --- 4. LOGIKA CRUD ADMIN ---
function simpanStudioBaru() {
    const nama = document.getElementById('new-nama').value;
    const harga = document.getElementById('new-harga').value;
    const fasilitas = document.getElementById('new-fasilitas').value;

    if (!nama || !harga) return alert("Isi data dengan lengkap!");

    const baru = {
        id: Date.now(),
        nama: nama,
        harga: parseInt(harga),
        fasilitas: fasilitas,
        gambar: "assets/images/studio1.png" // default gambar
    };

    dataStudio.push(baru);
    localStorage.setItem('db_studio', JSON.stringify(dataStudio));
    alert("Studio Berhasil Ditambahkan!");
    showPage('admin-dashboard');
}

function hapusStudio(id) {
    if (confirm("Hapus studio ini?")) {
        dataStudio = dataStudio.filter(s => s.id !== id);
        localStorage.setItem('db_studio', JSON.stringify(dataStudio));
        showPage('admin-dashboard');
    }
}

// --- 5. INITIAL RUN ---
document.addEventListener('DOMContentLoaded', () => {
    updateNavbar();
    showPage('home');
});