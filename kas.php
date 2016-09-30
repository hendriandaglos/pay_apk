<?php 

//memasukkan file session login, header, navbar, db.php
include 'header.php';
include 'db.php';
include 'navbar.php';
include 'sanitasi.php';

//menampilkan seluruh data yang ada pada tabel jabatan
$query = $db->query("SELECT * FROM kas ORDER BY id DESC ");
 ?>


<div class="container">
<h1><b> Data Kas</b></h1> <br>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus"> </i> Kas </button>
<br>

<!-- Modal tambah data -->
<div id="myModal" class="modal fade" role="dialog">
  	<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Kas</h4>
      </div>
    <div class="modal-body">
<form role="form">

					<div class="form-group">
					<label> Kas </label><br>
					<input type="text" name="kas" id="kas" class="form-control" autocomplete="off" required="" >
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
        <h4 class="modal-title">Konfirmasi Hapus Data Kas</h4>
      </div>

      <div class="modal-body">
   
   <p>Apakah Anda yakin Ingin Menghapus Data ini ?</p>
   <form >
    <div class="form-group">
    <label> Kas :</label>
     <input type="text" id="nama_hapus" class="form-control" readonly=""> 
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
        <h4 class="modal-title">Edit Data Kas</h4>
      </div>
      <div class="modal-body">
  <form role="form">
   <div class="form-group">
    <label for="email">Nama :</label>
     <input type="text" class="form-control" id="nama_edit" autocomplete="off">
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

<div class="table-responsive">
<span id="table-baru">
<table id="table" class="table table-bordered">
	<thead> 
			
			<th> Nama Kas </th>
			<th> Jumlah </th>
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
			
			<td>". $data['nama'] ."</td>
			<td>Rp. ". rp($data['jumlah']) ."</td>
			
			<td> <button class='btn btn-danger btn-hapus' data-id='". $data['id'] ."' data-nama='". $data['nama'] ."'> <span class='glyphicon glyphicon-trash'> </span> Hapus </button> </td>
		
			<td> <button class='btn btn-info btn-edit' data-nama='". $data['nama'] ."' data-id='". $data['id'] ."'> <span class='glyphicon glyphicon-edit'> </span> Edit </button> </td>
			</tr>";
			
	}

	//Untuk Memutuskan Koneksi Ke Database
mysqli_close($db);   
		?>
		</tbody>

	</table>
</span>
</div>


</div> <!-- e nd container-->

<script>

$(document).ready(function(){
    $('.table').DataTable();
});

</script>


<script>
    $(document).ready(function(){

//fungsi untuk menambahkan data
		$("#submit_tambah").click(function(){
		var nama= $("#kas").val();


		if (nama== "")
		{
		alert("Nama Kas Harus Diisi");
		}
		else {
		
		$.post('proses_kas.php',{nama:nama},function(data){

		if (data != '') {
		$("#kas").val('');
		

		$(".alert").show('fast');
		$("#table-baru").load('table_baru_kas.php');
		
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


<script type="text/javascript">

//fungsi hapus data 
$(document).on('click', '.btn-hapus', function (e) {
		var nama = $(this).attr("data-nama");
		var id = $(this).attr("data-id");
		$("#nama_hapus").val(nama);
		$("#id_hapus").val(id);
		$("#modal_hapus").modal('show');
		
		});


$(document).on('click', '#btn_jadi_hapus', function (e) {
		
		var id = $("#id_hapus").val();
		$.post("delete_kas.php",{id:id},function(data){
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
		var nama = $(this).attr("data-nama"); 
		var id  = $(this).attr("data-id");
		$("#nama_edit").val(nama);
		$("#id_edit").val(id);
		
		
		});
		
		$("#submit_edit").click(function(){
		var nama = $("#nama_edit").val();
		var id = $("#id_edit").val();

		$.post("update_kas.php",{id:id,nama:nama},function(data)
		{
		
		if (data != '')
			{

		$(".alert").show('fast');
		$("#table-baru").load('table_baru_kas.php');
		
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


 <?php include 'footer.php'; ?>