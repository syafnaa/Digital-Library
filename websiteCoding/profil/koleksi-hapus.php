<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM koleksipribadi WHERE koleksiID=$id");
if ($query) {
    echo '<script>alert("Data berhasil dihapus"); location.href="index.php?page=profil/profil"; </script>';
} else {
    echo '<script>alert("Data gagal dihapus"); location.href="index.php?page=profil/profil"; </script>';
}
?>