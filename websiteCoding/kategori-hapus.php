<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM kategoribuku WHERE kategoriID=$id");
if ($query) {
    echo '<script>alert("Data berhasil dihapus"); location.href="index.php?page=kategori-buku"; </script>';
} else {
    echo '<script>alert("Data gagal dihapus"); location.href="index.php?page=kategori-buku"; </script>';
}
?>