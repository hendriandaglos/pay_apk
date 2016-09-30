<?php 

    include 'db.php';
    include 'sanitasi.php';
    session_start();

    $id = angkadoang($_POST['id']);
    $username = stringdoang($_POST['username']);
    $nama = stringdoang($_POST['nama']);
    $jenis_kelamin = stringdoang($_POST['jenis_kelamin']);
    $alamat = stringdoang($_POST['alamat']);
    $jabatan = stringdoang($_POST['jabatan']);
    $no_telp = stringdoang($_POST['no_telp']);


    // buat prepared statements
$stmt = $db->prepare("UPDATE user SET username = ? , nama = ? , jenis_kelamin = ? , alamat = ?, jabatan = ?, no_telp = ? WHERE id = ?");
                       
  
// hubungkan "data" dengan prepared statements
$stmt->bind_param("ssssssi", 
$username , $nama , $jenis_kelamin , $alamat, $jabatan,$no_telp, $id);

// jalankan query
$stmt->execute();
 
// cek query
if (!$stmt) {
   die('Query Error : '.$db->errno.
   ' - '.$db->error);
}

        else {
}

 
// tutup statements
$stmt->close();

$perintah = $db->query("SELECT * FROM user");
$data1 = mysqli_fetch_array($perintah);

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
            data-jenis-kelamin='".$data1['jenis_kelamin']."'
            data-alamat='".$data1['alamat']."'
            data-no-telp='".$data1['no_telp']."'
            data-jabatan='".$data1['jabatan']."'>
            <span class='glyphicon glyphicon-edit'></span> Edit </button> </td>

            <td> <button class='btn btn-danger btn-hapus' data-id='". $data1['id'] ."' data-user='". $data1['username'] ."'><span class='glyphicon glyphicon-trash'> </span> Hapus </button> </td>

        </tr>";
    ?>

    <!-- Open Edit Data -->
<script type="text/javascript">
//fungsi edit data 
    $(document).on('click', '.btn-edit', function (e) {
      $('#modal_edit').modal('show');

      var id = $(this).attr("data-id");
      var username = $(this).attr("data-username");
      var nama = $(this).attr("data-nama");
      var jenis_kelamin = $(this).attr("data-jenis-kelamin");
      var alamat  = $(this).attr("data-alamat");
      var jabatan = $(this).attr("data-jabatan");
      var no_telp = $(this).attr("data-no-telp");
      

      $("#username_edit").val(username);
      $("#nama_edit").val(nama);
      $("#jenis_kelamin_edit").val(jenis_kelamin);
      $("#jabatan_edit").val(jabatan);
      $("#alamat_edit").val(alamat);
      $("#no_telp_edit").val(no_telp);
      $("#id_edit").val(id);


     });

    $("#submit_edit").click(function()
     {

      var username = $("#username_edit").val();
      var nama = $("#nama_edit").val();
      var jenis_kelamin = $("#jenis_kelamin_edit").val();
      var jabatan = $("#jabatan_edit").val();
      var alamat  = $("#alamat_edit").val();
      var no_telp = $("#no_telp_edit").val();
      var id = $("#id_edit").val();

      $(".tr-id-"+id).remove();
      $.post("proses_edit_user.php",
        {id:id,
        username:username,
        nama:nama,
        jenis_kelamin:jenis_kelamin,
        jabatan:jabatan,
        alamat:alamat,
        no_telp:no_telp},function(data){
    
       $(".table-user").prepend(data);
       $('#modal_edit').closeModal();
        });

     });

    $('form').submit(function()
     {

      return false;
     }); //penutup ('.form').submit(function()

     function tutupmodal() 
     {
     $('#modal_edit').modal('hide');
     }
     
     //end function edit data
</script>
<!-- End Edit Data -->