<?php 

	require_once '../function/koneksi.php';

	$error = '';

	if(isset($_POST['submit'])){

		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$no_wa = $_POST['no_wa'];
		$password = $_POST['password'];
		$re_password = $_POST['re_password'];

		//validasi atau logika
		if(!empty(trim($email)) && !empty(trim($password)) && !empty(trim($re_password))  ){

			$query_read = "SELECT * FROM panitia WHERE email='$email'";
			$result_read = mysqli_query($koneksi, $query_read);
		
			if($user = mysqli_num_rows($result_read) == 0){

				if($password == $re_password){

					$password = password_hash($password, PASSWORD_DEFAULT);
					$token=hash('sha256', md5(date('Y-m-d')));
					$query_insert = "INSERT INTO panitia(nama, email, no_wa, password, token, status) VALUES('$nama', '$email', '$no_wa', '$password', '$token', '0')";

					if($result_insert = mysqli_query($koneksi, $query_insert)){
						require_once 'mail.php';
						header('Location: verifikasi.php');
					}

				}else{
					$error = 'Password tidak sama';
				}

			}else{
				$error = 'email Sudah ada';
			}

		}else{
			$error = 'Data tidak boleh kosong';
		}

		
	}


 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register Panitia</title>
        <link href="../assets/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register</h3></div>
                                    <div class="card-body">

                                    	<?php if($error != '') : ?>
	                                    	<div class="alert alert-danger">
	                                    		<?php echo $error; ?>
	                                    	</div>
                                    	<?php endif; ?>

                                        <form action="" method="post">
                                        	<div class="form-group"><label class="small mb-1" for="nama">Nama</label><input class="form-control py-4" name="nama" id="nama" type="text" placeholder="Masukkan Nama" /></div>

                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input class="form-control py-4" name="email" id="inputEmailAddress" type="email" placeholder="Masukkan email" /></div>

                                            <div class="form-group"><label class="small mb-1" for="no_wa">No Wa</label><input class="form-control py-4" name="no_wa" id="no_wa" type="text" placeholder="Masukkan No WA" /></div>

                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Masukkan Password" /></div>

                                            <div class="form-group"><label class="small mb-1" for="re_password">Ulangi Password</label><input class="form-control py-4" name="re_password" id="re_password" type="password" placeholder="Masukkan Password" /></div>

                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><button type="submit" name="submit" class="btn btn-primary">Register</button></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small">Sudah punya akun? <a href="login.php">Login disini!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
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
    </body>
</html>



