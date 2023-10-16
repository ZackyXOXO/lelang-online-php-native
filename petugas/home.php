<?php include "navbar.php" ?>

<h1 class="text-white mb-2 display-3">Welcome <span class="font-weight-bold"> <?=$_SESSION['nama']?> </span></h1>
<h2 class="text-white mb-3">Have a nice day!</h2>


<div class=" grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title text-white">Daftar Barang</h4>
      <table class="table text-white">
        <thead>
          <tr>
            <th>No.</th>
            <th>Barang</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Tawaran</th>
            <th>Foto</th>
          </tr>
        </thead>

        <tbody>
          <?php
            include "../koneksi.php";
            $sql="SELECT * FROM `barang`";
            $qry_barang=mysqli_query($conn, $sql);
            $no=0;
            while($data=mysqli_fetch_array($qry_barang)) {
            $no++; ?>
            <tr>
              <td><?=$no?>.</td>
              <td><?=$data['nama_barang']?></td>
              <td>Rp.<?=number_format($data['harga_awal'])?></td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <?php
                    if($data['status'] == 'CLOSE') {
                      $close = "-danger";
                      $open = "-secondary";
                      $bid = " disabled";
                    } elseif($data['status'] == 'OPEN') {
                      $close = "-secondary";
                      $open = "-danger";
                      $bid = "";
                    } else {
                      $close = " disabled";
                      $open = " disabled";
                      $bid = "";
                    }
                  ?>
                  <!-- kalo mencet open statusnya jadi OPEN -->
                  <form method="POST">
                    <input type="hidden" name="id" value="<?=$data['id']?>">
                    <button type="submit" class="btn btn-outline<?=$open?>" name="buka">Open</button>
                  </form>                  
                  <?php
                    if(isset($_POST['buka'])) {
                      $sql = "UPDATE barang SET status = 'OPEN' WHERE id = $_POST[id]";
                      $query = mysqli_query($conn, $sql);

                    }
                  ?>
                  <!-- end open -->

                  <!-- kalo mencet sold statusnya jadi SOLD -->
                  <form method="POST">
                    <input type="hidden" name="id" value="<?=$data['id']?>">
                    <button type="submit" class="btn btn-outline<?=$close?>" name="tutup">Close</button>
                  </form>
                  <?php
                    if(isset($_POST['tutup'])) {
                      $sql = "UPDATE barang SET status = 'CLOSE' WHERE id = $_POST[id]";
                      $query = mysqli_query($conn, $sql);
                    }
                  ?>
                  <!-- end sold -->
                </div>
              </td>
              <td>
                <a href="bid.php?id_brg=<?=$data['id']?>&nama_brg=<?=$data['nama_barang']?>&foto_brg=<?=$data['foto']?>" class="btn btn-outline-secondary<?=$bid?>"> Bid
                </a>
              </td>
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

<?php include "footer.php" ?>