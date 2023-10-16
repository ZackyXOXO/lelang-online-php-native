<?php
  if($_POST) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    
    
    include "koneksi.php";
    $pass = md5($password);
    $sql= "INSERT INTO `masyarakat`(`nama`, `username`, `password`, `tlp`, `ua`) VALUES ('$nama','$username','$pass','$telp', '$userAgent')";
    $insert = mysqli_query($conn, $sql)
    or die(mysqli_error($conn));
    if($insert) {
      echo "<script>alert('Sukses menambahkan.');
      location.href='index.php';</script>";
    } else {
      echo "<script>alert('Gagal menambahkan.');
      location.href='reg_masyarakat.php';</script>";
    }
  }
?>