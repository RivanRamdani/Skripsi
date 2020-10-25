<?php 

	require_once '../function/koneksi.php'; 

	session_start();

	if(isset($_SESSION['user'])){
		header('Location: index.php');
	}	

	$error = '';

	if(isset($_POST['submit'])){

		$email = $_POST['email'];
		$password = $_POST['password'];

		//validasi atau logika
		if(!empty(trim($email)) && !empty(trim($password))){

			$query_read = "SELECT * FROM panitia WHERE email='$email'";
			$result_read = mysqli_query($koneksi, $query_read);
		
			if($user = mysqli_num_rows($result_read) != 0){


				$row = mysqli_fetch_assoc($result_read);
				if($row['status'] == 1){

					if(password_verify($password, $row['password'])){

						$_SESSION['user'] = $row;
						header('Location: dashboard.php');

					}else{
						$error = 'Username atau password salah';
					}
				
				}else{
					$error = 'Akun anda belum aktif, silahkan verifikasi email anda';
				}
			}else{
				$error = 'Email belum ada';
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
        <title>Login Panitia</title>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">

                                    	<?php if($error != '') : ?>
	                                    	<div class="alert alert-danger">
	                                    		<?php echo $error; ?>
	                                    	</div>
                                    	<?php endif; ?>

                                        <form action="" method="post">
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input class="form-control py-4" name="email" id="inputEmailAddress" type="email" placeholder="Enter email address" /></div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Enter password" /></div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><a class="small" href="password.html">Lupa Password?</a><button type="submit" name="submit" class="btn btn-primary">Login</button></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small">Belum punya akun? <a href="register.php">Daftar disini!</a></div>
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
                            <div class="text-muted">Copyright &copy; Your Website 2019</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../assets/js/scripts.js"></script>
    </body>
</html>


