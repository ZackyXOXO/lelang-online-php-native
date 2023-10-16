<?php
  if($_POST) {
    $nama = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
  
  if(empty($level)) {
    echo "<script>alert('Level tidak boleh kosong!!!');
    location.href='t_petugas.php';</script>";
  } else {
    include "../koneksi.php";
    $pass = md5($password);
    $sql= "INSERT INTO `petugas`(`nama_petugas`, `username`, `password`, `level`) VALUES ('$nama','$username','$pass','$level')";
    $insert = mysqli_query($conn, $sql)
    or die(mysqli_error($conn));    
      if($insert) {
        echo "<script>alert('Sukses menambahkan petugas.');
        location.href='t_petugas.php';</script>";
      } else {
        echo "<script>alert('Gagal menambahkan petugas.');
        location.href='t_petugas.php';</script>";
      }
  }  
}
?>