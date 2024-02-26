<?php
$id = $_SESSION['user']['userID'];
$query = mysqli_query($koneksi, "SELECT*FROM user WHERE userID=$id");
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link href="vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />

  <!--icon-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<!-- Navbar -->

<section class="profile page-content content-wrapper stretch-card" style="margin-top: -6rem;">
    <div class="container py-5 card">
        <div class="background-profile">
            <img src="../websiteCoding/images/background-profile.jpg" class="rounded" alt="..." width="100%" height="280px" style="margin-bottom: 2rem;">
        </div>
        <div class="row justify-content-center profile-content">
            <div class="col-10">
                <div class="row">
                    <div class="col-md-4 col-lg-2">
                        <div class="profile-pict mb-3">
                            <?php
                            if ($data['profile_img'] != "") {
                                echo '<img src="images/profile-img/' . $data['profile_img'] . '" class="rounded" alt="..." width="150" height="150">';
                            } else {
                                echo '<img src="../websiteCoding/images/profil-img/default.jpeg" class="rounded" alt="..." width="150" height="150">';
                            }
                            ?>
                           
                        </div>
                    </div>
                    <div class="col profile-detail" style="margin-left: 2rem;">
                        <h3><?php echo $_SESSION['user']['username']?></h3>
                        <div class="loc">
                            <i class="fa-solid fa-envelope"></i><span> <?php echo $data['email']; ?></span>
                        </div>
                        <p>
                            <?php 
                                if ($data['bio'] != "") {
                                    echo $data['bio'];
                                } else {
                                    echo "No bio yet";
                                }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs d-flex justify-content-evenly" id="myTab" role="tablist" style="margin-top: 2rem;">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="history-tab" data-bs-toggle="tab" data-bs-target="#history-tab-pane" type="button" role="tab" aria-controls="history-tab-pane" aria-selected="true">Koleksi</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="favorite-tab" data-bs-toggle="tab" data-bs-target="#favorite-tab-pane" type="button" role="tab" aria-controls="favorite-tab-pane" aria-selected="false">About me</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="history-tab-pane" role="tabpanel" aria-labelledby="history-tab" tabindex="0">
            
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
                                        Penerbit
                                    </th>
                                    <th>
                                        Aksi
                                    </th>

                                    <?php
                                        $where = "WHERE koleksipribadi.userID=" . $_SESSION['user']['userID'];
                                    ?>
                                    </tr>
                                </thead>
                                <tbody>

                            <?php
                            $i = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM koleksipribadi LEFT JOIN user ON user.userID = koleksipribadi.userID LEFT JOIN buku ON buku.bukuID = koleksipribadi.bukuID  $where");
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['penerbit']; ?></td>
                            <td>
                            <a onclick="return confirm('Yakin Hapus?')" class="btn btn-danger" href="?page=profil/koleksi-hapus&id=<?php echo $data['koleksiID']; ?>"><i class="fa-solid fa-trash"></i></a>
                            </td>
                            </tr>

                            <?php
                                    }
                                    ?>
                        
            </div>
            <div class="tab-pane fade" id="favorite-tab-pane" role="tabpanel" aria-labelledby="favorite-tab" tabindex="0">
                
            </div>
        </div>
    </div>
</section>

       


<script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
<script>
    AOS.init();
</script>
</body>
</html>


