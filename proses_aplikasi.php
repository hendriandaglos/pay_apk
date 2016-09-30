<?php 
session_start();
$user = $_SESSION['username'];

include 'db.php';
include 'sanitasi.php';

$nama = stringdoang($_POST['nama']); 
$kode_aplikasi = stringdoang($_POST['kode_aplikasi']); 
$harga = angkadoang($_POST['harga']); 
        
$perintah = $db->prepare("INSERT INTO aplikasi (kode_aplikasi, nama_aplikasi, harga, user_buat) VALUES (?,?,?,?)");

    $perintah->bind_param("ssis", $kode_aplikasi, $nama, $harga, $user);
 
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