<!DOCTYPE html>
<html lang="en">
<head>
  <title>Aktivasi</title>
</head>
<body>
<div class="container" align="center">
  <br>
 
  <?php 

    require_once 'function/koneksi.php';
    $token=$_GET['t'];
    $sql_cek=mysqli_query($koneksi, "SELECT * FROM jamaah WHERE token='".$token."' and status='0'");
    $jml_data=mysqli_num_rows($sql_cek);
    if ($jml_data>0) {
    //update data users aktif
      mysqli_query($koneksi, "UPDATE jamaah SET status='1' WHERE token='".$token."' and status='0'");
      echo '<div class="alert alert-success">
        Pendaftaran anda berhasil, Terima kasih telah mendaftar. anda akan mendapatkan notifikasi pengajian 
      </div>';
    }else{
      //data tidak di temukan
      echo '<div class="alert alert-warning">
      Invalid Token!
      </div>';
    }

   ?>


</div>
</body>
</html>