<?php

include 'db.php';
include 'sanitasi.php';
?>

 <table class="table table-resposive">
    <thead>
        <tr>
            <th>Reset Password</th>
            <th>Usernama</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No Telphone</th>
            <th>Jabatan</th>
            <th>Otoritas</th>
            <th>Edit</th>
            <th>Hapus</th>

        </tr>
    </thead>
    <tbody class="table-user">
        <?php 

$perintah = $db->query("SELECT * FROM user ORDER BY id DESC");
        while ($data1 = mysqli_fetch_array($perintah))
            {

echo "<tr class='ediit tr-id-".$data1['id']." data-id='".$data1['id']."'>
            <td> <button class='btn btn-success btn-reset' data-reset-id='". $data1['id'] ."' data-reset-user='". $data1['username'] ."'><span class='glyphicon glyphicon-refresh'> </span> Reset Password </button> </td>
            <td>". $data1['username'] ."</td>
            <td>". $data1['nama'] ."</td>
            <td>". $data1['jenis_kelamin'] ."</td>
            <td>". $data1['alamat'] ."</td>
            <td>". $data1['no_telp'] ."</td>
            <td>". $data1['jabatan'] ."</td>
            <td>". $data1['otoritas'] ."</td>

            <td><button data-target='modal_edit' class='btn btn-warning btn-edit'
            data-id='".$data1['id']."'
            data-username='".$data1['username']."'
            data-nama='".$data1['nama']."'
            data-jenis-kelamin ='".$data1['jenis_kelamin']."'
            data-alamat='".$data1['alamat']."'
            data-no-telp='".$data1['no_telp']."'
            data-jabatan='".$data1['jabatan']."'>
            <span class='glyphicon glyphicon-edit'></span> Edit </button> </td>

            <td> <button class='btn btn-danger btn-hapus' data-id='". $data1['id'] ."' data-user='". $data1['username'] ."'><span class='glyphicon glyphicon-trash'> </span> Hapus </button> </td>

        </tr>";

    }
?>
    </tbody>
</table>