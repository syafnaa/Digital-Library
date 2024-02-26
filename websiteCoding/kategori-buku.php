<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card" style="margin-top: -5rem;">
      <div class="card">
        <div class="card-body">
            <h4 class="card-title">Kategori Buku</h4>             
                  <div class="table-responsive ">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            No
                          </th>
                          <th>
                            Nama Kategori
                          </th>
                          <?php
          if (isset($_SESSION['user']['level'])) {
					?>
                          <th>
                            Aksi
                          </th>
                          <?php
          }
					?>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT*FROM kategoribuku");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $data['namaKategori']; ?></td>
                            <?php
                            if (isset($_SESSION['user']['level'])) {
                            ?>
                            <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ubah<?php echo $data['kategoriID']; ?>" ><i class="fa-solid fa-pen-to-square"></i></button>
                            <a onclick="return confirm('Yakin Hapus?')" class="btn btn-danger" href="?page=kategori-hapus&id=<?php echo $data['kategoriID']; ?>"><i class="fa-solid fa-trash"></i></a>
                            </td>
                            <?php
                              }
                              ?>
                        </tr>
                        <?php
                    }
                        ?>




<?php
if (isset($_POST['bsimpan'])) {
    $kategori = $_POST['namaKategori'];
    $query = mysqli_query($koneksi, "INSERT INTO kategoribuku (namaKategori) VALUES ('$kategori')");

    if ($query) {
        echo "<script>alert('Tambah data berhasil');document.location='index.php?page=kategori-buku';</script>";
    } else {
        echo "<script>alert('Tambah data gagal');document.location='index.php?page=kategori-buku';</script>";
    }
}
?>

<?php
  if (isset($_SESSION['user']['level'])) {
?>
                            
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Tambah Data</button>
<?php
                    }
                        ?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post">
      <div class="modal-body">
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Nama Ketegori : </label>
            <textarea class="form-control" id="message-text" name="namaKategori"></textarea>
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
    $id = $_POST['kategoriID'];
    $Kategori = $_POST['namaKategori'];

    $query = mysqli_query($koneksi, "UPDATE kategoribuku SET namaKategori='$Kategori' WHERE kategoriID=$id");

    if ($query) {
      echo "<script>alert('Ubah data berhasil'); document.location='index.php?page=kategori-buku';</script>";
  } else {
      echo "<script>alert('Ubah data gagal'); document.location='index.php?page=kategori-buku';</script>";
  }
}

$query = mysqli_query($koneksi, "SELECT*FROM kategoribuku");
while ($data = mysqli_fetch_array($query)) {
?>
<div class="modal fade" id="ubah<?php echo $data['kategoriID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Kategori</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post">
      <div class="modal-body">
        <input type="hidden" name="kategoriID" value="<?php echo $data['kategoriID']; ?>">
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Nama Ketegori : </label>
            <textarea class="form-control" id="message-text" name="namaKategori"><?php echo $data['namaKategori']; ?></textarea>
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

