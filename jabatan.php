<?php 

//memasukkan file session login, header, navbar, db.php
include 'header.php';
include 'db.php';
include 'navbar.php';

//menampilkan seluruh data yang ada pada tabel jabatan
$query = $db->query("SELECT * FROM jabatan  ORDER BY id DESC ");
 ?>

<div class="container">


<!-- Modal tambah data -->
<div id="myModal" class="modal fade" role="dialog">
  	<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Jabatan</h4>
      </div>
    <div class="modal-body">
<form role="form">
					<div class="form-group">
					<label> Nama Jabatan </label><br>
					<input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control" autocomplete="off" required="" >
					</div>
									
					
					<button type="submit" id="submit_tambah" class="btn btn-success">Submit</button>
</form>

				
					<div class="alert alert-success" style="display:none">
					<strong>Berhasil!</strong> Data berhasil Di Tambah
					</div>

 	</div><!-- end of modal body -->

					<div class ="modal-footer">
					<button type ="button"  class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>

</div><!-- end of modal buat data  -->


<!-- Modal Hapus data -->
<div id="modal_hapus" class="modal fade" role="dialog">
  <div class="modal-dialog">



    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi Hapus Data Jabatan</h4>
      </div>

      <div class="modal-body">
   
   <p>Apakah Anda yakin Ingin Menghapus Data ini ?</p>
   <form >
    <div class="form-group">
    <label> Nama Jabatan :</label>
     <input type="text" id="nama_jabatan_hapus" class="form-control" readonly=""> 
     <input type="hidden" id="id_hapus" class="form-control" > 
    </div>
   
   </form>
   
  <div class="alert alert-success" style="display:none">
   <strong>Berhasil!</strong> Data berhasil Di Hapus
  </div>
 

     </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-info" id="btn_jadi_hapus"> <span class='glyphicon glyphicon-ok-sign'> </span>Ya</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class='glyphicon glyphicon-remove-sign'> </span>Batal</button>
      </div>
    </div>

  </div>
</div>
<!-- end of modal hapus data  -->

<!-- Modal edit data -->
<div id="modal_edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Data Jabatan</h4>
      </div>
      <div class="modal-body">
  <form role="form">
   <div class="form-group">
    <label for="email">Nama Satuan:</label>
     <input type="text" class="form-control" id="nama_jabatan_edit" autocomplete="off">
     <input type="hidden" class="form-control" id="id_edit">
    
   </div>
   
   
   <button type="submit" id="submit_edit" class="btn btn-default">Submit</button>
  </form>
  <div class="alert alert-success" style="display:none">
   <strong>Berhasil!</strong> Data Berhasil Di Edit
  </div>
 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div><!-- end of modal edit data  -->


<h1><b> Data Jabatan</b></h1> <br>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus"> </i> Jabatan </button>

<div class="table-responsive">
<span id="table-baru">
<table id="tableuser" class="table table-bordered">
	<thead> 
			
			<th> Nama Jabatan </th>
			<th> Hapus </th>
			<th> Edit </th>

				
		</thead>
		
		<tbody >
		<?php

		// menyimpan data sementara yang ada pada $query
			while ($data = mysqli_fetch_array($query))
			{
				//menampilkan data
			echo "<tr class='tr-id-".$data['id']."'>
			
			<td>". $data['nama_jabatan'] ."</td>
			
			<td> <button class='btn btn-danger btn-hapus' data-id='". $data['id'] ."' data-jabatan='". $data['nama_jabatan'] ."'> <span class='glyphicon glyphicon-trash'> </span> Hapus </button> </td>
		
			<td> <button class='btn btn-info btn-edit' data-nama-jabatan='". $data['nama_jabatan'] ."' data-id='". $data['id'] ."'> <span class='glyphicon glyphicon-edit'> </span> Edit </button> </td>
			</tr>";
			
	}

	//Untuk Memutuskan Koneksi Ke Database
mysqli_close($db);   
		?>
		</tbody>

	</table>
</span>
</div>

	<script>
    $(document).ready(function(){

//fungsi untuk menambahkan data
		$("#submit_tambah").click(function(){
		var nama_jabatan = $("#nama_jabatan").val();


		if (nama_jabatan == "")
		{
		alert("Nama Harus Diisi");
		}
		else {
		
		$.post('proses_jabatan.php',{nama_jabatan:nama_jabatan},function(data){

		if (data != '') {
		$("#nama_jabatan").val('');
		

		$(".alert").show('fast');
		$("#table-baru").load('table_baru_jabatan.php');
		
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
<!--
<script type="text/javascript">
$(document).ready(function(){
$("#nama_jabatan").blur(function(){
               var nama_jabatan = $("#nama_jabatan").val();

              $.post('cek_nama_jabatan.php',{nama_jabatan:nama_jabatan}, function(data){
                
                if(data == 1){

                    alert ("Nama Jabatan Sudah Ada");
                    $("#nama_jabatan").val('');
                }
                else {
                    
                }
              });
                
               });
               });
});
</script>
-->

<script type="text/javascript">

//fungsi hapus data 
$(document).on('click', '.btn-hapus', function (e) {
		var nama_jabatan = $(this).attr("data-jabatan");
		var id = $(this).attr("data-id");
		$("#nama_jabatan_hapus").val(nama_jabatan);
		$("#id_hapus").val(id);
		$("#modal_hapus").modal('show');
		
		});


$(document).on('click', '#btn_jadi_hapus', function (e) {
		
		var id = $("#id_hapus").val();
		$.post("delete_jabatan.php",{id:id},function(data){
		if (data != "") {
		
		$("#modal_hapus").modal('hide');
		$(".tr-id-"+id+"").remove();
		
		}

		
		});
		
		});
// end fungsi hapus data

</script>


<script type="text/javascript">

$(document).ready(function(){	
//fungsi edit data 
		$(".btn-edit").click(function(){
		
		$("#modal_edit").modal('show');
		var nama_jabatan = $(this).attr("data-nama-jabatan"); 
		var id  = $(this).attr("data-id");
		$("#nama_jabatan_edit").val(nama_jabatan);
		$("#id_edit").val(id);
		
		
		});
		
		$("#submit_edit").click(function(){
		var nama_jabatan = $("#nama_jabatan_edit").val();
		var id = $("#id_edit").val();

		$.post("update_jabatan.php",{id:id,nama_jabatan:nama_jabatan},function(data)
		{
		
		if (data != '')
			{

		$(".alert").show('fast');
		$("#table-baru").load('table_baru_jabatan.php');
		
		setTimeout(tutupalert, 2000);
		$(".modal").modal("hide");

			}
		else
			{

			}

		});
		});
		


//end function edit data

		$('form').submit(function(){
		
		return false;
		});
		
	});
		
		
		
		function tutupalert() {
		$(".alert").hide("fast");

		}
		
</script>

<script>

$(document).ready(function(){
    $('table').DataTable();
});

</script>

<?php 
include 'footer.php';
 ?>