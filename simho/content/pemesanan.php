<?php
  $pelanggan = mysqli_query($connect, "SELECT idpelanggan, nama, no_ktp FROM `pelanggan`");
  $tipe_kamar = mysqli_query($connect, "SELECT * FROM tipe_kamar");
  $ruang_kamar = mysqli_query($connect, "SELECT * FROM ruang_kamar WHERE status = 1");
  while ($res = mysqli_fetch_assoc($ruang_kamar)) {
    $idruang_kamar_arr[] = $res;
  }
?>
<?php $include_js = "kamar = ". json_encode($idruang_kamar_arr); ?>
<div class="col-md-6 col-md-offset-3">
  <div class="card">
    <div class="header">
      <h4 class="title">Pemesanan Kamar</h4>
    </div>
    <div class="content">
      <form method="post" action="proses_pesan.php">
        <div class="row">
          <div class="col-md-2">
            <div class="form-group">
              <label>Jumlah</label>
                <input type="number" class="form-control border-input" placeholder="" value="1" min="1" name="jml_kamar"  id="jml_kamar" readonly>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label>Tanggal Check In</label>
              <input type="date" class="form-control border-input" name="tgl_check_in" value="" required>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label>Tanggal Check Out</label>
              <input type="date" class="form-control border-input" name="tgl_check_out" value="" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-7">
            <div class="form-group">
              <label>Pilih Tipe Kamar</label>
              <select name="idtipe_kamar" id="idtipe_kamar" class="form-control" required>
                <option value="">Pilih Tipe Kamar</option>
                <?php while($res = mysqli_fetch_assoc($tipe_kamar)): ?>
                  <option value="<?php echo $res['idtipe_kamar']; ?>"><?php echo $res['nama']; ?> ( Rp. <?php echo $res['harga'] ?> )</option>
                <?php endwhile; ?>
              </select>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label>Pilih Nomor Kamar</label>
              <select multiple class="form-control" name="idruang_kamar[]" id="idruang_kamar">
              </select>
            </div>
          </div>
        </div>

        <div class="clearfix"></div>
      </div>
    </div>

    <div class="card">
      <div class="content">
        <!-- horizontal tabs -->
        <div class="nav-tabs-navigation">
          <div class="nav-tabs-wrapper">
            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
              <li class="active">
                <a href="#pelanggan" data-toggle="tab">Pelanggan</a>
              </li>
              <!-- <li>
                <a href="#baru" data-toggle="tab">Pelanggan Baru</a>
              </li> -->
            </ul>
          </div>
        </div>
        <div id="my-tab-content" class="tab-content">
          <div class="tab-pane active" id="pelanggan">
            <p>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="form-group">
                      <label>Pelanggan</label>
                      <select name="idpelanggan_lama" id="" class="form-control">
                        <option>Pilih Pelanggan</option>
                        <?php while($res = mysqli_fetch_assoc($pelanggan)): ?>
                          <option value="<?php echo $res['idpelanggan']; ?>"><?php echo $res['nama']; ?> ( <?php echo $res['no_ktp']; ?> )</option>
                        <?php endwhile; ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </p>
          </div>
          <!-- <div class="tab-pane" id="baru">
            <p>
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
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control border-input" placeholder="Alamat" value="">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>No Telepon</label>
                    <input type="text" name="no_telp" class="form-control border-input" placeholder="No Telepon" value="">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>No. KTP</label>
                    <input type="text" name="ktp" class="form-control border-input" placeholder="No. KTP" value="">
                  </div>
                </div>
              </div>
            </p>
          </div> -->
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-info btn-fill btn-wd">Pesan Kamar</button>
        </div>
      </form>
    </div>
  </div>
</div>
