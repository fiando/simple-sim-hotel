<?php
require_once('lib/connect.php');

$id = $_GET['id'];
$sql = "UPDATE `order` SET `status_order` = 'selesai' WHERE `order`.`idorder` = $id;";
$query = mysqli_query($connect,$sql);

$sql = "SELECT idruang_kamar FROM check_in_kamar WHERE idcheck_in = $id";
$query = mysqli_query($connect,$sql);

while ($res = mysqli_fetch_assoc($query)) {
  $kamar[] = $res['idruang_kamar'];
}

foreach ($kamar as $k => $v) {
  $sql = "UPDATE ruang_kamar SET status = '1' WHERE ruang_kamar.idruang_kamar = $v";
  $query = mysqli_query($connect,$sql);
}

header("location:index.php");
?>
