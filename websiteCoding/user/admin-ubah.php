<?php
$id = $_GET['id'];

if (isset($_POST['bsimpan'])) {
    $nama = $_POST['name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];

    $query = mysqli_query($koneksi, "UPDATE petugas SET name='$nama', username='$username', password='$password', level='$level' WHERE petugasID=$id");

    if ($_POST['password'] != "") {
        $query = mysqli_query($koneksi, "UPDATE petugas SET password='$password' WHERE petugasID=$id");
    }

    if ($query) {
        echo "<script>alert('Ubah data berhasil');document.location='index.php?page=user/admin';</script>";
    } else {
        echo "<script>alert('Ubah data gagal');document.location='index.php?page=user/admin';</script>";
    }
}
$query = mysqli_query($koneksi, "SELECT*FROM petugas WHERE petugasID=$id");
$data = mysqli_fetch_array($query);
?>

<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card" style="margin-top: -5rem;">
    <div class="card">
    <div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
                    <h4 class="card-title">Ubah Data</h4>             
                    <a href="?page=user/admin" class="btn btn-primary" style="margin-bottom:1rem;">Kembali</a>

                    <form method="post">
                        <table class="table">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" placeholder="Nama" name="name" value="<?php echo $data['name']?>"></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $data['username']?>"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input type="password" class="form-control" placeholder="Password" name="password"></td>
                        </tr>
                        <tr>
                            <td>Level</td>
                            <td>:</td>
                            <td>
                                <select class="form-select" aria-label="Default select example" name="level">
                                    <option selected></option>
                                    <option value="admin" <?php if($data['level'] == 'admin') echo 'selected'; ?>>Admin</option>
                                    <option value="petugas" <?php if($data['level'] == 'petugas') echo 'selected'; ?>>Petugas</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-success" name="bsimpan">Submit</button>
                            </td>
                        </tr>
                        </table>
                    </form>
				</div>
			</div>
		</div>
	</div>