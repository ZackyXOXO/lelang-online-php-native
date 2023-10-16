<?php include "navbar.php" ?>

<div class="page-header">
  <h3 class="page-title text-white">Data Petugas</h3>
</div>

<div class=" grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title text-white">Daftar Petugas</h4>
      <table class="table table-hover text-white">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Level</th>
          </tr>
        </thead>

        <tbody>
          <?php 
          include "../koneksi.php";
          $qry_pet=mysqli_query($conn,"select * from petugas");
          $no=0;
          while($data=mysqli_fetch_array($qry_pet)) {
          $no++; ?>
          <tr>
            <td><?=$no?>.</td>
            <td><?=$data['nama_petugas']?></td>
            <td><?=$data['username']?></td>
            <td><?=$data['level']?></td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include "footer.php" ?>