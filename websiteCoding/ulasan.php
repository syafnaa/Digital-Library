<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card" style="margin-top: -5rem;">
      <div class="card">
        <div class="card-body">
            <h4 class="card-title">Ulasan Buku</h4> 
            <?php
if (isset($_SESSION['user']['userID'])) {
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Tambah Data</button>
<?php
}
?>            
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
                            Judul
                          </th>
                          <th>
                            Ulasan
                          </th>
                          <th>
                            Rating
                          </th>
                          <th>
                            Aksi
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT*FROM ulasanbuku LEFT JOIN user on user.userID=ulasanbuku.userID LEFT JOIN buku on buku.bukuID = ulasanbuku.bukuID");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['ulasan']; ?></td>
                            <td><?php echo $data['rating']; ?></td>
                            <td>

                            <?php
                        $user = null;
                        if (isset($_SESSION['user']['userID'])) {
                            $user = $_SESSION['user']['userID'];
                        }
                        if ($data['userID'] == $user) {
                        ?>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ubah<?php echo $data['ulasanID']; ?>" ><i class="fa-solid fa-pen-to-square"></i></button>
                            <a onclick="return confirm('Yakin Hapus?')" class="btn btn-danger" href="?page=ulasan-hapus&id=<?php echo $data['ulasanID']; ?>"><i class="fa-solid fa-trash"></i></a>
                            <?php
                      } else if (isset($_SESSION['user']['level'])) {
                      ?>
                                    <a onclick="return confirm('Yakin Hapus?')" class="btn btn-danger" href="?page=ulasan-hapus&id=<?php echo $data['ulasanID']; ?>"><i class="fa-solid fa-trash"></i></a>
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                        ?>
                          




<?php
if (isset($_POST['bsimpan'])) {
    $userID = $_SESSION['user']['userID'];
    $bukuID = $_POST['bukuID'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];
    $query = mysqli_query($koneksi, "INSERT INTO ulasanbuku (userID, bukuID, ulasan, rating) VALUES ('$userID','$bukuID','$ulasan', '$rating' )");

    if ($query) {
        echo "<script>alert('Tambah data berhasil');document.location='index.php?page=ulasan';</script>";
    } else {
        echo "<script>alert('Tambah data gagal');document.location='index.php?page=ulasan';</script>";
    }
}
?>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah ulasan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post">
      <div class="modal-body">
      <div class="mb-3">
      <label for="message-text" class="col-form-label">Buku : </label><br>
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
            <label for="message-text" class="col-form-label">Ulasan : </label>
            <textarea class="form-control" id="message-text" name="ulasan"></textarea>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Rating: </label><br>
            <select class="custom-select" name="rating">
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
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary">Reset</button>
        <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>


<?php
if (isset($_POST['bubah'])) {
    $id = $_POST['ulasanID'];
    $userID = $_SESSION['user']['userID'];
    $bukuID = $_POST['bukuID'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];
    $query = mysqli_query($koneksi, "UPDATE ulasanbuku SET bukuID='$bukuID', ulasan='$ulasan', rating='$rating'  WHERE ulasanID=$id");

    if ($query) {
      echo "<script>alert('Ubah data berhasil'); document.location='index.php?page=ulasan';</script>";
  } else {
      echo "<script>alert('Ubah data gagal'); document.location='index.php?page=ulasan';</script>";
  }
}

$query = mysqli_query($koneksi, "SELECT*FROM ulasanbuku");
while ($data = mysqli_fetch_array($query)) {
?>
<div class="modal fade" id="ubah<?php echo $data['ulasanID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah ulasan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post">
        <input type="hidden" name="ulasanID" value="<?php echo $data['ulasanID']; ?>">
      <div class="modal-body">
      <div class="mb-3">
      <label for="message-text" class="col-form-label">Buku : </label><br>
        <select name="bukuID" class="custom-select">
            <?php 
            $buk = mysqli_query($koneksi, "SELECT*FROM buku");
            while ($buku = mysqli_fetch_array($buk)) {
            ?>
                <option <?php if ($data['bukuID'] == $buku['bukuID']) echo 'selected'; ?> value="<?php echo $buku['bukuID']; ?>"><?php echo $buku ['judul'];?></option>
                <?php
            }
                ?>

        </select>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Ulasan : </label>
            <textarea class="form-control" id="message-text" name="ulasan"><?php echo $data['ulasan'];?></textarea>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Rating : </label><br>
            <select class="custom-select" name="rating">
               
            <?php
                for ($i=1; $i <=10 ; $i++) { 
            ?>
                <option <?php if ($data['rating'] == $i) echo 'selected';?> value="<?php echo $i;?>"><?php echo $i; ?></option>
            
                
                <?php
                    }
                ?>
               

        </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary">Reset</button>
        <button type="submit" class="btn btn-primary" name="bubah">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php
}
?>
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

