<?php 

include 'db.php';
include 'sanitasi.php';

//menampilkan seluruh data yang ada pada tabel jabatan
$query = $db->query("SELECT * FROM aplikasi ORDER BY id DESC ");
 ?>


<table id="table" class="table table-bordered">
	<thead> 
			
			<th> Nama Aplikasi </th>
			<th>Harga Aplikasi</th>
			<th> User Buat </th>
			<th>User Edit</th>
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
			
			<td>". $data['nama_aplikasi'] ."</td>
			<td>Rp. ". rp($data['harga']) ."</td>
			<td>". $data['user_buat'] ."</td>
			<td>". $data['user_edit'] ."</td>
			
			<td> <button class='btn btn-danger btn-hapus' data-id='". $data['id'] ."' data-kode-aplikasi='". $data['kode_aplikasi'] ."' data-nama='". $data['nama_aplikasi'] ."'> <span class='glyphicon glyphicon-trash'> </span> Hapus </button> </td>
		
			<td> <button class='btn btn-info btn-edit' data-kode-aplikasi='". $data['kode_aplikasi'] ."' data-nama='". $data['nama_aplikasi'] ."' data-id='". $data['id'] ."'> <span class='glyphicon glyphicon-edit'> </span> Edit </button> </td>
			</tr>";
			
	}

	//Untuk Memutuskan Koneksi Ke Database
mysqli_close($db);   
		?>
		</tbody>

	</table>





	<script>

$(document).ready(function(){
    $('.table').DataTable();
});

</script>