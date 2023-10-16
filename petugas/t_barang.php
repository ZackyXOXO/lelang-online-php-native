<?php include "navbar.php" ?>

<div class="page-header">
  <h3 class="page-title text-white"> Tambah Barang </h3>
</div>

<form class="forms-sample" action="pt_barang.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputName1">Nama Barang</label>
    <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama"
    name="nama_barang" required>
  </div>
  <div class="form-group">
    <label for="exampleInputCity1">Harga Awal</label>
    <input type="number" class="form-control" id="exampleInputCity1" placeholder="Harga"
    name="harga_awal" required>
  </div>
  <div class="form-group">
    <label for="exampleTextarea1">Deskripsi</label>
    <textarea class="form-control" id="exampleTextarea1" rows="4" name="deskripsi" required></textarea>
  </div>
  <div class="form-group">
    <label>Foto</label>
    <input type="file" name="foto" class="file-upload-default">
    <div class="input-group col-xs-12">
      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Foto" required>
      <span class="input-group-append">
        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
      </span>
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary me-2">Submit</button>
  <button type="reset" class="btn btn-light">Batal</button>
</form>

<?php include "footer.php" ?>