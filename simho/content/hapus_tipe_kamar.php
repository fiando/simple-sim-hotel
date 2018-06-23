<?php
  require_once 'lib/connect.php';

  $id = $_GET['id'];

  $result = mysqli_query($connect, "DELETE FROM tipe_kamar WHERE idtipe_kamar=$id");

  header("Location:tipe_kamar.php");
?>

