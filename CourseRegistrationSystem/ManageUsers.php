<script>
function CheckForm(){

  if(confirm("確認要送出本表單嗎？")==true)   

    return true;

  else 
    return false;

}   	
</script>
<style>
select{
	width:100;
}
</style>

<?php
if($_COOKIE['login']!='ture'){
	echo '<script>	document.cookie = "name=";document.cookie="competence=";document.cookie="expires=";</script>';
	echo '無法認證您已登入,請重新登入<meta http-equiv="refresh" content="3;url=./login.html" />';
	die();
}else{
	$competence = (int)$_COOKIE['competence'];
	if($competence >= 1137){
		HTML();
		die();
	}
	echo '<body onload="javascript:history.go(-1)"></body>';
}
function HTML(){
	$HTML = '<div id="reg-none">
			<form action="./register.php" method="POST">
				<input type="account" name="username" placeholder="使用者名稱啦w"/>
				<input type="password" name="password" placeholder="我就不遮密碼,反正是測試用" />
				<select name="competence">
					<option value="50">學生</option>
					<option value="0">醜屁小孩</option>
					<option value="150">老師</option>
					<option value="200">tester</option>
					<option value="1137">admin</option>
					<option value="9999">super administrator</option>
					<option value="10000">Hacker</option>
				</select>
			<input type="submit" value="添加" />
			</form></div><br/>';
		echo $HTML;
		
		echo '<form action="./del-test.php" method="POST"><select name="username"><option></option>';
		$json = file_get_contents('database.json');
		$obj=json_decode($json);
		foreach($obj as $data){
			$cookieCompetence = (int)$_COOKIE['competence'];
			$dataCompetence = (int)$data->competence;
			if($cookieCompetence>$dataCompetence){
				echo '<option value="'.$data->name.'">'.$data->name.'</option>';
			}
		}
		echo '</select><input type="submit" value="刪除" onclick="CheckForm()"/>';
		echo '</form>';
		
		
		
		echo '<a href="javascript:history.go(-1)">返回</a>';

}

?>