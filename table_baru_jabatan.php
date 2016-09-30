<table id="tableuser" class="table table-bordered">
	<thead> 
			
			<th> Nama Jabatan </th>
			<th> Hapus </th>
			<th> Edit </th>

				
		</thead>
		
		<tbody >
		<?php
		include 'db.php';
$query = $db->query("SELECT * FROM jabatan  ORDER BY id DESC ");

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
		$("#table-baru").load('tabel-jabatan.php');
		
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
$(document).ready(function(){	
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

		$.post("update_jabatan.php",{id:id,nama_jabatan:nama_jabatan},function(data){
		if (data == 'sukses')
		{

		$(".alert").show('fast');
		$("#table-baru").load('tabel_baru_jabatan.php');
		setTimeout(tutupmodal, 2000);
		setTimeout(tutupalert, 2000);

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
