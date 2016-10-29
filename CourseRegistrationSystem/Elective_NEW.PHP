<style>
body,table{
	margin:auto;
	text-align:center;
	background-image: url("bg.jpg");
	background-size:cover;
	color:white;
}input{
	color:black;
}a{
	color:white;
}
tr td{
	margin:auto;
	text-align:center;
    border-width:5px;	
    border-style:ridge;
	margin:0;
	padding:25;
}#delList{
	display:none;
}
</style>
<script>
function showDelList(){
	document.getElementById("delList").style.display="inline";
	document.getElementById("showButton").href="javascript:hiddenDelList();";
	document.getElementById("showButton").innerHTML="隱藏刪除清單";
}function hiddenDelList(){
	document.getElementById("delList").style.display="none";
	document.getElementById("showButton").href="javascript:showDelList();";
	document.getElementById("showButton").innerHTML="顯示刪除清單";
}
</script>
<h1 style="display:inline;">選課系統測試中</h1>
<form action="analysis.php" method="POST">
	<select name="course" id="course">
		<option value="">此為測試列表</option>
		<option value="C-112-35">國文(一)1,2		(五)5</option>
		<option value="E-223-35">英文(二)2,3		(三)5</option>
		<option value="M-312-567">數學(三)1,2		(五)6,7</option>
		<option value="S-223-556">社會(二)2.3		(五)5,6</option>
		<option value="N-112-312">自然(一)1,2		(五)1,2</option>
	</select>
	<input type="submit" />
</form>
<button><a style="color:black;text-decoration:none;" id="showButton" href="javascript:showDelList();">顯示刪除清單</a></button>
<span id="delList">
<form action="del-analysis.php" method="POST">
	<select name="course" id="course">
		<option value="">此為測試列表</option>
		<option value="-112-35">國文(一)1,2		(五)5</option>
		<option value="-223-35">英文(二)2,3		(三)5</option>
		<option value="-312-567">數學(三)1,2		(五)6,7</option>
		<option value="-223-556">社會(二)2.3		(五)5,6</option>
		<option value="-112-312">自然(一)1,2		(五)1,2</option>
	</select>

	<input type="submit" value="刪除"/>
</form>
</span>
<h1 id="backToIndex"><a href="./">返回首頁</a></h1>


<?php
$dataFile = './data/'.$_COOKIE['name'].'.json';
if(file_exists($dataFile) == false){
	$data = array(); 
	$data[0] = array('period'=>'0','one'=>"",'two'=>"",'three'=>"",'four'=>"",'five'=>"");
	$data[1] = array('period'=>'1','one'=>"",'two'=>"",'three'=>"",'four'=>"",'five'=>"");
	$data[2] = array('period'=>'2','one'=>"",'two'=>"",'three'=>"",'four'=>"",'five'=>"");
	$data[3] = array('period'=>'3','one'=>"",'two'=>"",'three'=>"",'four'=>"",'five'=>"");
	$data[4] = array('period'=>'4','one'=>"",'two'=>"",'three'=>"",'four'=>"",'five'=>"");
	$data[5] = array('period'=>'5','one'=>"",'two'=>"",'three'=>"",'four'=>"",'five'=>"");
	$data[6] = array('period'=>'6','one'=>"",'two'=>"",'three'=>"",'four'=>"",'five'=>"");
	$json_string = json_encode($data);
	file_put_contents($dataFile, $json_string);
}
echo '<table><tr><td><b>節數</b></td>
<td><b>週一</b></td>
<td><b>週二</b></td><td><b>週三</b></td><td><b>週四</b></td><td><b>週五<b></td></tr>';
$i=1;
$json = file_get_contents($dataFile);
$obj=json_decode($json);
foreach($obj as $data){
	//echo '第',$i,'節';
	//echo '<p>週１：'.$data->one.'</p><p>週２：'.$data->two.'</p><p>週３：'.$data->three.'</p><p>週４：'.$data->four.'</p><p>週５：'.$data->five.'</p><p><hr />';
	echo '<tr><td><b>第'.$i.'節</b></td>
    <td id="11">'.$data->one.'</td>
    <td id="21">'.$data->two.'</td>
    <td id="31">'.$data->three.'</td>
    <td id="41">'.$data->four.'</td>
    <td id="51">'.$data->five.'</td></tr>';	
	$i+=1;
}
echo '</table>';

?>