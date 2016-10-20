<?php
$data = array(); 
$data = array ("week"=>"@",
					"subject1"=>"11",
					"subject2"=>"22",
					"subject3"=>"33",
					"subject4"=>"44",
					"subject5"=>"55",
					"subject6"=>"66");
$json_string = json_encode($data);
file_put_contents('curriculum.json', $json_string);
?>