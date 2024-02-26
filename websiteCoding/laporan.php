<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card" style="margin-top: -5rem;">
      <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Pinjam</h4>   
            <a href="cetak.php" target="_blank" class="btn btn-primary"><i class="fa-solid fa-print"></i></a>        
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
                            Status Pengembalian
                          </th>
                         
    
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.userID=peminjaman.userID LEFT JOIN buku on buku.bukuID = peminjaman.bukuID");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['tanggalPeminjaman']; ?></td>
                            <td><?php echo $data['tanggalPengembalian']; ?></td>
                            <td><?php echo $data['statusPeminjaman']; ?></td>
                            <td>
                            <?php
                            if ($data ['statusPeminjaman'] != 'dikembalikan') {
                            ?>
                            <a href="?page=laporan_selesai&id=<?php echo $data['peminjamanID'];?>" target="_blank" class="btn btn-primary"><i class="bi bi-clipboard-check"></i></a>
                            
                            <?php
                    }
                        ?>        
                            </td>
                        </tr>
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

