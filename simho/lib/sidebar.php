<div class="sidebar" data-background-color="white" data-active-color="danger">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                SIMHO - Sistem Informasi Hotel
                </a>
            </div>

            <ul class="nav">
                <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">
                    <a href="index.php">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'pelanggan.php') ? 'active' : ''; ?>">
                    <a href="pelanggan.php">
                        <i class="ti-user"></i>
                        <p>Pelanggan</p>
                    </a>
                </li>
                <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'tipe_kamar.php') ? 'active' : ''; ?>">
                    <a href="tipe_kamar.php">
                        <i class="ti-user"></i>
                        <p>Tipe Kamar</p>
                    </a>
                </li>
                <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'ruang_kamar.php') ? 'active' : ''; ?>">
                    <a href="ruang_kamar.php">
                        <i class="ti-user"></i>
                        <p>Ruang Kamar</p>
                    </a>
                </li>
                <hr>                
                <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'pemesanan.php') ? 'active' : ''; ?>">
                    <a href="pemesanan.php">
                        <i class="ti-user"></i>
                        <p>Pemesanan Kamar</p>
                    </a>
                </li>

                <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'pembayaran.php') ? 'active' : ''; ?>">
                    <a href="pembayaran.php">
                        <i class="ti-user"></i>
                        <p>Pembayaran</p>
                    </a>
                </li>
                <li class="<?php echo (basename($_SERVER['PHP_SELF']) == 'histori_order.php') ? 'active' : ''; ?>">
                    <a href="histori_order.php">
                        <i class="ti-user"></i>
                        <p>Histori Order</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>
