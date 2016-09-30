<?php
include 'sanitasi.php';
include 'db.php';



$query = $db->prepare("UPDATE kas SET id = ?, nama = ? 
WHERE id = ?");

$query->bind_param("isi",
	$id, $nama, $id);
	
	$id = angkadoang($_POST['id']);
	$nama = stringdoang($_POST['nama']);

$query->execute();


if ($query == TRUE)

{
    header('location:kas.php');
}


    //Untuk Memutuskan Koneksi Ke Database
mysqli_close($db);   
?>

