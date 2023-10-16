<?php
  $conn=mysqli_connect('localhost', 'root', '2wsx1qaz', 'lelang');

  if(mysqli_connect_errno()) {
    printf("Connect failed: $s\n", mysqli_connect_error());
    exit();
  }
?>