<?php
$json = file_get_contents('database.json');
$obj=json_decode($json);
foreach ( $obj as $unit ){
	if($unit->name===$_POST['account']&&$unit->password===$_POST['password']){
		echo '歡迎回來<p>',$unit->name,"</p><br/>３秒後將跳轉至使用者頁(cookie)";
		echo '<script>
			expire_days = 1;
			var d = new Date();
			d.setTime(d.getTime() + (expire_days * 24 * 60 * 60 * 1000));
			document.cookie = "name="+"'.$unit->name.'"+";"
			document.cookie="competence="+"'.$unit->competence.'";
			document.cookie="expires=" + d.toGMTString();
			</script>';
			
		echo '<meta http-equiv="refresh" content="3;url=./cookie.php"/>';
		die();
	}
}
echo '...登入失敗...<br/>３秒後回到登入頁<meta http-equiv="refresh" content="3;url=./login.html" />';
			//setcookie("name","value",time()+3600)
			//echo $_COOKIE['name'];
?>
<style>
body{
	margin:auto;
	text-align:center;
}
</style>