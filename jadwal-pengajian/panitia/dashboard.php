<?php 
	
	session_start();	

	if(!isset($_SESSION['user'])){
		header('Location: login.php');
	}

    require '../function/koneksi.php';
	require '../templates/header.php';
	require '../templates/sidebar.php';

    $query_pengajian = mysqli_query($koneksi, "SELECT * FROM pengajian");
    $jumlah_pengajian = mysqli_num_rows($query_pengajian);

    $query_jamaah = mysqli_query($koneksi, "SELECT * FROM jamaah");
    $jumlah_jamaah = mysqli_num_rows($query_jamaah);

    $query_subscribe = mysqli_query($koneksi, "SELECT * FROM subscribe");
    $jumlah_subscribe = mysqli_num_rows($query_subscribe);

 ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3>Jumlah Pengajian</h3>
                                <h5><?php echo $jumlah_pengajian ?></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3>Jumlah Jamaah</h3>
                                <h5><?php echo $jumlah_jamaah ?></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3>Jumlah Subscribe</h3>
                                <h5><?php echo $jumlah_subscribe ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Rivan Ramdani</div>
                    <div>
                        <a href="#"></a>
                        &middot;
                        <a href="#"></a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>    

<?php require '../templates/footer.php'; ?>