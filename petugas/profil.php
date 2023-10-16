<?php include "navbar.php" ?>

<?php
include "../koneksi.php";

if($_SESSION['petugas']) {
  $sesi = $_SESSION['petugas'];
} 

$sql_profil = mysqli_query($conn, "SELECT * FROM petugas WHERE id = '$sesi'") 
or die(mysqli_error($conn));
$data = mysqli_fetch_array($sql_profil);
?>

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title text-white">Profil</h4>
      <p class="card-description text-white"> Edit Profil </p>
      <form class="forms-sample" action="" method="POST">
        <div class="form-group">
          <label for="exampleInputName1">Nama</label>
          <input type="text" class="form-control" id="exampleInputName1" value="<?=$data['nama_petugas']?>"
          name="nama_petugas" required>
        </div>
        <div class="form-group">
          <label for="exampleInputUsername2">Username</label>
          <input type="text" class="form-control" id="exampleInputUsername2" value="<?=$data['username']?>"
          name="username" required>
        </div>       
        <div class="form-group">
          <label for="exampleSelectGender">Level</label>
          <select class="form-control" id="exampleSelectGender" name="level" disabled>
            <option><?=$data['level']?></option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword4">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword4" value="<?=$data['password']?>"
          name="password" required>
        </div>
        <button type="submit" class="btn btn-primary me-2" name="edit">Submit</button>
        <button type="reset "class="btn btn-light">Cancel</button>
      </form>
      <?php
        if(isset($_POST['edit'])) {
          $nama = mysqli_real_escape_string($conn, $_POST['nama_petugas']);
          $username = mysqli_real_escape_string($conn, $_POST['username']);
          $password = $_POST['password'];
          $sql = "UPDATE petugas SET nama_petugas = '$nama', username = '$username' WHERE id = '$sesi'";
          mysqli_query($conn,$sql) or die (mysqli_error($conn));
          echo "<script>alert('Sukses mengubah profil.');
          location.href='tam_pet.php';</script>";
        }
      ?>
    </div>
  </div>
</div>

<?php include "footer.php" ?>