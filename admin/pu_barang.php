<?php
  include "../koneksi.php";

  if(isset($_POST['submit'])) {
    $id_barang = $_POST['id'];
    $nama = $_POST['nama_barang'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga_awal'];

    $foto=basename($_FILES["foto"]["name"]);
    $target_dir = "../foto_barang/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(empty($foto)) {                
      $sql = "UPDATE `barang` SET `nama_barang`='$nama',`deskripsi`='$deskripsi',`harga_awal`='$harga' WHERE `id`= '$id_barang'";          
      $insert=mysqli_query($conn, $sql);

      if($insert) {
          echo "<script>alert('Sukses mengubah produk.');
          location.href='tam_barang.php';</script>";
      } else {
          echo "<script>alert('Gagal mengubah produk.');
          location.href='tam_barang.php';</script>";
      }
    }

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if($check == false) {
      echo "<script>alert('File yang dipilih bukan foto.');
      location.href='tam_barang.php';</script>";
      $uploadOk = 0;
    } else {
        $uploadOk = 1;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "<script>alert('File foto sudah ada.');
      location.href='tam_barang.php';</script>";
    $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["foto"]["size"] > 5242880) {
      echo "<script>alert('File foto terlalu besar');
      location.href='tam_barang.php';</script>";
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
      echo "<script>alert('Hanya menerima file foto JPG, JPEG, PNG');
      location.href='tam_barang.php';</script>";
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "<script>alert('File foto tidak terupload.');
      location.href='tam_barang.php';</script>";  
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {            
        $sql = "UPDATE `barang` SET `nama_barang`='$nama',`deskripsi`='$deskripsi',`harga_awal`='$harga',`foto` ='$foto' WHERE `id`= '$id_barang'";            
        $insert=mysqli_query($conn, $sql);

        if($insert) {
            echo "<script>alert('Sukses mengubah produk.');
            location.href='tam_barang.php';</script>";
        } else {
            echo "<script>alert('Gagal mengubah produk.');
            location.href='tam_barang.php';</script>";
        }
      } else {
        echo "<script>alert('Error saat upload file foto.');
        location.href='tam_barang.php';</script>";
      }
    }
  }
?>