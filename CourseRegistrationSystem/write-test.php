<?php
$dataFile = './data/usertest.json';
$i=1;
if(file_exists($dataFile) == false){
	$data = array(); 
/*	for($i=0;$<=6;$i++){
		$data[$i] = array('period'=>$j,'one'=>"",'two'=>"",'three'=>"",'four'=>"",'five'=>"");
		$j++;
	}
	for($i=0;$i<=6;$i++){
		echo $i;
		eval('$data['$i.'] = array("eriod"=>'.$j.',"one"=>"","two"=>"","three"=>"","four"=>"","five"=>"");');
	}*/
//'$data['$i.'] = array("eriod"=>'.$j.',"one"=>"","two"=>"","three"=>"","four"=>"","five"=>"");'
/*
	$data["$i"] = array('period'=>'0','one'=>"$i",'two'=>"",'three'=>"",'four'=>"",'five'=>"");
	$data["$i"] = array('period'=>'1','one'=>"",'two'=>"$i",'three'=>"",'four'=>"",'five'=>"");
	$data["$i"] = array('period'=>'2','one'=>"",'two'=>"",'three'=>"$i",'four'=>"",'five'=>"");
	$data["$i"] = array('period'=>'3','one'=>"",'two'=>"",'three'=>"",'four'=>"$i",'five'=>"");
	$data["$i"] = array('period'=>'4','one'=>"",'two'=>"",'three'=>"",'four'=>"",'five'=>"$i");
	$data["$i"] = array('period'=>"$i",'one'=>"",'two'=>"",'three'=>"",'four'=>"",'five'=>"");
	*/
	for($i=0;$i<=6;$i++){
		$data["$i"] = array('period'=>'0','one'=>"$i",'two'=>"",'three'=>"",'four'=>"",'five'=>"");
	}
	$json_string = json_encode($data);
	file_put_contents($dataFile, $json_string);
}
?>