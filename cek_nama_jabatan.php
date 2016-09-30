<?php 

include 'db.php';

$nama_jabatan = $_POST['nama_jabatan'];

$query = $db->query("SELECT * FROM jabatan WHERE nama_jabatan = '$nama_jabatan'");
$jumlah = mysqli_num_rows($query);


if ($jumlah > 0){

  echo "1";
}
else {

}

        //Untuk Memutuskan Koneksi Ke Database

        mysqli_close($db);
        
 ?>

