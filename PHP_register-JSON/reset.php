<?php
$data = array();   
$data["0"] = array ("name"=>"Me", "tel"=>"0912345678", "address"=> "新北");   
$data["1"] = array ("name"=>"Myself", "tel"=>"0987654321", "address"=> "聖荷西"); 
$json_string = json_encode($data);
file_put_contents('userdb.json', $json_string);
echo $json_string;
header('Location: ./'); 
?>
