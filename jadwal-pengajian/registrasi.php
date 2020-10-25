<?php
    
    require 'function/koneksi.php';
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $id_pengajian = $_POST['id_pengajian'];
    $token=hash('sha256', md5(time()));
    $status = 0;

    $sql = "INSERT INTO jamaah(nama,email,alamat,id_pengajian,token,status) VALUES('$nama', '$email', '$alamat', '$id_pengajian','$token', '$status')";
    $query = mysqli_query($koneksi, $sql);

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
    $mail->Subject = "Aktivasi pendaftaran Pengajian";
    $mail->Body    = "Silahkan verifikasi email anda untuk melanjutkan pendaftaran. Untuk verifikasi email anda silahkan klik link dibawah ini.<br> <a href='http://localhost/jadwal-pengajian/aktivasi.php?t=".$token."'>http://localhost/jadwal-pengajian/aktivasi.php?t=".$token."</a>  ";
    $mail->send();

    header('Location: verifikasi.php');