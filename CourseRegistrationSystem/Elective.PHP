<style>
tr td{
	margin:auto;
	text-align:center;
    border-width:5px;	
    border-style:ridge;
	margin:0;
	padding:25;
}</style>
<p style="display:inline;">選課系統測試中...CourseRegistration.php<p>
<form action="CourseRegistration.php" method="POST">
	<select name="week" id="week">
		<option value=""></option>
		<option value="1">週一</option>
		<option value="2">週二</option>
		<option value="3">週三</option>
		<option value="4">週四</option>
		<option value="5">週五</option>
	</select>
	<select name="period" id="period">
		<option value=""></option>
		<option value="0">第一節</option>
		<option value="1">第二節</option>
		<option value="2">第三節</option>
		<option value="3">第四節</option>
		<option value="4">第五節</option>
		<option value="5">第六節</option>
		<option value="6">第七節</option>
	</select>
	<select name="course" id="course">
		<option value="OwO">偷懶XD</option>
		<option value=""></option>
		<option value="國文">國文</option>
		<option value="英文">英文</option>
		<option value="數學">數學</option>
		<option value="社會">社會</option>
		<option value="自然">自然</option>
	</select>
	<input type="submit" />
</form>
<form action="CourseDelete.php" method="POST">
	<select name="week" id="week">
		<option value="">請選擇要刪除的資料</option>
		<option value="1">週一</option>
		<option value="2">週二</option>
		<option value="3">週三</option>
		<option value="4">週四</option>
		<option value="5">週五</option>
	</select>
	<select name="period" id="period">
		<option value="">請選擇要刪除的資料</option>
		<option value="0">第一節</option>
		<option value="1">第二節</option>
		<option value="2">第三節</option>
		<option value="3">第四節</option>
		<option value="4">第五節</option>
		<option value="5">第六節</option>
		<option value="6">第七節</option>
	</select>
	<input type="hidden" name="course" value=""/>
	<input type="submit" />
</form>
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