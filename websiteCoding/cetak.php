<?php
include "../authentication/koneksi.php";
?>
<h2 class="card-title" style="text-align:center;">Laporan Peminjaman</h2>   
<div class="table-responsive ">
                    <table class="table table-striped" border="1" cellspacing="0" cellpadding="5" width="100%">
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
                            
                        <?php
                    }
                        ?>
                        </tbody>
                    </table>

<script>
    window.print();
    setTimeout(function() { 
       
    }, 1000);
</script>