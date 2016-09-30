<?php 

include 'db.php';
include 'sanitasi.php';
$nama_jabatan = stringdoang($_POST['nama_jabatan']); 
        
$perintah = $db->prepare("INSERT INTO jabatan (nama_jabatan) VALUES (?)");

    $perintah->bind_param("s", $nama_jabatan);
 
    $perintah->execute();



if (!$perintah) 
{
 die('Query Error : '.$db->errno.
 ' - '.$db->error);
}
else 
{
   echo "sukses";
}

//Untuk Memutuskan Koneksi Ke Database
mysqli_close($db);   

 ?>