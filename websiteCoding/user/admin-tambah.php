<?php
if(isset($_POST['name'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    
    $query = mysqli_query($koneksi, "INSERT INTO petugas (name,username,password,level) VALUES ('$name','$username','$password','$level')");
        if ($query) {
            echo '<script>alert("Tambah data berhasil")</script>';
        } else {
            echo '<script>alert("Tambah data gagal")</script>';
        }
    }
   
?>

    <div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card" style="margin-top: -5rem;">
    <div class="card">
    <div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
                    <h4 class="card-title">Tambah Data</h4>             
                    <a href="?page=user/admin" class="btn btn-primary" style="margin-bottom:1rem;">Kembali</a>
                    
                    
                    <form method="post">
                        <table class="table">
                            <tr>
                                <td width="200">Name</td>
                                <td width="1">:</td>
                                <td><input class="form-control" type="text" name="name" required></td>
                            </tr>
                            <tr>
                                <td width="200">Username</td>
                                <td width="1">:</td>
                                <td><input class="form-control" type="text" name="username" required></td>
                            </tr>
                            <tr>
                                <td width="200">Password</td>
                                <td width="1">:</td>
                                <td><input class="form-control" type="password" name="password" required></td>
                            </tr>
                            <tr>
                                <td width="200">Level</td>
                                <td width="1">:</td>
                                <td>
                                    <select name="level" class="form-select">
                                        <option value="admin">admin</option>
                                        <option value="petugas">petugas</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><button class="btn btn-success" type="submit">Simpan</button></td>
                            </tr>
                            
                        </table>
                    </form>
				</div>
			</div>
		</div>
	</div>