<?php
include 'header.php';
include 'db.php';
include 'navbar.php';

$perintah = $db->query("SELECT * FROM user ORDER BY id DESC");
?>

<div class="container">

<h1>Data User</h1><br>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"> </i> User</button>

<!-- Modal Tambah User -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah User</h4>
       </div>
                <div class="modal-body">
        
            <!--form--><form role="form" action="proses_user.php" method="post">
           <div class="form-group">
                    <input type="text" name="username" id="username" autocomplete="off" class="form-control" placeholder="Username" autocomplete="off" required="" >
                    </div>

                    <div class="form-group">
                    <input type="text" name="password" id="password" autocomplete="off" placeholder="Password" class="form-control" required="" >
                    </div>

                    <div class="form-group">
                    <input type="text" name="nama" id="nama" autocomplete="off" placeholder="Nama Lengkap" class="form-control" required="" >
                    </div>

                    <div class="form-group">
                    
                    <select type="text" name="jenis_kelamin" id="jenis_kelamin" autocomplete="off" class="form-control" required="" >
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value='laki-laki'>Laki-laki</option>
                    <option value='perempuan'>Perempuan</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <input type="text" name="no_telp" placeholder="No Telphone" autocomplete="off" id="no_telp" class="form-control" required="" >
                    </div>

                    <div class="form-group">
                    <textarea name="alamat" id="alamat" placeholder="Alamat" autocomplete="off" class="form-control" required=""></textarea> 
                    </div>

                    <div class="form-group">
                    <select type="text" name="jabatan" id="jabatan" autocomplete="off" class="form-control" required="" >
                    <option value="">Pilih Jabatan</option>
                        <?php 
                        $query = $db->query("SELECT nama_jabatan FROM jabatan ");
                        while($data = mysqli_fetch_array($query))
                        {
                        
                        echo "<option>".$data['nama_jabatan'] ."</option>";
                        }
                        
                        ?>
                    </select>
                    </div>
          
     <button type="submit" id="submit_tambah" class="btn btn-info"><span class='glyphicon glyphicon-plus'> </span>Tambah</button>
          </form>
              </div>


     <!--button penutup-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>


    </div>

  </div>
</div>

<!-- Penutup Modal Tambah User -->


<!-- Modal Reset data -->
<div id="modal_reset" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmsi Reset Password Data User</h4>
      </div>

      <div class="modal-body">
   
   <p>Apakah Anda yakin Ingin Mengganti Password Data ini ?</p>
   <form >
    <div class="form-group">
    <label> Username :</label>
     <input type="text" id="reset_user_name" class="form-control" readonly=""> 
     <input type="hidden" id="reset_id_hapus" class="form-control" > 
    </div>
   
   </form>
   
  <div class="alert alert-success" style="display:none">
   <strong>Berhasil!</strong> Password Berhasil Di Reset
  </div>
 

     </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-info" id="btn_jadi_reset"><span class='glyphicon glyphicon-ok-sign'> </span> Ya</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class='glyphicon glyphicon-remove-sign'> </span> Batal</button>
      </div>
    </div>

  </div>
</div><!-- end of modal reset data  -->

<!-- Modal Hapus data -->
<div id="modal_hapus" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title">Konfirmasi Hapus Data User</h4></center>
      </div>

      <div class="modal-body">
   
   <p>Apakah Anda yakin Ingin Menghapus Data ini ?</p>
   <form >
    <div class="form-group">
    <label> Username </label>
     <input type="text" id="user_name" class="form-control" readonly=""> 
     <input type="hidden" id="id_hapus" class="form-control" > 
    </div>
   
   </form>
   
  <div class="alert alert-success" style="display:none">
   <strong>Berhasil!</strong> Data berhasil Di Hapus
  </div>
 

     </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-info" id="btn_jadi_hapus"><span class='glyphicon glyphicon-ok-sign'> </span> Ya</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class='glyphicon glyphicon-remove-sign'> </span> Batal</button>
      </div>
    </div>

  </div>
</div><!-- end of modal hapus data  -->

<!-- Modal edit data -->
<div id="modal_edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Data User</h4>
      </div>
<div class="modal-body">

                    <div class="form-group">
                    <label> Username :</label>
                    <input id="id_edit" type="hidden" required="" autocomplete="off" >
                    <input type="text" id="username_edit" autocomplete="off" class="form-control" autocomplete="off" required="" >
                    </div>

                    <div class="form-group">
                    <label> Nama Lengkap :</label>
                    <input type="text" id="nama_edit" autocomplete="off" class="form-control" required="" autocomplete="off">
                    </div>

                    <div class="form-group">
                    <label> Jenis Kelamin :</label>
                    <select type="text" id="jenis_kelamin_edit" autocomplete="off" class="form-control" required="" >
                    <option value='laki-laki'>Laki-laki</option>
                    <option value='perempuan'>Perempuan</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label> No Telphone :</label>
                    <input type="text" placeholder="No Telphone" autocomplete="off" id="no_telp_edit" class="form-control" required="" >
                    </div>

                    <div class="form-group">
                    <label> Alamat :</label>
                    <textarea id="alamat_edit" placeholder="Alamat" autocomplete="off" class="form-control" required=""></textarea> 
                    </div>

                    <div class="form-group">
                    <label> Jabatan :</label>
                    <select type="text" id="jabatan_edit" autocomplete="off" class="form-control" required="" >
                    <?php 
                        $query = $db->query("SELECT nama_jabatan FROM jabatan ");
                        while($data = mysqli_fetch_array($query))
                        {
                        
                        echo "<option>".$data['nama_jabatan'] ."</option>";
                        }
                        
                        ?>
                    </select>
                    </div>

<button type="submit" id="submit_edit" class="btn btn-info"><span class='glyphicon glyphicon-plus'> </span>Edit</button>
                   
        </div>


  <div class="alert alert-success" style="display:none">
   <strong>Berhasil!</strong> Data Berhasil Di Edit
  </div>
 

      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

 </div>
</div><!-- end of modal edit data  -->

<div class="table-responsive">
<span id="table-baru">
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
</span>
</div>

</div> <!-- close container -->
<script>
    $(document).ready(function(){

//fungsi untuk menambahkan data
        $("#submit_tambah").click(function(){
        var username = $("#username").val();
        var password = $("#password").val();
        var nama = $("#nama").val();
        var jenis_kelamin = $("#jenis_kelamin").val();
        var no_telp = $("#no_telp").val();
        var alamat = $("#alamat").val();
        var jabatan = $("#jabatan").val();

        if (username == "")
        {
        alert("Username Harus Diisi");
        }
        else {
        
        $.post('proses_user.php',{username:username,
        password:password,
        nama:nama,
        jenis_kelamin:jenis_kelamin,
        no_telp:no_telp,
        alamat:alamat,
        jabatan:jabatan},function(data){

        if (data != '') {
        $("#username").val('');
        

        $(".alert").show('fast');
        $("#table-baru").load('table_baru_user.php');
        
        setTimeout(tutupalert, 2000);
        $(".modal").modal("hide");
        }
        
        
        });                                     
                                    }

        function tutupmodal() {
        
        }       
        
        });
    });

// end fungsi tambah data

</script>

<!-- Awal fungsi reset password data -->
<script>
        $(".btn-reset").click(function(){
        var reset_user_name = $(this).attr("data-reset-user");
        var reset_id = $(this).attr("data-reset-id");
        $("#reset_user_name").val(reset_user_name);
        $("#reset_id_hapus").val(reset_id);
        $("#modal_reset").modal('show');
        
        $(".alert-success").hide();
        
        });

        $("#btn_jadi_reset").click(function(){
        

        var user_name = $("#reset_user_name").val();
        var id = $("#reset_id_hapus").val();
        $.post("reset_password.php",{id:id},function(data){
        if (data != "") {
        $("#table-baru").load('tabel_user.php');
        $(".alert-success").show();
        $("#modal_reset").modal('hide');
        
        }

        });
        
        });

        </script>   
<!-- End fungsi reset password data -->

<!-- Open Delete Data -->
<script type="text/javascript">
            
//fungsi hapus data 
$(document).on('click', '.btn-hapus', function (e) {
        var username = $(this).attr("data-user");
        var id = $(this).attr("data-id");
        $("#user_name").val(username);
        $("#id_hapus").val(id);
        $("#modal_hapus").modal('show');
        
        });


$(document).on('click','#btn_jadi_hapus', function (e) {
        
        var id = $("#id_hapus").val();
        $.post("hapus_user.php",{id:id},function(data){
        if (data != "") {
        
        $("#modal_hapus").modal('hide');
        $(".tr-id-"+id+"").remove();
        }

        
        });
        
        
        });

        </script> 
<!-- End Delete Data -->

<!-- Open Skript Edit Data -->
<script type="text/javascript">
//fungsi edit data 
                $(document).on('click', '.btn-edit', function (e) {
                
                $("#modal_edit").modal('show');
                var id = $(this).attr("data-id");
                var username = $(this).attr("data-username");
                var nama   = $(this).attr("data-nama");
                var jenis_kelamin = $(this).attr("data-jenis-kelamin");
                var alamat   = $(this).attr("data-alamat");
                var no_telp = $(this).attr("data-no-telp");
                var jabatan = $(this).attr("data-jabatan");
   

                $("#nama_edit").val(nama);
                $("#username_edit").val(username);
                $("#jenis_kelamin_edit").val(jenis_kelamin);
                $("#alamat_edit").val(alamat);
                $("#no_telp_edit").val(no_telp);
                $("#jabatan_edit").val(jabatan);
                $("#id_edit").val(id);

                });
                
                $("#submit_edit").click(function(){
                var nama = $("#nama_edit").val();
                var username = $("#username_edit").val();
                var jenis_kelamin = $("#jenis_kelamin_edit").val();
                var alamat = $("#alamat_edit").val();
                var no_telp = $("#no_telp_edit").val();
                var jabatan = $("#jabatan_edit").val();
                var id = $("#id_edit").val();

                if (nama == ""){
                  alert("Nama Harus Diisi");
                }
               
                else
                {
                $.post("proses_edit_user.php",{nama:nama,username:username,jenis_kelamin:jenis_kelamin,alamat:alamat,no_telp:no_telp,jabatan:jabatan,id:id},function(data){

                

                $("#table-baru").load('table_baru_user.php');
                $("#modal_edit").modal('hide');
                
                
                
                });
                

                }


                });
                
                
                
           //end function edit data
                
                $('form').submit(function(){
                
                return false;
                });
                
             
                

                function tutupalert() {
                $(".alert").hide("fast")
                }

      

 </script>
<!-- End Edit Data -->

<script>

$(document).ready(function(){
    $('table').DataTable();
});

</script>

<?php
include 'footer.php';
?>