<?php 
require('function.php');
if(isset($_POST['nama'])){
	define('DB','db.txt');
	if(!file_exists(DB)){
		saveTxt(DB,"2022|nama|pekerjaan|alamat|".PHP_EOL,'a');
	}
	$loadDB = @file(DB, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	$total = explode("|",$loadDB[count($loadDB)-1]);
	$id = $total[0]+1;
	$nama = $_POST['nama'];
	$pekerjaan = $_POST['pekerjaan'];
	$alamat = $_POST['alamat'];
	$foto = $_FILES['foto']['name'];
	$temp = $_FILES['foto']['tmp_name'];
	if(move_uploaded_file($temp,'foto/'.$foto)){
		saveTxt(DB,"$id|$nama|$pekerjaan|$alamat|$foto".PHP_EOL,'a');
		header('location:index.php');
		exit;
	}
}
?>

<html>
<head>
<title>Tambah Produk</title>
</head>
	<style type="text/css">
		* {
			font-family: "Trebuchet MS";
		}
		h1 { 
			text-transform: uppercase;
			color: salmon;
		}
		.base {
			width: 400px;
			padding: 20px;
			margin-left: auto;
			margin-right: auto;
		}
		label {
			margin-top : 10px;
			float: left;
			text-align: left;
			width: 100%;
			background-color: #ededed;
		}
		input {
			padding: 6px;
			width: 100%;
			box-sizing: border-box;
			background-color: #f8f8f8;
			border: 2px solid #ccc;
			outline-color: salmon;
		}
	</style>

<body>
	<center><h1>Tambah Produk</h1></center>
	<form enctype="multipart/form-data" action="#" method="POST">
		<section class="base">
			<div>
				<label>- Nama Produk</label>
				<input name="nama" type="text"><br/>
			</div>
			<div>
				<label>- Jenis Produk</label>
				<input name="pekerjaan" type="text"><br/>
			</div>
			<div>
				<label>- Harga Produk</label>
				<input name="alamat" tfotoype="text"><br/>
			</div>
			<div>
				<label>- Foto Produk</label>
				<input name="foto" type="file"><br/>
			</div>
			<div>
				<button type="submit">Simpan Produk</button>
			</div>
		</section>
	</form>	
</body>

</html>