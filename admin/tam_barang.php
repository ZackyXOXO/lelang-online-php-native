<?php include "navbar.php" ; ?>

<div class="page-header">
  <h3 class="page-title text-white">Data Barang</h3>
</div>

<div class=" grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title text-white">Daftar Barang</h4>
      <table class="table text-white">
        <thead>
          <tr>
            <th>No.</th>
            <th>Barang</th>
            <th>Tanggal Daftar</th>
            <th>Harga Awal</th>
            <th>Status</th>
            <th>Foto</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
        <?php 
          include "../koneksi.php";
          $qry_barang=mysqli_query($conn,"select * from barang");
          $no=0;
          while($data=mysqli_fetch_array($qry_barang)) {
          $no++; ?>
          <tr>
            <td><?=$no?>.</td>
            <td><?=$data['nama_barang']?></td>
            <td><?=$data['tgl_daftar']?></td>
            <td>Rp.<?=number_format($data['harga_awal'])?></td>
            <td><?=$data['status']?></td>
            <td><img src="../foto_barang/<?=$data['foto']?>" 
            alt="<?=$data['nama_barang']?>"></td>
            <td>
              <a href="u_barang.php?id_barang=<?=$data['id']?>"
              onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')" 
              class="btn btn-success">
                <i class="mdi mdi-lead-pencil"></i>
              </a>
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

<?php include "footer.php"; ?>