<?php
$d = dir('./userdata/');
while (($file = $d->read()) !== false){ 
	if($file == $_POST['username'].'json'){
		$json = file_get_contents($file.'.json');
		$obj=json_decode($json);
		echo 'a';
	}
}
$d->close(); 
echo 'end';
?>