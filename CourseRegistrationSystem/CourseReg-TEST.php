<p style="display:inline;">TEST<p>
<?php
$dataFile = './data/'.$_COOKIE['name'].'.json';
//週一~週五的$i節
$periodData1='';$periodData2='';$periodData3='';$periodData4='';$periodData5='';

$i=0;//i > 資料序 , j > 第某節 
//已下執行搜索資料庫
$unit = array(); 
$one="";$two="";$three="";$four="";$five="";
$json = file_get_contents($dataFile);
$obj=json_decode($json);
foreach($obj as $data){
	if($data->period==$_POST['period']){
		switch($_POST['week']){
			case '1':if($data->one==""){$one=$_POST['course'];continue;}
			else{echo '資料已存在';continue;}
			
			case '2':if($data->two==""){$two=$_POST['course'];continue;}
			else{echo '資料已存在';continue;}
			
			case '3':if($data->three==""){$three=$_POST['course'];continue;}
			else{echo '資料已存在';continue;}
			
			case '4':if($data->four==""){$four=$_POST['course'];continue;}
			else{echo '資料已存在';continue;}
			
			case '5':if($data->five==""){$five=$_POST['course'];continue;}
			else{echo '資料已存在';continue;}
			
		}
		$unit["$i"] = array('period'=>"$data->period",'one'=>"$one",'two'=>"$two",'three'=>"$three",'four'=>"$four",'five'=>"$five");
	}else{
		$unit["$i"] = array('period'=>"$data->period",'one'=>"$data->one",'two'=>"$data->two",'three'=>"$data->three",'four'=>"$data->four",'five'=>"$data->five");
	}
	$i++;
}
$json_string = json_encode($unit);
file_put_contents($dataFile, $json_string);
?>