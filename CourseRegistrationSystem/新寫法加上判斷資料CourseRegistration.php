<p style="display:inline;">選課系統 - on<p>
<?php
$dataFile = './data/'.$_COOKIE['name'].'.json';

//週一~週五的$i節 防Error
$periodData1='';$periodData2='';$periodData3='';$periodData4='';$periodData5='';

$i=0;$j=1;//i > 資料序 , j > 第某節
 
if(file_exists($dataFile) == false){//資料不存在時,寫入空資料
	$data = array(); 
	$data[0] = array('period'=>'0','one'=>"",'two'=>"",'three'=>"",'four'=>"",'five'=>"");
	$data[1] = array('period'=>'1','one'=>"",'two'=>"",'three'=>"",'four'=>"",'five'=>"");
	$data[2] = array('period'=>'2','one'=>"",'two'=>"",'three'=>"",'four'=>"",'five'=>"");
	$data[3] = array('period'=>'3','one'=>"",'two'=>"",'three'=>"",'four'=>"",'five'=>"");
	$data[4] = array('period'=>'4','one'=>"",'two'=>"",'three'=>"",'four'=>"",'five'=>"");
	$data[5] = array('period'=>'5','one'=>"",'two'=>"",'three'=>"",'four'=>"",'five'=>"");
	$json_string = json_encode($data);
	file_put_contents($dataFile, $json_string);
	echo '您的資料表已經建立,若您剛剛送出資料,請重新送出一次,Thank you love you<br/>稍後將跳轉回上一頁';//記得設定返回
	
}else{//若資料表存在,則進行寫入新資料表.
	//已下執行搜索資料庫
	$json = file_get_contents($dataFile);
	$obj=json_decode($json);
	foreach($obj as $data){
	//已上執行搜索資料庫
	if($_POST['period']!=$data->period&&$i<=6){
		$periodData1=$data->one;//設定週一 $j節 資料為 $data該週資料
		$periodData2=$data->two;//設定週二 $j節 資料為 $data該週資料
		$periodData3=$data->three;//設定週三 $j節 資料為 $data該週資料
		$periodData4=$data->four;//設定週四 $j節 資料為 $data該週資料
		$periodData5=$data->five;//設定週五 $j節 資料為 $data該週資料
		$data[$i] = array('period'=>$j,
							'one'=>$periodData1,//週一
							'two'=>$periodData2,
							'three'=>$periodData3,
							'four'=>$periodData4,
							'five'=>$periodData5);//週五
		$i++;$j++;
	}else if($_POST['period']==$data->period&&$i<=6){
		//設置原始資料
		$periodData1=$data->one;//設定週一 $j節 資料為 $data該週資料
		$periodData2=$data->two;//設定週二 $j節 資料為 $data該週資料
		$periodData3=$data->three;//設定週三 $j節 資料為 $data該週資料
		$periodData4=$data->four;//設定週四 $j節 資料為 $data該週資料
		$periodData5=$data->five;//設定週五 $j節 資料為 $data該週資料
		
		//資料重新歸位完成,開始進行判斷 POST week為哪週資料
		switch($_POST['week']){//把 指定週 資料 作 判斷 
			//範例：case '1' == 第$i份資料 之 第$j節 的 週一

			case '1':if($data->period==""){//當資料為空,則進行寫入
						$periodData1=$_POST['course'];break;//週1 $i節
					}else{//資料不為空時,則停止script
						echo '資料已存在,若想進行修改請優先刪除資料';//記得返回上一頁或選課頁,不然我打爆未來的你 love you (o wo)
						die();
					}
			case '2':if($data->period==""){//當資料為空,則進行寫入
						$periodData2=$_POST['course'];break;//週2 $i節
					}else{//資料不為空時,則停止script
						echo '資料已存在,若想進行修改請優先刪除資料';//記得返回上一頁或選課頁,不然我打爆未來的你 love you (o wo)
						die();
					}
			case '3':if($data->period==""){//當資料為空,則進行寫入
						$periodData3=$_POST['course'];break;//週3 $i節
					}else{//資料不為空時,則停止script
						echo '資料已存在,若想進行修改請優先刪除資料';//記得返回上一頁或選課頁,不然我打爆未來的你 love you (o wo)
						die();
					}
			case '4':if($data->period==""){//當資料為空,則進行寫入
						$periodData4=$_POST['course'];break;//週4 $i節
					}else{//資料不為空時,則停止script
						echo '資料已存在,若想進行修改請優先刪除資料';//記得返回上一頁或選課頁,不然我打爆未來的你 love you (o wo)
						die();
					}
			case '5':if($data->period==""){//當資料為空,則進行寫入
						$periodData5=$_POST['course'];
						break;//週5 $i節
					}else{//資料不為空時,則停止script
						echo '資料已存在,若想進行修改請優先刪除資料';//記得返回上一頁或選課頁,不然我打爆未來的你 love you (o wo)
						die();
					}
		}//設置結束
		
		//開始編寫資料
		$data[$i] = array('period'=>$j,
							'one'=>$periodData1,
							'two'=>$periodData2,
							'three'=>$periodData3,
							'four'=>$periodData4,
							'five'=>$periodData5);	
		$i++;$j++;
	}else{
		echo '寫入完成';//返回
	}//判斷式結尾


	}//搜索資料庫的結尾
}
?>