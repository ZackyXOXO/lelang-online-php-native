<?php include "navbar.php" ?>

<div class="page-header">
  <h3 class="page-title text-white">Data Masyarakat</h3>
</div>

<div class=" grid-margin stretch-card">
  <div class="card text-white">
    <div class="card-body text-white">
      <h4 class="card-title text-white">Daftar Masyarakat</h4>
      <table class="table table-hover text-white">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Telp.</th>
          </tr>
        </thead>

        <tbody>
          <?php 
          include "../koneksi.php";
          $qry_mas=mysqli_query($conn,"select * from masyarakat");
          $no=0;
          while($data=mysqli_fetch_array($qry_mas)) {
          $no++; ?>
          <tr>
            <td><?=$no?>.</td>
            <td><?=$data['nama']?></td>
            <td><?=$data['username']?></td>
            <td><?=$data['tlp']?></td>
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