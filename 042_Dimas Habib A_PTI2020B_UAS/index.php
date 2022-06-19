<!DOCTYPE html>
<html>
<head>
	<title>TXT</title>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style type="text/css">
		* {
			font-family: "Trebuchet MS";
		}
		h1 { 
			text-transform: uppercase;
			color: #000;
			margin-top: 50px;
		}
</style>		
<body>
	<div class="container mt-3">  
		<center><h1>Data Produk</h1></center>
		<?php require('menu.php');?>
		<table class="table table-dark table-hover">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Jenis</th>
					<th>Harga</th>
					<th>Gambar</th>
					<th>Aksi</th>
				</tr>
			</thead>
			
			<tbody>
				<?php 
					require('function.php');
					define('DB','db.txt');
					if(!file_exists(DB)){
						saveTxt(DB,"2022|nama|pekerjaan|alamat|".PHP_EOL,'a');
					}
					$loadDB = @file(DB, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
					$i = 0;
					foreach($loadDB as $data){
						
						if($i==0){}else{
							//echo $data."<br/>";
							$expData = explode('|',$data);
							$Id = $expData[0];
							$Nama = $expData[1];
							$Pekerjaan = $expData[2];
							$Alamat = $expData[3];
							$foto = $expData[4];
				?>
				<tr>
					<td><?=$Nama;?></td>
					<td><?=$Pekerjaan;?></td>
					<td><?=$Alamat;?></td>
					<td><img src="foto/<?=$foto;?>"  style="width: 150px"  alt=""></td>
					<td>
						<a href="edit.php?id=<?=$Id;?>">
						<button class="btn btn-warning btn-xs" style="align-center"><i class="fa fa-trash-0"></i>Edit</button></a>
						<br></br>
						<a href="dell.php?id=<?=$Id;?>" onclick="return confirm('Anda yakin ingin menghapus data ?')">
						<button class="btn btn-danger btn-xs" style="align-center"><i class="fa fa-trash-0"></i>Delete</button></a>
					</td>
				</tr>
			</tbody>
			<?php		
			}
			$i++;
		}
		?>
		</table>
	</div>
</body>
</html>