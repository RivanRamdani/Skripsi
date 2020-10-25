<?php 
	
	session_start();	

	if(!isset($_SESSION['user'])){
		header('Location: login.php');
	}

    require '../../function/koneksi.php';
	require '../../templates/header.php';
	require '../../templates/sidebar.php';
 ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Daftar Subscribe</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="<?php echo base_url; ?>panitia/dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Daftar Subscribe</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">

                        <?php if(isset($_SESSION['notif-sukses'])) : ?>
                        <div class="alert alert-success">
                            <?php echo $_SESSION['notif-sukses']; ?>
                        </div>
                        <?php unset($_SESSION['notif-sukses']); ?>
                        <?php endif; ?>

                        <div class="mb-3">
                            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="get">
                                <div class="input-group">
                                    <input class="form-control form-control-sm" type="text" name="cari" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                                    <div class="input-group-append">
                                        <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                            <a href="email.php" class="btn btn-primary btn-sm float-right">Kirim Email</a>
                        </div>
                        <table class="table table-bordered" border="1" cellpadding="2">
                            <tr>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            <?php 
                                if(isset($_GET['cari'])){
                                    $sql = "SELECT * FROM subscribe WHERE email LIKE '%%$_GET[cari]%%'";
                                }else{
                                    $sql = "SELECT * FROM subscribe";
                                }
                                $query = mysqli_query($koneksi, $sql);
                             ?>

                             <?php if(mysqli_num_rows($query) == 0) : ?>
                                <td>Tidak ada pengajian</td>
                             <?php endif; ?>

                             <?php while($row = mysqli_fetch_assoc($query)) : ?>
                                <tr>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo ($row['status'] == 1) ? 'Sudah Verifikasi' : 'Belum Verified';?></td>
                                    <td>
                                        <a onclick="return confirm('Apa anda yakin?')" href="hapus.php?id=<?= $row['id']; ?>" class="badge badge-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy;Rivan Ramdani</div>
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

<?php require '../../templates/footer.php'; ?>