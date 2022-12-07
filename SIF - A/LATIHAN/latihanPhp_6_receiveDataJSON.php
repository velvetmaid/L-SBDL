<?php
	$data = json_decode($_GET['panen']);
	
	$j=count($data);
	for($i=0;$i<$j;$i++){
	echo "Tahun: " . $data[$i]->tahun . "<br/>";
	echo "Jenis: " . $data[$i]->jenis . "<br/>";
	echo "Hasil: " . $data[$i]->hasil . "<br/>";

	}

?>