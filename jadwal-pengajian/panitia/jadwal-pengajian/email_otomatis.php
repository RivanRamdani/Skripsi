<?php 
    session_start();
    date_default_timezone_set("Asia/Bangkok");
    require '../../function/koneksi.php';
    $query = mysqli_query($koneksi, "SELECT * FROM pengajian");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '../../assets/vendor/autoload.php';

    while($row = mysqli_fetch_assoc($query)){
        $nama_ustadz = $row['nama_ustadz'];
        $judul_pengajian = $row['judul_pengajian'];
        $tanggal_pengajian = $row['tanggal_pengajian'];
        $jam = $row['jam'];
        $tanggal_sekarang = date('Y-m-d');
        $waktu_sekarang = date('H:i');
        $date = date_create($tanggal_pengajian." ".$jam);
        date_add($date, date_interval_create_from_date_string('-1 minutes'));
        $sebelum_pengajian = date_format($date, 'H:i');

        var_dump(date('H:i'));
        var_dump($sebelum_pengajian);

        if($tanggal_pengajian == $tanggal_sekarang AND $waktu_sekarang == $sebelum_pengajian){
            $query_jamaah = mysqli_query($koneksi, "SELECT * FROM jamaah WHERE id_pengajian = '$row[id_pengajian]' AND status = 1");
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
            while($row_jamaah = mysqli_fetch_assoc($query_jamaah)){
                $mail->addCC($row_jamaah['email'], $row_jamaah['nama']);     
            }
            $mail->isHTML(true);                                 
            $mail->Subject = 'Info Pengajian '.$nama_ustadz.' - '.$judul_pengajian;
            $mail->Body    = 'Pengajian '.$nama_ustadz.' dengan judul '.$judul_pengajian.' 30 Menit lagi';
            $mail->send();
        }
    }
    

    // $_SESSION['notif-sukses'] = "Email berhasil dikirim";
    // header('Location: index.php');

 ?>