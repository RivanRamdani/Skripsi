<?php 
    session_start();
    require '../../function/koneksi.php';
    $id = $_POST['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM jamaah WHERE id_pengajian = '$id' AND status = 1");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '../../assets/vendor/autoload.php';
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
    while($row = mysqli_fetch_assoc($query)){
        $mail->addCC($row['email'], $row['nama']);     
    }
    $mail->isHTML(true);                                 
    $mail->Subject = $_POST['subject'];
    $mail->Body    = $_POST['isi_email'];
    $mail->send();

    $_SESSION['notif-sukses'] = "Email berhasil dikirim";
    header('Location: index.php');

 ?>