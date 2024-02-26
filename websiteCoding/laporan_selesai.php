<?php
include "../authentication/koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($koneksi, "UPDATE peminjaman set statusPeminjaman='dikembalikan' WHERE peminjamanID=$id");
if($query) {
    echo '<script>alert("Berhasil dikonfirmasi."); location.href="index.php?page=laporan";</script>';
}
?>

