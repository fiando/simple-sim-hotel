<?php
if(isset($_POST['update'])) {	
	$id = $_GET['id'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$no_ktp = $_POST['no_ktp'];
	$telepon = $_POST['telepon'];
	
	$result = mysqli_query($connect, "UPDATE pelanggan SET nama = '$nama', alamat = '$alamat', no_ktp = '$no_ktp', telepon = '$telepon' WHERE pelanggan.idpelanggan = $id;");

	header("Location: pelanggan.php");
}

$id = $_GET['id'];

$result = mysqli_query($connect, "SELECT * FROM pelanggan WHERE idpelanggan=$id");

while($res = mysqli_fetch_array($result)) {
	$nama = $res['nama'];
	$alamat = $res['alamat'];
	$no_ktp = $res['no_ktp'];
	$telepon = $res['telepon'];
}

?>
  <div class="col-md-6 col-md-offset-3">
    <div class="card">
      <div class="header">
        <h4 class="title">Pelanggan</h4>
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
                <label>No KTP</label>
                <input type="text" name="no_ktp" class="form-control border-input" placeholder="No KTP" value="<?php echo $no_ktp; ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control border-input" placeholder="Alamat" value="<?php echo $alamat; ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>No Telp</label>
                <input type="text" name="telepon" class="form-control border-input" placeholder="No Telp" value="<?php echo $telepon; ?>">
              </div>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-success btn-fill btn-wd" name="update">Update Pelanggan</button>
          </div>
          <div class="clearfix"></div>
      </div>
    </div>
    </form>
  </div>

  </div>
  </div>
  </div>