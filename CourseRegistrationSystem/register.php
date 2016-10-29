<?php
if(preg_match('/\<|\>|\"|\'/',$_POST['username'])){
	echo '禁止使用這類特殊字元<meta http-equiv="refresh" content="3;url=./ManageUsers.php" />';
	die();
}
$competence = (int)$_COOKIE['competence'];
if($competence>=1137){
	$dataFile = 'database.json';
	if(file_exists($dataFile) == false){
		$data = array(); 
		$handle = fopen($dataFile,"rb");
		$content = "";
		$data = json_decode(fread($handle, 10000));
		file_put_contents($dataFile, $json_string);
		if($_POST['username']!=''){
			$data["0"] = array ("name"=>$_POST['username']);   
		}
		$json_string = json_encode($data);
		file_put_contents($dataFile, $json_string);
	}else{
		$json = file_get_contents('database.json');
		$obj=json_decode($json);
		foreach($obj as $data) {
			if($_POST['username'] ==$data->name){
				echo '帳號重複<meta http-equiv="refresh" content="3;url=./ManageUsers.php" />';
				die();
			}
		}

		if($_POST['username']!=''&&$_POST['password']!=''){
			if($_POST['competence']<$competence){
				$handle = fopen($dataFile,"rb");
				$content = "";
				$data = json_decode(fread($handle, 10000));
				array_push($data, array("name"=>$_POST['username'],"password"=>$_POST['password'],"competence"=>$_POST['competence']));
										
				echo '<p>添加成功,名稱為:<b>'.$_POST['username'].'</b></p><meta http-equiv="refresh" content="3;url=./ManageUsers.php" />';
				$json_string = json_encode($data);
				file_put_contents($dataFile, $json_string);
			}else{
				echo '不得建立權限大於等於您的帳戶<meta http-equiv="refresh" content="2;url=./ManageUsers.php" />';
			}
		}else{
			echo '資料不得為空<meta http-equiv="refresh" content="3;url=./ManageUsers.php" />';
		}

	}
}else{
	echo 'error';
}
?>