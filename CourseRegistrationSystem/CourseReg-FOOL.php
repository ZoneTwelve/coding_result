<p style="display:inline;">FOOL<p>
<?php
$dataFile = './data/'.$_COOKIE['name'].'.json';
//週一~週五的$i節
$periodData1='';$periodData2='';$periodData3='';$periodData4='';$periodData5='';

$i=0;//i > 資料序 , j > 第某節 
//已下執行搜索資料庫
$data = array(); 
$one="";$two="";$three="";$four="";$five="";
$json = file_get_contents($dataFile);
$obj=json_decode($json);
foreach($obj as $data){
	if($data->period==0){
		if($_POST['period']==0){
			echo '0';
			/*
			if($_POST['week']==1){}
			if($_POST['week']==2){}
			if($_POST['week']==3){}
			if($_POST['week']==4){}
			if($_POST['week']==5){}
			/* */
			
			switch($_POST['week']){
			case '1':$one=$_POST['course'];continue;
			case '2':$two=$_POST['course'];continue;
			case '3':$three=$_POST['course'];continue;
			case '4':$four=$_POST['course'];continue;
			case '5':$five=$_POST['course'];continue;
			}
			$data1 = '"period"=>"$data->period","one"=>"$one","two"=>"$two","three"=>"$three","four"=>"$four","five"=>"$five"';
		}else{
			$data[0] = array('period'=>$data->period,'one'=>$data->one,'two'=>$data->two,'three'=>$data->three,'four'=>$data->four,'five'=>$data->five);
		}
	}
}	
$data[0] = array($data1)
echo $data[0];
//$json_string = json_encode($data);
//file_put_contents($dataFile, $json_string);
?>