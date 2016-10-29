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
}#clear{
	display:none;
}
</style>
<br/><p><h1 style="display:inline;">選課系統顯示測試  <a href="./testsearch.php">返回</a></h1></p>

<?php
$link = './data/admin.json';
echo '<table><tr><td><b>節數</b></td>
<td><b>週一</b></td>
<td><b>週二</b></td><td><b>週三</b></td><td><b>週四</b></td><td><b>週五<b></td></tr>';
$i=1;
$json = file_get_contents($link);
$obj=json_decode($json);
print_r($obj);
foreach($obj as $data){
	echo '<tr><td><b>第'.$i.'節</b></td>
    <td id="11">'.$data->one.'</td>
    <td id="21">'.$data->two.'</td>
    <td id="31">'.$data->three.'</td>
    <td id="41">'.$data->four.'</td>
    <td id="51">'.$data->five.'</td></tr>';	
	$i++;
}
echo '</table>';

?>