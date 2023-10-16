<?php include "navbar.php" ?>

<h2 class="text-dark">Tawaran</h2>
<h3 class="text-dark">Barang : <span class="text-secondary"><?=$_GET['nama_brg']?></span></h3>
<img class="mb-2" width="200px" src="../foto_barang/<?=$_GET['foto_brg']?>" alt="Foto Barang">

<table class="table">
  <thead>
    <tr>
      <th>No.</th>
      <th>Nama Penawar</th>
      <th>Harga Penawaran</th>
      <th>Pemenang</th>
    </tr>
  </thead>

  <tbody>
    <?php
      include "../koneksi.php";
      $sql="SELECT *,lelang.id AS id_lelang FROM lelang, masyarakat where id_barang = $_GET[id_brg] AND id_masyarakat = masyarakat.id ORDER BY penawaran_harga DESC";
      $query=mysqli_query($conn, $sql);
      $no=0;
      while($data=mysqli_fetch_array($query)) {
      $no++;
    ?>
    <tr>
      <td><?=$no?>.</td>
      <td><?=$data['nama']?></td>
      <td>Rp.<?=number_format($data['penawaran_harga'])?></td>
      <td>
        <?php
        $sql3 = "SELECT status FROM barang WHERE id = $_GET[id_brg]";
        $query3 = mysqli_query($conn, $sql3);
        $data3=mysqli_fetch_array($query3);
        if($data3['status']=='SOLD') {
          if($data['status'] == 'WINNER') $winner = " active";
          else $winner = " disabled";
        } else {
          if($data['status'] == 'WINNER') $winner = " active";
          else $winner = "";
        }        
        ?>
        <form action="" method="post">
          <input type="hidden" name="id" value="<?=$data['id_lelang']?>">
          <input type="hidden" name="id_brg" value="<?=$data['id_barang']?>">
          <button type="submit" name="win" class="btn btn-outline-success<?=$winner?>">WINNER</button>
        </form>       
      </td>
    </tr> 
    <?php
    }
    ?>   
  </tbody>
    <?php
      if(isset($_POST['win'])) {
        $sql1 = "UPDATE lelang SET status ='' WHERE id_barang = $_POST[id_brg]";
        $query1= mysqli_query($conn, $sql1);
        
        $sql1 = "UPDATE lelang SET status ='WINNER' WHERE id_barang = $_POST[id_brg] AND id = $_POST[id]";        
        $query1= mysqli_query($conn, $sql1);
        
        echo "<meta http-equiv='Refresh' content='1; URL=./bid.php?id_brg=$_GET[id_brg]&nama_brg=$_GET[nama_brg]&foto_brg=$_GET[foto_brg]'>";
        // header("location:bid.php?id_brg=$_GET[id_brg]&nama_brg=$_GET[nama_brg]&foto_brg=$_GET[foto_brg]");

        $sql2 = "UPDATE barang SET STATUS ='SOLD' WHERE id = $_POST[id_brg]";
        $query2 = mysqli_query($conn, $sql2);
      }
    ?>
</table>

<?php include "footer.php" ?>