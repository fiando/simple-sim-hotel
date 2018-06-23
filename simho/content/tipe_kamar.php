<?php
  $tipe_kamar = mysqli_query($connect, "SELECT * FROM tipe_kamar");
?>
<?php
  if(isset($_POST['submit'])) {	
    $nama = $_POST['nama'];
    $singkatan = $_POST['singkatan'];
    $harga = $_POST['harga'];

    $result = mysqli_query($connect, "INSERT INTO tipe_kamar ( nama, singkatan, harga) VALUES ('$nama', '$singkatan', '$harga');");
    header("location: tipe_kamar.php");
  }
?>
  <div class="col-md-4">
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
                <input type="text" name="nama" class="form-control border-input" placeholder="Nama" value="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Singkatan</label>
                <input type="text" name="singkatan" class="form-control border-input" placeholder="Singkatan" value="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control border-input" placeholder="Harga" value="">
              </div>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-info btn-fill btn-wd" name="submit">Tambah Tipe Kamar</button>
          </div>
          <div class="clearfix"></div>
      </div>
    </div>
    </form>
  </div>
  <div class="col-md-8">
<div class="card">
  <div class="content">
    <div class="content table-responsive table-full-width">
      <?php if (empty($tipe_kamar)): ?>
      <h3>Data Tipe Kamar kosong !</h3>
      <?php else: ?>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($tipe_kamar as $k => $v): ?>
          <tr>
            <td>
              <?php echo $i++; ?>
            </td>
            <td>
              <?php echo $v['nama']; ?> ( <?php echo $v['singkatan']; ?> )
            </td>
            <td>
              <?php echo $v['harga']; ?>
            </td>
            <td>
              <a href="tipe_kamar.php?aksi=edit&id=<?php echo $v['idtipe_kamar']; ?>" class="btn btn-success btn-fill btn-sm">Edit</a>
              <a href="tipe_kamar.php?aksi=hapus&id=<?php echo $v['idtipe_kamar']; ?>" class="btn btn-danger btn-fill btn-sm">Hapus</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?php endif; ?>
    </div>
  </div>
  </div>
  </div>
  </div>