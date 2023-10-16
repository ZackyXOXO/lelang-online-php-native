<?php
  if($_GET['id_petugas']) {
    include "../koneksi.php";
    $sql = "DELETE FROM petugas WHERE id = '".$_GET['id_petugas']."'";
    $query = mysqli_query($conn, $sql);

    if($query) {
      echo "<script>alert('Sukses menghapus petugas.');
      location.href='tam_pet.php';</script>";
    } else {
      echo "<script>alert('Gagal menghapus petugas.');
      location.href='tam_pet.php';</script>";
    }
  }
?>