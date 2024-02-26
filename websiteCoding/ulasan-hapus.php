<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM ulasanbuku WHERE ulasanID=$id");
if ($query) {
    echo '<script>alert("Data berhasil dihapus"); location.href="index.php?page=ulasan"; </script>';
} else {
    echo '<script>alert("Data gagal dihapus"); location.href="index.php?page=ulasan"; </script>';
}
?>