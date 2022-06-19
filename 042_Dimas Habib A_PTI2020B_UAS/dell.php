<?php 
require('function.php');

if(!empty($_GET['id'])){
	dell($_GET['id']);
	header('location:index.php');
}else{
	header('location:index.php');
}

function dell($id){
	$db = 'db.txt';
	$loadDB = @file($db, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	foreach ($loadDB as $data){
		$exp = explode('|',$data);
		$myid = $exp[0];
		if($myid==$id){
			$out = $data;
			$dell = str_replace($out.PHP_EOL,'',file_get_contents($db));
			saveTxt($db,$dell,'w');
			break;
		}else{
			$out = null;
		}
		
	}
	
return $out;
}

