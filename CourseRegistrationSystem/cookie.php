<script>
function logout(){
	expire_days = -1;
	var d = new Date();
	d.setTime(d.getTime() + (expire_days * 24 * 60 * 60 * 1000));
	document.cookie = "name=";
	document.cookie="competence=";
	document.cookie="expires=";
	document.cookie="login=";
	document.body.innerHTML="登出完成";
	setTimeout(done,1000);
}function done(){
	location.href="./"
}function showReg(){
	document.getElementById("reg-none").style.display="inline";
	document.getElementById("showRegButton").style.display="none";
}function closeReg(){
	document.getElementById("reg-none").style.display="none";
	document.getElementById("closeRegButton").style.display="inline";
	
}function delCookie(name){
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval=getCookie(name);
    if(cval!=null) document.cookie= name + "="+cval+";expires="+exp.toGMTString();
}

</script>
<style>
body{
	margin:auto;
	text-align:center;
}
#logout{
	position:absolute;
	top:10;
	right:10;
}
</style>
<button id="logout" onclick="logout()">Log out</button>
<div id="base1">
<?php
$competence = (int)$_COOKIE['competence'];
$json = file_get_contents('database.json');
$obj=json_decode($json);
foreach ( $obj as $data ){
	if($_COOKIE['name']==$data->name){
		echo 'UserName:<b id="name">'.$_COOKIE['name'].'</b><br/>';
		echo 'Time:<b id="expire">'.$_COOKIE['expires']."</b><br/>";
		echo 'competence:<b id="competence">'.$_COOKIE['competence']."</b>";
		if($competence >= 1137){
			echo '<p>歡迎超級管理員登入</p>';
			managementHTML();
			studentHTML();
			die();
		}else if($competence == 100){
			echo '哎唷唷唷唷,老師好<br/>我還沒準備資料給你W';
			die();
		}else if($competence >= 50){
			echo '哈哈哈,臭學生o Wo)<br/>如果你是Tester的話,就當我沒說XD';
			studentHTML();
			die();
		}else{
			echo '權限不足餒';
			echo '<br/>哈哈哈沒權限,我要把你踢走o  wo)...<meta http-equiv="refresh" content="3;url=./login.html" />';
			die();
		}	
	}
}
echo '您需要重新認證身分才可進行管理,將返回登入頁...<meta http-equiv="refresh" content="3;url=./login.html" />';
	//echo '<meta http-equiv="refresh" content="1;url='.basename(__FILE__).'"/>';
function managementHTML(){
	$adminHTML = '<br/><a href="./ManageUsers.php">管理用戶</a><br/>';
	echo $adminHTML;
}function studentHTML(){
	$studentHTML = '<br/><a href="./Elective.php">選課</a><br/>';
	echo $studentHTML;
	echo '<script>document.cookie="login=ture";</script>';	
}
?>