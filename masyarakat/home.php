<?php include "navbar.php" ?>

<h1 class="text-white mb-2 display-3">Selamat Datang <span class="font-weight-bold"> <?=$_SESSION['nama']?> </span></h1>
<h2 class="text-white mb-3"> Pelelanggan  SMKN 2 MAGELANG</h2>

<!-- Tabel barang yang dipilih -->
<?php
  if(isset($_GET['id_lelang'])) { 
    if($_GET['status_lelang'] == 'OPEN') {   
?>
<div class=" grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title text-white">Proses Lelang</h4>
      <table class="table">
        <thead>
          <tr>
            <th>No.</th>
            <th>Barang</th>
            <th>Tanggal Daftar</th>
            <th>Harga Awal</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Foto</th>
          </tr>
        </thead>

        <tbody>
        <?php 
          include "../koneksi.php";
          $qry_barang=mysqli_query($conn,"select * from barang where id = $_GET[id_lelang]");
          $no=0;
          if($data=mysqli_fetch_array($qry_barang)) {
          $no++; ?>
          <tr>
            <td><?=$no?>.</td>
            <td><?=$data['nama_barang']?></td>
            <td><?=$data['tgl_daftar']?></td>
            <td>Rp.<?=number_format($data['harga_awal'])?></td>
            <td><?=substr($data['deskripsi'], 0, 20)?>...</td>
            <td><?=$data['status']?></td>
            <td><img src="../foto_barang/<?=$data['foto']?>" 
            alt="<?=$data['nama_barang']?>"></td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
      <div class="mt-2">
        <form action="" method="POST">
          <input type="number" name="harga_tawar" placeholder="Harga Penawaran">
          <button type="submit" class="btn btn-success" name="tawar">Tawar</button>
        </form>
        <!-- tawar menawar -->
        <?php
          if(isset($_POST['tawar'])) {        
            // $id_pet = 0;
            $id_brg = $data['id'];
            $id_mas = $_SESSION['id'];
            $harga = $_POST['harga_tawar'];
            $tanggal = date('Y-m-d'); 
            // $harga_awal = $data['harga_awal'];

            $query2 = mysqli_query($conn, "select max(penawaran_harga) as tertinggi from lelang where id_barang=$id_brg");
            if($data2 = mysqli_fetch_array($query2)) $tertinggi = "$data2[tertinggi]";
            else $tertinggi = 0;

            if($harga > $data['harga_awal']) {
              if($harga > $tertinggi) {
                $sql = "INSERT INTO `lelang`(`id_barang`, `tgl_lelang`, `penawaran_harga`, `id_masyarakat`) VALUES ('$id_brg','$tanggal','$harga','$id_mas')";
                $query = mysqli_query($conn, $sql);
                // meta bisa menjadi pengganti header
                echo "<meta http-equiv='Refresh' content='1; URL=./home.php?id_lelang=$_GET[id_lelang]&status_lelang=$_GET[status_lelang]'>";
              } else {
                $num = number_format($data2['tertinggi']);
                echo "<h3 class='text-dark mt-2'>Tidak boleh dibawah penawaran tertinggi Rp.$num</h3>";
              }  
            } else {
              $num = number_format($data['harga_awal']);
              echo "<h3 class='text-dark mt-2'>Tidak boleh dibawah harga awal Rp.$num</h3>";
            }
          }  
        ?>
        <!-- end tawar menawar -->
      </div>
      <!-- tampil siapa aja yang nawar -->
      <h1 class="text-dark mb-2">Penawaran</h1>
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include "../koneksi.php";
            $sql = "SELECT * FROM lelang, masyarakat where id_barang = $_GET[id_lelang] AND id_masyarakat = masyarakat.id ORDER BY penawaran_harga DESC";
            $qry_tawar = mysqli_query($conn, $sql);
            $no = 0;
            while($data_tawar=mysqli_fetch_array($qry_tawar)) {            
            $no++; ?>
          <tr>
            <td><?=$no?></td>
            <td><?=$data_tawar['nama']?></td>
            <td>Rp.<?=number_format($data_tawar['penawaran_harga'])?></td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
      <!-- end -->
    </div>
  </div>
</div>
<?php
    } elseif($_GET['status_lelang'] == 'SOLD') {
?>
<div class=" grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
    <h4 class="card-title">Hasil Lelang</h4>
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>PEMENANG</th>
          </tr>
        </thead>

        <tbody>
          <?php
            include "../koneksi.php";
            $sql = "SELECT * FROM lelang, masyarakat where id_barang = $_GET[id_lelang] AND id_masyarakat = masyarakat.id ORDER BY penawaran_harga DESC";
            $qry_tawar = mysqli_query($conn, $sql);
            $no = 0;
            while($data_tawar=mysqli_fetch_array($qry_tawar)) {            
            $no++; ?>
          <tr>
            <td><?=$no?></td>
            <td><?=$data_tawar['nama']?></td>
            <td>Rp.<?=number_format($data_tawar['penawaran_harga'])?></td>
            <td><?=$data_tawar['status']?></td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php
    } else {
      echo "<h1 class='text-dark mb-3'>Penawaran tidak dibuka!</h1>";
  }
}
?>
<!-- End barang yg dipilih-->

<!-- Daftar Semua Barang -->
<div class=" grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title text-white">Daftar Barang</h4>
      <table class="table">
        <thead>
          <tr class="text-white">
            <th >No.</th>
            <th>Barang</th>
            <th>Tanggal Daftar</th>
            <th>Harga Awal</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Foto</th>
          </tr>
        </thead>

        <tbody>
        <?php 
          include "../koneksi.php";
          $qry_barang=mysqli_query($conn,"select * from barang");
          $no=0;
          while($data=mysqli_fetch_array($qry_barang)) {
          $no++; ?>
          <tr class="text-white">
            <td><?=$no?>.</td>
            <td><a href="?id_lelang=<?=$data['id']?>&status_lelang=<?=$data['status']?>"><?=$data['nama_barang']?></a></td>
            <td><?=$data['tgl_daftar']?></td>
            <td>Rp.<?=number_format($data['harga_awal'])?></td>
            <td><?=substr($data['deskripsi'], 0, 20)?>...</td>
            <td><?=$data['status']?></td>
            <td><img src="../foto_barang/<?=$data['foto']?>" 
            alt="<?=$data['nama_barang']?>"></td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- End -->

<?php include "footer.php" ?>