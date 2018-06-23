<?php if(isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') : ?>
  <?php include_once('content/hapus_tipe_kamar.php'); ?>
<?php endif; ?>

<?php include_once('lib/header.php'); ?>
<div class="wrapper">
  <?php include_once('lib/sidebar.php'); ?>
  <div class="main-panel">
    <?php include_once('lib/navbar.php'); ?>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <?php if(isset($_GET['aksi']) && $_GET['aksi'] == 'edit') : ?>
            <?php include_once('content/edit_tipe_kamar.php'); ?>
          <?php else: ?>          
            <?php include_once('content/tipe_kamar.php'); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <?php include_once("lib/footer-top.php"); ?>

  </div>
</div>

<?php include_once('lib/footer.php'); ?>
