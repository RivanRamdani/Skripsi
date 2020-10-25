<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require_once '../assets/vendor/autoload.php';
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

    $mail->addAddress($_POST['email'], $_POST['nama']);     
    $mail->isHTML(true);                                 
    $mail->Subject = "Aktivasi pendaftaran Panitia";
    $mail->Body    = "Selemat, anda berhasil membuat akun. Untuk mengaktifkan akun anda silahkan klik link dibawah ini.<br> <a href='http://localhost/jadwal-pengajian/panitia/aktivasi.php?t=".$token."'>http://localhost/jadwal-pengajian/panitia/aktivasi.php?t=".$token."</a>  ";
    $mail->send();