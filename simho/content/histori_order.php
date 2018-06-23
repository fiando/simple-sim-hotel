<?php
  $bayar = mysqli_query($connect, "SELECT * FROM `histori_order`");
  while ($res = mysqli_fetch_assoc($bayar)) {
    $pemesanan[] = $res;
  }
?>
<div class="col-md-12">
  <div class="card">
    <div class="content">
      <div class="content table-responsive table-full-width">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Biaya</th>
              <th>Tanggal Checkin</th>
              <th>Tanggal Checkout</th>
              <th>Status Order</th>
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
                  <td><?php echo ucfirst($v['status_order']); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>


  </div>
