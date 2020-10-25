<?php 
	
	require_once 'function/koneksi.php';

	$email = $_POST['email'];
	$token=hash('sha256', md5(time()));
    $query = mysqli_query($koneksi, "INSERT INTO subscribe(email, token, status) VALUES('$email', '$token', '$status')");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require_once 'assets/vendor/autoload.php';
    $mail = new PHPMailer(true);                  
    $mail->SMTPDebug = 0;                                
    $mail->isSMTP();                            
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;  
    //ganti dengan email dan password yang akan di gunakan sebagai email pengirim                  
    $mail->Username = 'ngopiterus07@gmail.com';       
    $mail->Password = 'akucakep123';                       
    $mail->SMTPSecure = 'ssl';                           
    $mail->Port = 465;                                  
    //ganti dengan email dan nama kamu
    $mail->setFrom('ngopiterus07@gmail.com', 'Mesjid Agung Majalaya');

    $mail->addAddress($email, $nama);     
    $mail->isHTML(true);                                 
    $mail->Subject = "Konfirmasi Subscribe";
    $mail->Body    = "Silahkan verifikasi email anda untuk melanjutkan subscribe. Untuk verifikasi email anda silahkan klik link dibawah ini.<br> <a href='http://localhost/jadwal-pengajian/konfirmasi-subscribe.php?t=".$token."'>http://localhost/jadwal-pengajian/konfirmasi-subscribe.php?t=".$token."</a>  ";
    $mail->send();

    header('Location: verifikasi.php');

 ?>