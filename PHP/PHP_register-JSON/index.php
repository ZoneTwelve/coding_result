<?php
echo '<pre id="clear">';
$_POST['username'] = str_replace("<","&lt",$_POST['username']);
echo '</pre>';
if(file_exists("./userdb.json") == false){
	$data = array(); 
	file_put_contents('userdb.json', $json_string);
	if($_POST['username']!=''){
		$data["0"] = array ("name"=>$_POST['username']);   
	}
	$json_string = json_encode($data);
	file_put_contents('userdb.json', $json_string);
	header('Location: '.basename(__FILE__)); 
}else{
	echo '<div id="base"><form action="./'.basename(__FILE__).'" method="post" enctype="multipart/form-data"><input type="text" name="username" placeholder="您的名稱"><br/><input type="submit" value="Send"></form>';
	$handle = fopen("./userdb.json","rb");
	$content = "";
	$data = json_decode(fread($handle, 10000));
	//array_push($data, array("i_have_an_apple"=>"i_have_a_pen"),"pen","pineapple", '"apple":"pen"');
	echo "<pre id='clear'>";
	array_push($data, array("name"=>$_POST['username']));
	if($_POST['username']!=''){
		echo '</pre><p>註冊成功,名稱為:<b>'.$_POST['username'].'</b></p><pre>';
		$json_string = json_encode($data);
		file_put_contents('userdb.json', $json_string);
	}
	echo 
	'</pre><br/><a href="read.php">!!!!!!!!!!!!!!!!!!!!滾開我要看資料!!!!!!!!!!!!!!!!!!!!</a><br/><br/><a href="reset.php">reset</a></div>';
	/*
	print_r($data);
	print_r(json_encode($data));
	echo $json_string;
	/* */
}
?>
<style>
input{
	width:50vw;
	height:30px;
}a,p{
	//color:white;
}
body{
	width:100vw;
	font-size:1.2em;
	margin:auto;
	text-align:center;
	//background-color:black;
}#base{
	position:relative;
	top:20%;
}
#clear{
	display:none;
}
</style>
