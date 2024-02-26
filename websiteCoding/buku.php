<?php
if (empty($_SESSION['user']['userID'])) {
  $id_self = $_SESSION['user']['petugasID'];
} else {
  $id_self = $_SESSION['user']['userID'];
}
if (isset($_POST['favorite'])) {
    $id = $_POST['id'];

    $query = mysqli_query($koneksi, "INSERT INTO koleksipribadi SET bukuID='$id', userID='$id_self' ");
    if (!$query) {
        echo "<script>alert('Favorit buku gagal')</script>";
    }
}

if (isset($_POST['un_favorite'])) {
    $id = $_POST['id'];

    $query = mysqli_query($koneksi, "DELETE FROM koleksipribadi WHERE bukuID='$id' AND userID='$id_self' ");
    if (!$query) {
        echo "<script>alert('Menghilangkan buku Favorit gagal')</script>";
    }
}
?>

<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card" style="margin-top: -5rem;">
      <div class="card">
        <div class="card-body">
            <h4 class="card-title">Buku</h4>             
                  <div class="table-responsive ">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            No
                          </th>
                          <th>
                            Judul
                          </th>
                          <th>
                           Kategori
                          </th>
                          <th>
                            Penulis
                          </th>
                          <th>
                            Penerbit
                          </th>
                          <th>
                            Tahun Terbit
                          </th>
                          <th>
                            Stok Buku
                          </th>
                          <?php
                            if(isset($_SESSION['user']['userID'])) {
                            ?>
                          <th>
                            Koleksi
                          </th>
                          <?php
                            }
                            if(isset($_SESSION['user']['petugasID'])) {
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
                        $query = mysqli_query($koneksi, "SELECT buku.*, kategoribuku.namaKategori FROM buku LEFT JOIN kategoribuku_relasi ON buku.bukuID = kategoribuku_relasi.bukuID 
                        LEFT JOIN kategoribuku ON kategoribuku_relasi.kategoriID = kategoribuku.kategoriID");
                        while ($data = mysqli_fetch_array($query)) {
                         $buku = $data['bukuID'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['namaKategori']; ?></td>
                            <td><?php echo $data['penulis']; ?></td>
                            <td><?php echo $data['penerbit']; ?></td>
                            <td><?php echo $data['tahunTerbit']; ?></td>
                            <td><?php if ($data['jml_buku']== 0) echo "stok habis"; if($data ['jml_buku'] > 0) echo $data['jml_buku']?></td>
                            <?php
                            if(isset($_SESSION['user']['userID'])) {
                            ?>
                            <td class="text-center">
                                <div class="d-flex px-2 py-1">
                                    <?php
                                    $cek_koleksi = mysqli_query($koneksi, "SELECT * FROM koleksipribadi WHERE userID='$id_self' AND bukuID='$buku' ");
                                    $koleksi = mysqli_num_rows($cek_koleksi);
                                    ?>
                                    <form method='post'>
                                        <input type="hidden" name="id" value="<?= $data['bukuID'] ?>">
                                        <button type='submit' class='border-0' style='background-color: transparent;' name="<?= ($koleksi != 0 ? 'un_favorite' : 'favorite') ?>">
                                            <div class="imageBox">
                                                <div class="imageInn">
                                                    <i class="fa-<?= ($koleksi != 0 ? 'solid' : 'regular') ?> fa-bookmark"></i>
                                                </div>
                                                <div class="hoverImg">
                                                    <i class="fa-<?= ($koleksi != 0 ? 'regular' : 'solid') ?> fa-bookmark"></i>
                                                </div>
                                            </div>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <?php
                            }
                            if(isset($_SESSION['user']['petugasID'])) {
                            ?>
                            <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ubah<?php echo $data['bukuID'];?>" data-bs-whatever="@mdo" <?php echo $data['bukuID']; ?>><i class="fa-solid fa-pen-to-square"></i></button>
                            <a onclick="return confirm('Yakin Hapus?')" class="btn btn-danger" href="?page=buku-hapus&id=<?php echo $data['bukuID']; ?>"><i class="fa-solid fa-trash"></i></a>
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
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $jml_buku = $_POST['jml_buku'];
    $tahunterbit = $_POST['tahunTerbit'];


    $query_buku = mysqli_query($koneksi, "INSERT INTO buku(judul, penulis, penerbit, tahunTerbit, jml_buku) VALUES ('$judul', '$penulis', '$penerbit', '$tahunterbit', '$jml_buku')");

    if ($query_buku) {
        $bukuID = mysqli_insert_id($koneksi);

        if ($_POST['kategori'] != "") {
            $kategori = $_POST['kategori'];
            $query_relasi = mysqli_query($koneksi, "INSERT INTO kategoribuku_relasi(kategoriID, bukuID) VALUES ('$kategori', '$bukuID')");

            if ($query_relasi) {
                echo "<script>alert('Tambah data berhasil!'); location.href='index.php?page=buku';</script>";
            } else {
                echo "<script>alert('Tambah data gagal!'); location.href='index.php?page=buku';</script>";
            }
        } else {
            echo "<script>alert('Tambah data berhasil!'); location.href='index.php?page=buku';</script>";
        }
    } else {
        echo "<script>alert('Tambah data gagal!'); location.href='index.php?page=buku';</script>";
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Buku</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="mb-3">
            <label for="judul" class="col-form-label">Judul : </label>
            <input type="text" class="form-control" name="judul"></input>

            <label for="message-text" class="col-form-label">Kategori: </label>
            <select class="form-select" name="kategori">
              <option value="" hidden></option>
              <?php
              $kategori_query = mysqli_query($koneksi, "SELECT * FROM kategoribuku");
              while ($kategori = mysqli_fetch_array($kategori_query)) {
                ?>
                <option value="<?= $kategori['kategoriID'] ?>"><?= $kategori['namaKategori'] ?></option>
                <?php
              }
              ?>
            </select>

            <label for="judul" class="col-form-label">Penulis : </label>
            <input type="text" class="form-control" name="penulis"></input>

            <label for="judul" class="col-form-label">Penerbit : </label>
            <input type="text" class="form-control" name="penerbit"></input>

            <label for="judul" class="col-form-label">Stok Buku : </label>
            <input type="number" class="form-control" name="jml_buku"></input>

            <label for="judul" class="col-form-label">Tahun Terbit : </label>
            <input type="text" class="form-control" name="tahunTerbit"></input>
          </div>
      <div class="modal-footer">
          <button type="reset" class="btn btn-secondary">Reset</button>
          <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
      </div>
      </div>
      </form>
    </div>
  </div>
</div>


<?php
if (isset($_POST['bubah'])) {
    $id = $_POST['bukuID'];
    $judul = $_POST['judul'];
    $kategori= $_POST['kategori'];
    $penulis = $_POST['penulis'];
    $jml_buku = $_POST['jml_buku'];
    $penerbit = $_POST['penerbit'];
    $tahunterbit = $_POST['tahunTerbit'];

    $query = mysqli_query($koneksi, "UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', tahunTerbit='$tahunterbit', jml_buku='$jml_buku' WHERE bukuID='$id'");

    $cek_kategori = mysqli_query($koneksi, "SELECT * FROM kategoribuku_relasi WHERE bukuID='$id'");
    if (mysqli_num_rows($cek_kategori) == 0) {
      $kategori_insert = mysqli_query($koneksi, "INSERT INTO kategoribuku_relasi SET bukuID='$id', kategoriID='$kategori'");
    } else {
      $kategori_delete = mysqli_query($koneksi, "DELETE FROM kategoribuku_relasi WHERE bukuID='$id'");
      if ($kategori_delete) {
        $kategori_insert = mysqli_query($koneksi, "INSERT INTO kategoribuku_relasi SET bukuID='$id', kategoriID='$kategori'");
      }
    }
    if ($query) {
      echo "<script>alert('Ubah data berhasil'); document.location='index.php?page=buku';</script>";
  } else {
      echo "<script>alert('Ubah data gagal'); document.location='index.php?page=buku';</script>";
  }

 
}

$query = mysqli_query($koneksi, "SELECT*FROM buku");
while ($data = mysqli_fetch_array($query)) {
?>
<div class="modal fade" id="ubah<?php echo $data['bukuID'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Buku</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post">
      <div class="modal-body">
      <input type="hidden" name="bukuID" value="<?php echo $data['bukuID']; ?>">
          <div class="mb-3">
          <label for="judul" class="col-form-label">Judul : </label>
            <input type="text" class="form-control" name="judul" value="<?php echo $data['judul']; ?>"></input>

            <label for="message-text" class="col-form-label">Kategori: </label>
            <select class="form-select" name="kategori">
              <option value="" hidden></option>
              <?php
              $kategori_query = mysqli_query($koneksi, "SELECT * FROM kategoribuku");

              $cek_kategori_edit = mysqli_query($koneksi, "SELECT * FROM kategoribuku_relasi WHERE bukuID='".$data['bukuID']."'");

              if (mysqli_num_rows($cek_kategori_edit) > 0) {
                $kategori_trigger = true;
                $fetch_kategori = mysqli_fetch_array($cek_kategori_edit);
              }

              while ($kategori = mysqli_fetch_array($kategori_query)) {
                ?>
                <option value="<?= $kategori['kategoriID'] ?>" <?php if (isset($kategori_trigger)) {echo ($kategori['kategoriID'] == $fetch_kategori['kategoriID'] ? 'selected' : '');} ?>><?= $kategori['namaKategori'] ?></option>
                <?php
              }
              ?>
            </select>

            <label for="penulis" class="col-form-label">Penulis : </label>
            <input type="text" class="form-control" name="penulis" value="<?php echo $data['penulis']; ?>"></input>

            <label for="stok" class="col-form-label">Stok Buku : </label>
            <input type="number" class="form-control" name="jml_buku" value="<?php echo $data['jml_buku']; ?>"></input>

            <label for="penerbit" class="col-form-label">Penerbit : </label>
            <input type="text" class="form-control" name="penerbit" value="<?php echo $data['penerbit']; ?>"></input>

            <label for="tahun terbit" class="col-form-label">Tahun Terbit : </label>
            <input type="varchar" class="form-control" name="tahunTerbit" value="<?php echo $data['tahunTerbit']; ?>"></input>
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

