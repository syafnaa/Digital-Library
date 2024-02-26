<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card" style="margin-top: -5rem;">
      <div class="card">
        <div class="card-body">
            <h4 class="card-title">Peminjaman</h4>   
                  <div class="table-responsive ">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            No
                          </th>
                          <th>
                            Username
                          </th>
                          <th>
                            Buku
                          </th>
                          <th>
                            Tanggal Peminjaman
                          </th>
                          <th>
                            Tanggal Pengembalian
                          </th>
                          <th>
                            Jumlah Pinjam
                          </th>
                          <th>
                            Status Pengembalian
                          </th>
                          <th>
                            Aksi
                          </th>
                         
                        <?php
                        $where = "WHERE peminjaman.userID=" . $_SESSION['user']['userID'];
                        ?>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.userID=peminjaman.userID LEFT JOIN buku on buku.bukuID = peminjaman.bukuID $where");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['tanggalPeminjaman']; ?></td>
                            <td><?php echo $data['tanggalPengembalian']; ?></td>
                            <td><?php echo $data['jml_pinjam']; ?></td>
                            <td><?php echo $data['statusPeminjaman']; ?></td>
                            <td>
                                
                            
                            <a onclick="return confirm('Yakin Hapus?')" class="btn btn-danger" href="?page=peminjaman-hapus&id=<?php echo $data['peminjamanID']; ?>"><i class="fa-solid fa-trash"></i></a>
                            </td>
                            </td>
                        </tr>
                        <?php
                    }
                        ?>


<?php
if (isset($_POST['bsimpan'])) {
    $userID = $_SESSION['user']['userID'];
    $bukuID = $_POST['bukuID'];
    $tanggalPeminjaman = $_POST['tanggalPeminjaman'];
    $tanggalPengembalian = $_POST['tanggalPengembalian'];
    $statusPeminjaman = $_POST['statusPeminjaman'];
    $jml_pinjam = $_POST['jml_pinjam'];


    $stok_query = mysqli_query ($koneksi, "SELECT jml_buku FROM buku WHERE bukuID = '$bukuID'");
    if(mysqli_num_rows($stok_query) > 0){
      $data = mysqli_fetch_assoc($stok_query);
      $stok = $data['jml_buku'];
    
    if ($jml_pinjam > $stok){
      echo "<script>alert('Stok Buku Habis'); document.location='index.php?page=peminjaman';</script>";
    }else{
      $query = mysqli_query($koneksi, "INSERT INTO peminjaman (userID, bukuID, tanggalPeminjaman, tanggalPengembalian, jml_pinjam, statusPeminjaman) VALUES ('$userID','$bukuID','$tanggalPeminjaman', '$tanggalPengembalian', '$jml_pinjam','$statusPeminjaman' )");
    }
  
    if ($query) {
        echo "<script>alert('Tambah data berhasil');document.location='index.php?page=peminjaman';</script>";
    } else {
        echo "<script>alert('Tambah data gagal');document.location='index.php?page=peminjaman';</script>";
    }
}
}
?>
<?php
if (isset($_SESSION['user']['userID'])) {
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Pinjam Buku</button>
<?php
}
?>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Pinjam Buku</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post">
      <div class="modal-body">
      <div class="mb-3">
      <label for="message-text" class="col-form-label">Buku : </label>
        <select name="bukuID" class="custom-select">
            <?php 
            $buk = mysqli_query($koneksi, "SELECT*FROM buku");
            while ($buku = mysqli_fetch_array($buk)) {
            ?>
                <option value="<?php echo $buku['bukuID']; ?>"><?php echo $buku ['judul'];?></option>
                <?php
            }
                ?>
        </select>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Tanggal Peminjaman : </label>
            <input type="date" class="form-control" name="tanggalPeminjaman" >
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Tanggal Pengembalian : </label>
            <input type="date" class="form-control" name="tanggalPengembalian" >
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Jumlah Pinjam : </label>
            <select class="custom-select" name="jml_pinjam">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
        </select>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Status Peminjaman </label>
            <select class="custom-select" name="statusPeminjaman">
                <option value="1">dipinjam</option>
                <option value="2">dikembalikan</option>
          </div>
         
        </select>
          
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>







                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 | Syafna Marwa Nassoba XII PPLG A</span>
          </div>
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->

