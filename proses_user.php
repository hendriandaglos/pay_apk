<?php 
    include 'db.php';
    include_once 'sanitasi.php';

    $perintah = $db->prepare("INSERT INTO user (username,password,nama,alamat,jabatan,no_telp,jenis_kelamin) VALUES (?,?,?,?,?,?,?)");

    $perintah->bind_param("sssssss",
        $username, $password, $nama, $alamat, $jabatan, $no_telp, $jenis_kelamin);
         
        $username = stringdoang($_POST['username']);
        $password = enkripsi($_POST['password']);
        $nama = stringdoang($_POST['nama']);
        $alamat = stringdoang($_POST['alamat']);
        $jabatan= stringdoang($_POST['jabatan']);
        $jenis_kelamin = stringdoang($_POST['jenis_kelamin']);
        $no_telp = stringdoang($_POST['no_telp']);
        
       $perintah->execute();

    if (!$perintah) 
    {
    die('Query Error : '.$db->errno.
    ' - '.$db->error);
    }
    else 
    {
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=user.php">';
    }

//Untuk Memutuskan Koneksi Ke Database
mysqli_close($db);   

    ?>
