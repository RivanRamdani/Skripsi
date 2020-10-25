<?php 

	require_once 'function/koneksi.php'; 
	$id_pengajian = $_GET['id_pengajian'];
	$query = mysqli_query($koneksi, "SELECT * FROM pengajian WHERE id_pengajian = $id_pengajian");
	$row = mysqli_fetch_assoc($query);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Daftar Pengajian</title>
        <link href="assets/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                    	<h3 class="text-center font-weight-light my-4">Daftar Pengajian</h3>
                                    	<h5 class="text-center font-weight-light my-4"><?php echo 'Ustadz : '. $row['nama_ustadz']; ?> <br> <?php echo 'Judul Pengajian : '. $row['judul_pengajian']; ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="registrasi.php" method="post">
                                        	<input type="hidden" name="id_pengajian" value="<?php echo $id_pengajian; ?>">

                                            <div class="form-group"><label class="small mb-1" for="inputFirstName">Nama</label><input class="form-control py-4" name="nama" id="inputFirstName" type="text" placeholder="Masukkan Nama" /></div>

                                            <div class="form-group"><label class="small mb-1" for="inputFirstName">Email</label><input class="form-control py-4" name="email" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Masukkan Email" /></div>

                                            <div class="form-group"><label class="small mb-1" for="inputAlamat">Alamat</label><textarea class="form-control py-4" name="alamat" id="inputAlamat" placeholder="Masukkan Alamat" /></textarea></div>

                                            <!-- <div class="form-group"><label class="small mb-1" for="inputFirstName">No </label><input class="form-control py-4" name="email" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Masukkan Email" /></div> -->

                                            <!-- <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputConfirmPassword">Confirm Password</label><input class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Confirm password" /></div>
                                                </div>
                                            </div> -->
                                            <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">Daftar</button></div>
                                        </form>
                                    </div>
                                    <!-- <div class="card-footer text-center">
                                        <div class="small"><a href="register.html">Have an account? Go to login</a></div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <br>
            <div id="layoutAuthentication_footer">
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
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/scripts.js"></script>
    </body>
</html>
