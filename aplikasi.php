<?php 

//memasukkan file session login, header, navbar, db.php
include 'header.php';
include 'db.php';
include 'navbar.php';
include 'sanitasi.php';

//menampilkan seluruh data yang ada pada tabel jabatan
$query = $db->query("SELECT * FROM aplikasi ORDER BY id DESC ");
 ?>


<div class="container">
<h1><b> Data Aplikasi</b></h1> <br>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus"> </i> Aplikasi </button>
<br><br>

<!-- Modal tambah data -->
<div id="myModal" class="modal fade" role="dialog">
  	<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Aplikasi</h4>
      </div>
    <div class="modal-body">
<form role="form">

					<div class="form-group">
					<label> Kode Aplikasi </label><br>
					<input type="text" name="kode_aplikasi" id="kode_aplikasi" class="form-control" autocomplete="off" required="" >
					</div>

					<div class="form-group">
					<label> Aplikasi </label><br>
					<input type="text" name="nama" id="nama" class="form-control" autocomplete="off" required="" >
					</div>

					<div class="form-group">
					<label> Harga </label><br>
					<input type="text" name="harga" id="harga" class="form-control" autocomplete="off" required="" >
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
        <h4 class="modal-title">Konfirmasi Hapus Data Aplikasi</h4>
      </div>

      <div class="modal-body">
   
   <p>Apakah Anda yakin Ingin Menghapus Data ini ?</p>
   <form >


    <div class="form-group">
    <label> Aplikasi :</label>
     <input type="text" id="nama_hapus" class="form-control" readonly=""> 
     <input type="hidden" id="id_hapus" class="form-control" > 
     <input type="text" id="kode_hapus" class="form-control" readonly=""> 
     <input type="text" id="harga_hapus" class="form-control" readonly=""> 
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

<div class="table-responsive">
<span id="table-baru">
<table id="table" class="table table-bordered">
	<thead> 
			
			<th> Nama Aplikasi </th>
			<th>Harga Aplikasi</th>
			<th> User Buat </th>
			<th>User Edit</th>
			<th> Hapus </th>
			<th> Edit </th>
asdaswdas
				
		</thead>
		
		<tbody >
		<?php

		// menyimpan data sementara yang ada pada $query
			while ($data = mysqli_fetch_array($query))
			{
				//menampilkan data
			echo "<tr class='tr-id-".$data['id']."'>
			
			<td>". $data['nama_aplikasi'] ."</td>
			<td>Rp. ". rp($data['harga']) ."</td>
			<td>". $data['user_buat'] ."</td>
			<td>". $data['user_edit'] ."</td>
			
			<td><button class='btn btn-danger btn-hapus' data-id='".$data['id']."' data-kode='".$data['kode_aplikasi']."' data-nama='".$data['nama_aplikasi']."' data-harga='".$data['harga']."'> <span class='glyphicon glyphicon-trash'> </span> Hapus </button> </td>
		
			<td> <button class='btn btn-info btn-edit' data-kode='". $data['kode_aplikasi'] ."' data-nama='". $data['nama_aplikasi'] ."' data-id='". $data['id'] ."'> <span class='glyphicon glyphicon-edit'> </span> Edit </button> </td>
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
		var nama= $("#nama").val();
		var harga= $("#harga").val();
		var kode_aplikasi= $("#kode_aplikasi").val();


		if (nama == "")
		{
		alert("Nama Aplikasi Harus Diisi");
		}
		else if (harga == "")
		{
		alert("Harga Aplikasi Harus Diisi");
		}
		else if (kode_aplikasi == "")
		{
		alert("Kode Aplikasi Harus Diisi");
		}
		else {
		
		$.post('proses_aplikasi.php',{nama:nama,harga:harga,kode_aplikasi:kode_aplikasi},function(data){

		if (data != '') {
		$("#nama").val('');
		$("#harga").val('');
		$("#kode_aplikasi").val('');
	

		$(".alert").show('fast');
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



<!-- Hapus Script -- >
<script type="text/javascript">
//fungsi hapus data 
$(document).on('click', '.btn-hapus', function (e) {
		var nama = $(this).attr("data-nama");
		var kode = $(this).attr("data-kode");
		var id = $(this).attr("data-id");
		var harga = $(this).attr("data-harga");
		$("#nama_hapus").val(nama);
		$("#harga_hapus").val(harga);
		$("#kode_hapus").val(kode);
		$("#id_hapus").val(id);
		$("#modal_hapus").modal('show');
		
		});
// end fungsi hapus data

</script>
<!--End  Hapus Script -- >

 <?php include 'footer.php'; ?>