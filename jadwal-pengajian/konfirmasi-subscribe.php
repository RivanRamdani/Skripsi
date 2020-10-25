<!DOCTYPE html>
<html lang="en">
<head>
  <title>Akivasi</title>
</head>
<body>
<div class="container" align="center">
  <br>
 
  <?php 

    require_once 'function/koneksi.php';
    $token=$_GET['t'];
    $sql_cek=mysqli_query($koneksi, "SELECT * FROM subscribe WHERE token='".$token."' AND status='0'");
    $jml_data=mysqli_num_rows($sql_cek);
    if ($jml_data>0) {
    //update data users aktif
      mysqli_query($koneksi, "UPDATE subscribe SET status='1' WHERE token='".$token."' AND status='0'");
      echo '<div class="alert alert-success">
        Verifikasi anda berhasil, Terima kasih telah subscribe. anda akan mendapatkan notifikasi pengajian terbaru
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