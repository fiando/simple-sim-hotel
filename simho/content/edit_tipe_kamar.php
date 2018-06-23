<?php
if(isset($_POST['update'])) {	
	$id = $_GET['id'];
	$nama = $_POST['nama'];
	$singkatan = $_POST['singkatan'];
	$harga = $_POST['harga'];
	
	$result = mysqli_query($connect, "UPDATE tipe_kamar SET nama = '$nama', singkatan = '$singkatan', harga = '$harga' WHERE tipe_kamar.idtipe_kamar = $id");

	header("Location: tipe_kamar.php");
}

$id = $_GET['id'];

$result = mysqli_query($connect, "SELECT * FROM tipe_kamar WHERE idtipe_kamar=$id");

while($res = mysqli_fetch_array($result)) {
	$nama = $res['nama'];
	$singkatan = $res['singkatan'];
	$harga = $res['harga'];
}

?>
  <div class="col-md-6 col-md-offset-3">
    <div class="card">
      <div class="header">
        <h4 class="title">Tipe Kamar</h4>
      </div>
      <div class="content">
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control border-input" placeholder="Nama" value="<?php echo $nama; ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Singkatan</label>
                <input type="text" name="singkatan" class="form-control border-input" placeholder="Singkatan" value="<?php echo $singkatan; ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control border-input" placeholder="Harga" value="<?php echo $harga; ?>">
              </div>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-success btn-fill btn-wd" name="update">Update Tipe Kamar</button>
          </div>
          <div class="clearfix"></div>
      </div>
    </div>
    </form>
  </div>

  </div>
  </div>
  </div>