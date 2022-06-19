<?php 

function saveTxt($id_file,$id_content,$kode){
	if(!file_exists($id_file)) fopen($id_file,"w");
	$fp = fopen($id_file,$kode) or die ("Error opening file $id_file");
	fputs($fp,$id_content);
	fclose($fp) or die ("Error closing file!");
}

