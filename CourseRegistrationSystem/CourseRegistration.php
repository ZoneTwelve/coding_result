<p style="display:inline;">註冊系統 測試版<p>
<?php
$dataFile = './data/'.$_COOKIE['name'].'.json';
$data = array(); 
//週一~週五的$i節
$periodData1='';$periodData2='';$periodData3='';$periodData4='';$periodData5='';

$i=0;//i > 資料序 , j > 第某節 
//已下執行搜索資料庫
$json = file_get_contents($dataFile);
$obj=json_decode($json);
foreach($obj as $data){
//已上執行搜索資料庫
if($_POST['period']!=$data->period&&$i<=6){
	$periodID=$data->period;
	$periodData1=$data->one;//設定週一 $j節 資料為 $data該週資料
	$periodData2=$data->two;//設定週二 $j節 資料為 $data該週資料
	$periodData3=$data->three;//設定週三 $j節 資料為 $data該週資料
	$periodData4=$data->four;//設定週四 $j節 資料為 $data該週資料
	$periodData5=$data->five;//設定週五 $j節 資料為 $data該週資料
	
	$unit["$i"] = array('period'=>"$periodID",'one'=>"$data->one",'two'=>"$data->two",'three'=>"$data->three",'four'=>"$data->four",'five'=>"$data->five");

	//echo 'debug2';
	//	$data["$i"] = array('period'=>"$periodID",'one'=>"$periodData1",'two'=>"$periodData2",'three'=>"$periodData3",'four'=>"$periodData4",'five'=>"$periodData5");
	
	
}else if($_POST['period']==$data->period&&$i<=6){

	//設置原始資料
	$periodID=$data->period;
	$periodData1=$data->one;//設定週一 $j節 資料為 $data該週資料
	$periodData2=$data->two;//設定週二 $j節 資料為 $data該週資料
	$periodData3=$data->three;//設定週三 $j節 資料為 $data該週資料
	$periodData4=$data->four;//設定週四 $j節 資料為 $data該週資料
	$periodData5=$data->five;//設定週五 $j節 資料為 $data該週資料
	
	//資料重新歸位完成,開始進行判斷 POST week為哪週資料
	switch($_POST['week']){//把 指定週 資料 作 判斷 
		//範例：case '1' == 第$i份資料 之 第$j節 的 週一

		case '1':if($data->one==""){//當資料為空,則進行寫入
					$periodData1=$_POST['course'];//週1 $i節
					echo '資料設定完成',$periodData1;
					continue;
				}else{//資料不為空時,則停止script
					error();
					//echo '資料不為空1';
					continue;
				}
		case '2':if($data->two==""){//當資料為空,則進行寫入
					$periodData2=$_POST['course'];//週2 $i節
					echo '資料設定完成',$periodData2;
					continue;
				}else{//資料不為空時,則停止script
					error();
					//echo '資料不為空2';
					continue;
				}
		case '3':if($data->three==""){//當資料為空,則進行寫入
					$periodData3=$_POST['course'];//週3 $i節
					//echo '資料設定完成',$periodData3;
					continue;
				}else{//資料不為空時,則停止script
					error();
					//echo '資料不為空3';
					continue;
				}
		case '4':if($data->four==""){//當資料為空,則進行寫入
					$periodData4=$_POST['course'];//週4 $i節
					echo '資料設定完成',$periodData4;
					continue;
				}else{//資料不為空時,則停止script
					error();
					//echo '資料不為空4';
					continue;
				}
		case '5':if($data->five==""){//當資料為空,則進行寫入
					$periodData5=$_POST['course'];//週5 $i節
					echo '資料設定完成',$periodData5;
					continue;
				}else{//資料不為空時,則停止script
					error();
					//echo '資料不為空5';
					continue;
				}
	}//設置結束
	$unit["$i"] = array(
	'period'=>"$periodID",
	'one'=>"$periodData1",
	'two'=>"$periodData2",
	'three'=>"$periodData3",
	'four'=>"$periodData4",
	'five'=>"$periodData5");	
}else{
	echo '跳過';
}
//echo "i=$i <br/>";
$i++;
//echo "i+1=$i <br/>";

}
function error(){
	echo '<p>資料已存在,請先刪除再重新添加.</p>';
}
$json_string = json_encode($unit);
file_put_contents($dataFile, $json_string);
echo '<meta http-equiv="refresh" content="2;url=./Elective.php" />';
?>