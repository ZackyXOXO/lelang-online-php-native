<?php
  if($_POST) {
    $username=$_POST['username'];
    $password=$_POST['password'];
    if (empty($username)) {
      echo "<script>alert('Username tidak boleh kosong!!!');
      location.href='index.php';</script>";
    } elseif (empty($password)) {
      echo "<script>alert('Password tidak boleh kosong!!!');
      location.href='index.php';</script>";
    } else {
      include "koneksi.php";
      $qry_login=mysqli_query($conn, "select * from masyarakat where 
      username = '".$username."' and password = '".md5($password)."'");
      if(mysqli_num_rows($qry_login)>0) {
        $data_login=mysqli_fetch_array($qry_login);
        session_start();
        $_SESSION['username']=$data_login['username'];
        $_SESSION['nama']=$data_login['nama'];
        $_SESSION['id']=$data_login['id'];
        $_SESSION['masyarakat']=
        $_SESSION['status_login']=true;
        header("location: masyarakat/home.php");
      } else {
        header("location:index.php?pesan=gagal");
      }
    }
  }
?>