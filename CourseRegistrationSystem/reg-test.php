此處皆生成權限1137用戶
<?php
$data = array(); 
$data = array ("name"=>$_POST['username'],"password"=>$_POST['password'],"competence"=>'1137'); 
$json_string = json_encode($data);
file_put_contents('database.json', $json_string);
echo '成功添加';
?>