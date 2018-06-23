<?php
require_once('lib/connect.php');

$tipe = $_POST['idtipe_kamar'];
$sql = "SELECT *  FROM tipe_kamar WHERE idtipe_kamar = $tipe";
$query = mysqli_query($connect,$sql);
$row = mysqli_fetch_array($query);
$harga = $row['harga'];

//check in
$jml_kamar = $_POST['jml_kamar'];
$biaya = $jml_kamar * $harga;
$idpelanggan = $_POST['idpelanggan_lama'];
$tgl_check_in = $_POST['tgl_check_in'];
$tgl_check_out = $_POST['tgl_check_out'];
$idruang_kamar = $_POST['idruang_kamar'];

$sql_check_in = "INSERT INTO check_in (jumlah, biaya, tgl_check_in, idpelanggan) VALUES ('$jml_kamar', '$biaya', '$tgl_check_in', '$idpelanggan');";
$query = mysqli_query($connect,$sql_check_in);

$idcheck_in = mysqli_insert_id($connect);

foreach ($idruang_kamar as $k => $v) {
  $sql_check_out = "INSERT INTO check_in_kamar (idcheck_in, idruang_kamar) VALUES ('$idcheck_in', '$v');";
  $query = mysqli_query($connect,$sql_check_out);
  $sql_ruang = "UPDATE ruang_kamar SET status = '0' WHERE ruang_kamar.idruang_kamar = $v;";
  $query = mysqli_query($connect,$sql_ruang);

}

$sql_check_out = "INSERT INTO check_out (tgl_check_out, idcheck_in) VALUES ('$tgl_check_out', '$idcheck_in');";
$query = mysqli_query($connect,$sql_check_out);

$sql_order = "INSERT INTO `order` (`idorder`, `status_order`, `idcheck_in`, `tgl_order`) VALUES (NULL, 'baru', '$idcheck_in', CURRENT_TIMESTAMP);";
$query = mysqli_query($connect,$sql_order);

header("location:index.php");
?>
