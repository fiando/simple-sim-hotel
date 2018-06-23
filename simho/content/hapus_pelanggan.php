<?php
  require_once 'lib/connect.php';

  $id = $_GET['id'];

  $result = mysqli_query($connect, "DELETE FROM pelanggan WHERE idpelanggan=$id");

  header("Location:pelanggan.php");
?>

