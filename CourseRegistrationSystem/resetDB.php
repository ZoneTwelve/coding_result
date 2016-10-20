<?php
$data = array(); 
$data["0"] = array ("name"=>'admin',"password"=>'toor',"competence"=>'1137');   
$data["1"] = array ("name"=>'stu1',"password"=>'A123456879',"competence"=>'1');   
$data["2"] = array ("name"=>'stu2',"password"=>'A180691837',"competence"=>'1');   
$json_string = json_encode($data);
file_put_contents('database.json', $json_string);
?>