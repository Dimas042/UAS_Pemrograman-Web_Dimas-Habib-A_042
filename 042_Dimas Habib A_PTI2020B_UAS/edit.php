<?php 
require('function.php');
if(isset($_POST['nama'])){
	define('DB','db.txt');
	if(!file_exists(DB)){
		saveTxt(DB,"2022|nama|pekerjaan|alamat|".PHP_EOL,'a');
	}
	$id = $_GET['id'];
	$nama = $_POST['nama'];
	$pekerjaan = $_POST['pekerjaan'];
	$alamat = $_POST['alamat'];
	$foto = $_FILES['foto']['name'];
	$temp = $_FILES['foto']['tmp_name'];
	$dataLast = edit($_GET['id']);

	if(move_uploaded_file($temp,'foto/'.$foto)){
		$content = str_replace($dataLast,"$id|$nama|$pekerjaan|$alamat|$foto",file_get_contents(DB));
		saveTxt(DB,$content,'w');
		header('location:index.php');
	}else {
		$content = str_replace($dataLast,"$id|$nama|$pekerjaan|$alamat|$foto",file_get_contents(DB));
		saveTxt(DB,$content,'w');
	}
	
	//header('location:index.php');
	//exit;
	
}

if(!empty($_GET['id'])){
	$loadEdit = edit($_GET['id']);
	$explEdit = explode('|',$loadEdit);
	$nama = $explEdit[1];
	$pekerjaan = $explEdit[2];
	$alamat = $explEdit[3];
	$foto = $explEdit[4];
	
}

function edit($id){
	$db = 'db.txt';
	$loadDB = @file($db, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	foreach ($loadDB as $data){
		$exp = explode('|',$data);
		$myid = $exp[0];
		if($myid==$id){
			$out = $data;
			break;
		}else{
			$out = null;
		}
		
	}
	
return $out;
}
?>

<html>
<head>
<title>UPDATE DATA</title>
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
	<center><h1>Update Produk</h1></center>
	<?php require('menu.php');?>
	<form enctype="multipart/form-data" action="#" method="POST">
		<section class="base">
			<div>
				<label>- Nama Produk</label>
				<input name="nama" type="text" value="<?=$nama;?>"><br/>
			</div>
			<div>
				<label>- Jenis Produk</label>
				<input name="pekerjaan" type="text" value="<?=$pekerjaan;?>"><br/>
			</div>
			<div>
				<label>- Harga Produk</label>
				<input name="alamat" type="text" value="<?=$alamat;?>"><br/>
			</div>
			<div>
				<label>- Foto Produk</label>
				<input name="foto" type="file"><br/>
				<img src="foto/<?=$foto;?>" style="width: 150px" alt="">
			</div>
			<div>
				<button type="submit">Update Produk</button>
			</div>
		</section>
	</form>	
</body>
</html>