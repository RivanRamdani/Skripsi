 <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Panitia</div>
                    <a class="nav-link" href="<?php echo base_url; ?>panitia/dashboard.php"><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>Dashboard</a>
                    <!-- <a class="nav-link" href="index.html"><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>Panitia</a> -->
                    <a class="nav-link" href="<?php echo base_url; ?>panitia/jadwal-pengajian"><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>Jadwal Pengajian</a>
                    <a class="nav-link" href="<?php echo base_url; ?>panitia/jamaah"><div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>Jamaah</a>
                    <a class="nav-link" href="<?php echo base_url; ?>panitia/subscribe"><div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>Subscribe</a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php echo $_SESSION['user']['nama']; ?>
            </div>
        </nav>
    </div>