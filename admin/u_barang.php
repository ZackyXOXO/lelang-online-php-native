<?php include "navbar.php" ?>

<div class="page-header">
  <h3 class="page-title"> Ubah Data Barang</h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="tam_barang.php">Data Barang</a></li>
      <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
    </ol>
  </nav>
</div>  

<?php
  include "../koneksi.php";
  $sql = "SELECT * FROM barang WHERE id = '".$_GET['id_barang']."'";
  $get_barang = mysqli_query($conn, $sql);
  $data_barang = mysqli_fetch_array($get_barang);
?>
<form class="forms-sample" action="pu_barang.php" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?=$data_barang['id']?>">

  <div class="form-group">
    <label for="exampleInputName1">Nama Barang</label>
    <input type="text" class="form-control" id="exampleInputName1" value="<?=$data_barang['nama_barang']?>"
    name="nama_barang" required>
  </div>
  <div class="form-group">
    <label for="exampleInputCity1">Harga Awal</label>
    <input type="number" class="form-control" id="exampleInputCity1" value="<?=$data_barang['harga_awal']?>"
    name="harga_awal" required>
  </div>
  <div class="form-group">
    <label for="exampleTextarea1" >Deskripsi</label>
    <textarea class="form-control" id="exampleTextarea1" rows="4" name="deskripsi" 
    required><?=$data_barang['deskripsi']?></textarea>
  </div>
  <div class="form-group">
    <label>Foto</label>
    <div class="mb-2">
      <img src="../foto_barang/<?=$data_barang['foto']?>" alt="<?=$data_barang['nama_barang']?>" style="width:200px;height:200px;">
    </div>
    <input type="file" name="foto" class="file-upload-default">
    <div class="input-group col-xs-12">   
      <input type="text" class="form-control file-upload-info" disabled placeholder="<?=$data_barang['foto']?>" required>
      <span class="input-group-append">
        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
      </span>
    </div>
  </div>
  
  <button name="submit" type="submit" class="btn btn-primary me-2">Submit</button>
  <button type="reset" class="btn btn-light">Batal</button>
</form>

<?php include "footer.php" ?>