<?php
  $server = '';
  $username = '';
  $password = '';
  $database = '';

  $conn = mysqli_connect($server, $username, $password, $database);

  // Check connection
  if(!$conn) {
    echo 'Error: ' . mysqli_error($conn);
  }
?>