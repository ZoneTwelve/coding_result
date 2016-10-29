<?php
$json = file_get_contents('database.json');
$obj=json_decode($json);
foreach ( $obj as $unit ){
	if($unit->name===$_POST['account']&&$unit->password===$_POST['password']){
		$username = md5($unit->name);
		$ecCompetence = $unit->competence;
		$key = sprintf(rand(1000,99999999));
/*		for($i=0;$i<strlen($key);$i++){
			switch((int)$key["$i"]){
				case 1:$ecCompetence+=(int)$key["$i"];continue;
				case 3:$ecCompetence/=(int)$key["$i"];continue;
				case 7:$ecCompetence-=(int)$key["$i"];continue;
				case 2:$ecCompetence+=(int)$key["$i"];continue;
				case 4:$ecCompetence*=(int)$key["$i"];continue;
				case 5:$ecCompetence+=(int)$key["$i"];continue;
				case 6:$ecCompetence/=(int)$key["$i"];continue;
				case 8:$ecCompetence-=(int)$key["$i"];continue;
				case 9:$ecCompetence*=(int)$key["$i"];continue;
				default:continue;
			}
		}
	*/
		echo '<div id="not">歡迎回來<p>',$unit->name,"</p><br/>將跳轉至使用者頁,若無跳轉<a href='./cookie.php'>點此</a></div>";
		echo '<script>
			expire_days = 1;
			var d = new Date();
			d.setTime(d.getTime() + (expire_days * 24 * 60 * 60 * 1000));
			document.cookie = "name="+"'.$username.'"+";"
			document.cookie="competence="+"'.$ecCompetence.'";
			document.cookie="key=" + '.$key.';
			document.cookie="expires=" + d.toGMTString();
			</script>';
			
		echo '<meta http-equiv="refresh" content="0;url=./cookie.php"/>';
		die();
	}
}
echo '<div id="not">...登入失敗...<br/>３秒後回到登入頁</div><meta http-equiv="refresh" content="3;url=./login.html" />';
			//setcookie("name","value",time()+3600)
			//echo $_COOKIE['name'];
?>
<style>
body{
	margin:auto;
	text-align:center;
}#not{
	font-size:5vw;
	position:absolute;
	height:auto;
	width:50vw;
	top:50%;
	left:50%;
	margin-top:-100px;
	margin-left:-25vw;
	height:200px;
	max-height:200px;
}
</style>