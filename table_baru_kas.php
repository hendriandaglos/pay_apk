<?php 
include 'db.php';
include 'sanitasi.php';

//menampilkan seluruh data yang ada pada tabel jabatan
$query = $db->query("SELECT * FROM kas ORDER BY id DESC ");
?>
<div class="table-responsive">
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
</div>

	<script>

$(document).ready(function(){
    $('.table').DataTable();
});

</script>