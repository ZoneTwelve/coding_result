<?php
$user = $_POST['username'];
$json = file_get_contents('database.json');
$obj=json_decode($json);
$i=0;
foreach($obj as $data) {
	if($user == $data->name){
	  unset($obj[$i]);
	  $i++;
	  echo '刪除成功!<meta http-equiv="refresh" content="3;url=./ManageUsers.php" />';
	  die();
	}
}
$obj=array_values($obj);    
$json_string = json_encode($obj);
file_put_contents('database.json', $json_string);    
?>
<meta http-equiv="refresh" content="3;url=./ManageUsers.php" />