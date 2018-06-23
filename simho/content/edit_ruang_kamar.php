<?php

 $tipe_kamar = mysqli_query($connect, "SELECT * FROM tipe_kamar");

if(isset($_POST['update'])) {	
	$id = $_GET['id'];
	$idkamar = $_POST['idkamar'];
	$tipe = $_POST['tipe_kamar'];
	
	$result = mysqli_query($connect, "UPDATE ruang_kamar SET idruang_kamar = '$idkamar', id_tipe_kamar = '$tipe' WHERE ruang_kamar.idruang_kamar = $id");

	header("Location: ruang_kamar.php");
}

$id = $_GET['id'];

$result = mysqli_query($connect, "SELECT * FROM ruang_kamar WHERE idruang_kamar=$id");

while($res = mysqli_fetch_array($result)) {
	$idkamar = $res['idruang_kamar'];
	$tipe = $res['id_tipe_kamar'];
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
                <label>ID Kamar</label>
                <input type="text" name="idkamar" nama="idkamar" class="form-control border-input" placeholder="ID Kamar" value="<?php echo $idkamar; ?>" autofocus>
              </div>
            </div>
          </div>
          <div class="col-md-12">
              <div class="form-group">
                <div class="form-group">
                  <label>Tipe Kamar</label>
                  <select name="tipe_kamar" id="" class="form-control">
                    <option>Pilih Tipe Kamar</option>
                      <?php while($res = mysqli_fetch_assoc($tipe_kamar)): ?>
                      <option value="<?php echo $res['idtipe_kamar']; ?>" <?php echo ($tipe == $res['idtipe_kamar']) ? 'selected' : ''; ?>><?php echo $res['nama']; ?> </option>
                    <?php endwhile; ?>
                  </select>
                </div>
              </div>
            </div>
          <div class="text-center">
            <button type="submit" class="btn btn-success btn-fill btn-wd" name="update">Update Ruang Kamar</button>
          </div>
          <div class="clearfix"></div>
      </div>
    </div>
    </form>
  </div>

  </div>
  </div>
  </div>