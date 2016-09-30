<?php
include 'sanitasi.php';
include 'db.php';



$query = $db->prepare("UPDATE jabatan SET id = ?, nama_jabatan = ? 
WHERE id = ?");

$query->bind_param("isi",
	$id, $nama_jabatan, $id);
	
	$id = angkadoang($_POST['id']);
	$nama_jabatan = stringdoang($_POST['nama_jabatan']);

$query->execute();


if ($query == TRUE)

{
    header('location:jabatan.php');
}


    //Untuk Memutuskan Koneksi Ke Database
mysqli_close($db);   
?>

