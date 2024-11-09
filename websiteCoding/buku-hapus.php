<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM buku WHERE bukuID=$id");
if ($query) {
    echo '<script>alert("Data berhasil dihapus"); location.href="index.php?page=buku"; </script>';
} else {
    echo '<script>alert("Data gagal dihapus"); location.href="index.php?page=buku"; </script>';
}
?>

