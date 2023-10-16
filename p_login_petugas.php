<?php
  // mengaktifkan session pada php
  session_start();

  // menghubungkan php dengan koneksi database
  include 'koneksi.php';

  // menangkap data yang  dikirim dari form login
  $username = $_POST['username'];
  $password = $_POST['password'];

  // menyeleksi data user dgn username & password yg sesuai 
  $sql = "SELECT * FROM `petugas` WHERE `username` = '".$username."' and `password` = '".md5($password)."'";
  $login=mysqli_query($conn, $sql);
  // 
  $cek = mysqli_num_rows($login);

  if($cek>0) {
    $data=mysqli_fetch_assoc($login);

    // cek jika user login sebagai admin
    if($data['level'] == "admin") {

      // buat session login & username
      $_SESSION['username'] = $username;
      $_SESSION['level'] = "admin";
      $_SESSION['nama']=$data['nama_petugas'];
      $_SESSION['status_login']=true;
      $_SESSION['admin'] = $data['id'];

      // alihkan ke halaman admin
      header("location:admin/home.php");

    // cek jika user login sebagai petugas
    } elseif ($data['level'] = "petugas") {
      
      // buat session login & username
      $_SESSION['username'] = $username;
      $_SESSION['level'] = "petugas";
      $_SESSION['nama']=$data['nama_petugas'];
      $_SESSION['status_login']=true;
      $_SESSION['petugas'] = $data['id'];

      // alihkan ke halaman petugas
      header("location:petugas/home.php");

    } else {      
      // alihkan ke halaman login kembali
		  header("location:index_petugas.php?pesan=gagal");
    }
  } else {
    header("location:index_petugas.php?pesan=gagal");
  }
?>