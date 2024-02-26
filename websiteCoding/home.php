    <div class="container-fluid" style="margin-top: -35rem;">
        <div class="row">
            <div class="col-12 mb-3">
                <h3 class="font-weight-bold">Dashboard</h3>
            </div>
        </div>
        <div class="row">
        <div class="col mb-4 stretch-card transparent">
            <div class="card card-tale">
            <div class="card-body">
                <p class="mb-4">Total Kategori</p>
                <p class="fs-30 mb-2"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM kategoribuku"));?></p>
                <p>overall category</p>
            </div>
            </div>
        </div>
        <div class="col mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
            <div class="card-body">
                <p class="mb-4">Total Buku</p>
                <p class="fs-30 mb-2"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM buku"));?></p>
                <p>overall book</p>
            </div>
            </div>
        </div>
        <div class="col mb-4 stretch-card transparent">
            <div class="card card-light-blue">
            <div class="card-body">
                <p class="mb-4">Total Ulasan</p>
                <p class="fs-30 mb-2"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM ulasanbuku"));?></p>
                <p>overall review</p>
            </div>
            </div>
        </div>
        <div class="col mb-4 stretch-card transparent">
            <div class="card card-light-danger">
            <div class="card-body">
                <p class="mb-4">Total User</p>
                <p class="fs-30 mb-2"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM user"));?></p>
                <p>overall user</p>
            </div>
            </div>
        </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="margin: 1rem; margin-bottom:4.5rem;">
                <div class="card-body">
                        <table class="table">
                        <?php
                    if (isset($_SESSION['user']['level'])) {
                    ?>
                    <tr>
                        <td width="200">Nama User</td>
                        <td width="1">:</td>
                        <td><?php echo $_SESSION['user']['username']; ?></td>
                    </tr>
                    <tr>
                        <td width="200">Level User</td>
                        <td width="1">:</td>
                        <td><?php echo $_SESSION['user']['level']; ?></td>
                    </tr>
                <?php
                }else {
                    ?>
                     <tr>
                        <td width="200">Nama User</td>
                        <td width="1">:</td>
                        <td><?php echo $_SESSION['user']['username']; ?></td>
                    </tr>
                    <tr>
                        <td width="200">Level User</td>
                        <td width="1">:</td>
                        <td>Peminjam</td>
                    </tr>
                <?php
                }
                ?>
                    <tr>
                        <td width="200">Tanggal Login</td>
                        <td width="1">:</td>
                        <td><?php echo date('d-m-Y H:i:s'); ?></td>
                    </tr>
                    </table>
                </div>
            </div>
        </div>
     </div>

    <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 | Syafna Marwa Nassoba XII PPLG A</span>
          </div>
        </footer> 