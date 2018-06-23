<?php
  $bayar = mysqli_query($connect, "SELECT * FROM `lihat_bayar`");
  while ($res = mysqli_fetch_assoc($bayar)) {
    $pemesanan[] = $res;
  }
?>
<div class="col-md-12">
  <div class="card">
    <div class="content">
      <div class="content table-responsive table-full-width">
        <?php if (empty($pemesanan)): ?>
          <h3>Data pembayaran kosong !</h3>
            <a href="pemesanan.php" class="btn btn-primary">Tambah Pemesanan</a>
          <?php else: ?>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Biaya</th>
                  <th>Tanggal Checkin</th>
                  <th>Tanggal Checkout</th>
                  <th>Aksi</th>
                </tr>
              </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($pemesanan as $k => $v): ?>
                    <tr>
                      <td><?php echo $i++; ?></td>
                      <td><?php echo $v['nama']; ?> ( <?php echo $v['no_ktp']; ?> )</td>
                      <td><?php echo $v['biaya']; ?></td>
                      <td><?php echo $v['tgl_check_in']; ?></td>
                      <td><?php echo $v['tgl_check_out']; ?></td>
                      <td>
                        <a href="proses_pembayaran.php?id=<?php echo $v['idorder']; ?>" class="btn btn-primary">Bayar & Check out</a>
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
