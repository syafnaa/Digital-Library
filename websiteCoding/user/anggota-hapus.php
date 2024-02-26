<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM user WHERE userID=$id");
if ($query) {
    echo '<script>alert("Data berhasil dihapus"); location.href="index.php?page=user/anggota"; </script>';
} else {
    echo '<script>alert("Data gagal dihapus"); location.href="index.php?page=user/anggota"; </script>';
}
?>