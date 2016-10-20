<?php
$data = array(); 
$data["0"] = array ("name"=>'admin',"password"=>'toor',"competence"=>'1137');   
$data["1"] = array ("name"=>'su',"password"=>'root',"competence"=>'9999');   
$data["2"] = array ("name"=>'stu1',"password"=>'A123456879',"competence"=>'50');   
$data["3"] = array ("name"=>'stu2',"password"=>'A180691837',"competence"=>'50');   
$data["4"] = array ("name"=>'teacher',"password"=>'F114002894',"competence"=>'100');   
$data["5"] = array ("name"=>'TESTER',"password"=>'PASS1234',"competence"=>'150');   
$data["6"] = array ("name"=>'fuckboy',"password"=>'fuckyou',"competence"=>'0');   
$data["7"] = array ("name"=>'hacker',"password"=>'zt1f9',"competence"=>'1000');   
$json_string = json_encode($data);
file_put_contents('database.json', $json_string);
?>