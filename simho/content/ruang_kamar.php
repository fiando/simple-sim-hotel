<?php
  $tipe_kamar = mysqli_query($connect, "SELECT * FROM tipe_kamar");
  $last_id = mysqli_query($connect, "SELECT idruang_kamar FROM ruang_kamar ORDER BY idruang_kamar DESC");
  $res_id = mysqli_fetch_assoc($last_id);
?>
<?php
  if(isset($_POST['submit'])) {	
    $idkamar = $_POST['idkamar'];
    $tipe_kamar = $_POST['tipe_kamar'];

    $result = mysqli_query($connect, "INSERT INTO ruang_kamar (idruang_kamar, id_tipe_kamar, `status`) VALUES ('$idkamar', '$tipe_kamar', '1')");
    header("location: ruang_kamar.php");
  }
?>
  <div class="col-md-4">
    <div class="card">
      <div class="header">
        <h4 class="title">Ruang Kamar</h4>
      </div>
      <div class="content">
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>ID Kamar</label>
                <input type="text" name="idkamar" nama="idkamar" class="form-control border-input" placeholder="ID Kamar" value="<?php echo $res_id['idruang_kamar'] + 1?>" autofocus>
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
                      <option value="<?php echo $res['idtipe_kamar']; ?>"><?php echo $res['nama']; ?> </option>
                    <?php endwhile; ?>
                  </select>
                </div>
              </div>
            </div>
          <div class="text-center">
            <button type="submit" class="btn btn-info btn-fill btn-wd" name="submit">Tambah Ruang Kamar</button>
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
            <th>Tipe Kamar</th>
            <th>Ruang Kamar</th>
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
              <?php echo $v['nama']; ?>
            </td>
            <td>
              <?php
                $sql_kamar = mysqli_query($connect, "SELECT * FROM `ruang_kamar` WHERE `id_tipe_kamar` = {$v['idtipe_kamar']}");
              ?>
              <?php while($res = mysqli_fetch_assoc($sql_kamar)): ?>
                <a href="ruang_kamar.php?aksi=edit&id=<?php echo $res['idruang_kamar']; ?>" class="btn btn-success btn-fill btn-sm"><?php echo $res['idruang_kamar']; ?></a>
              <?php endwhile; ?>
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