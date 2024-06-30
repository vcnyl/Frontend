function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    var content = document.getElementById("content");
    sidebar.classList.toggle("active");
    content.classList.toggle("active");
}

function openProfileModal() {
    var modal = document.getElementById('profileModal');
    modal.style.display = 'block';
}

// Function to close the profile modal
function closeProfileModal() {
    var modal = document.getElementById('profileModal');
    modal.style.display = 'none';
}

// Close the modal if the user clicks outside of it
window.onclick = function(event) {
    var modal = document.getElementById('profileModal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
};

function konfirmasiHapus() {
    // Gunakan window.confirm untuk menampilkan alert konfirmasi
    var konfirmasi = window.confirm("Anda yakin ingin menghapus data ini?");

    // Jika pengguna menekan OK, kembalikan true (lanjutkan dengan penghapusan)
    return konfirmasi;
}

function konfirmasiHapusJadwal() {
    // Gunakan window.confirm untuk menampilkan alert konfirmasi
    var konfirmasi = window.confirm("Pelanggan ini memiliki beberapa jadwal, setujui hapus jadwal?");

    // Jika pengguna menekan OK, kembalikan true (lanjutkan dengan penghapusan)
    return konfirmasi;
}

function konfirmasiHapusJadwalKaryawan() {
    // Gunakan window.confirm untuk menampilkan alert konfirmasi
    var konfirmasi = window.confirm("Karyawan ini memiliki beberapa jadwal, setujui hapus jadwal?");

    // Jika pengguna menekan OK, kembalikan true (lanjutkan dengan penghapusan)
    return konfirmasi;
}
