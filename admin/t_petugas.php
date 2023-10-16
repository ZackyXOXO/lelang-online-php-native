<?php include "navbar.php"?>

<div class="page-header">
  <h3 class="page-title"> Tambah Petugas </h3>
</div>

<form class="forms-sample" action="pt_petugas.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputName1">Nama</label>
    <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama" 
    name="nama_petugas" required>
  </div>
  <div class="form-group">
    <label for="exampleInputUsername2">Username</label>
    <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Username" 
    name="username" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword4">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password"
    name="password" required>
  </div>
  <div class="form-group">
    <label for="exampleSelectGender">Level</label>
    <select class="form-control" id="exampleSelectGender" name="level" required>
      <option disabled="disabled" selected="selected"> -- </option>
      <option name="admin">Admin</option>
      <option name="petugas">Petugas</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary me-2">Submit</button>
  <button type="reset" class="btn btn-light">Batal</button>
</form>

<?php include "footer.php"?>