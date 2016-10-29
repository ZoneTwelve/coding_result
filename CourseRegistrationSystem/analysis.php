<?php
$list = './data'.$_COOKIE['name'].'_delList.json';
$course = $_POST['course'];
echo '<p>資料形態：'.$course.'</p>';
echo ' <p>字串長度：'.strlen($course).'</p>';
$dataArray = array();
$period = "";
$week = "";
$i=0;
while($i<strlen($course)){
	if($i==0){
		$myCourse = $course["$i"];
		echo $myCourse.'<br/>';
		$i++;
	}
	if($course["$i"]!='-'){
		$period = $course["$i"];	
		echo $course["$i"].'節<br/>';
		array_push($dataArray,array('period'=>$period,'week'=>$week));
		searchCourse($period,$week);
	}else{
		$i++;
		$week = $course["$i"];	
		echo '<br/>第'.$course["$i"].'週<br/>';
	}
	$i++;
}
echo json_encode($dataArray);
echo '<p>－－－－－－－－－－－－－－－－－－－－－－－－－－－</p>';
$i=0;
while($i<strlen($course)){
	if($i==0){
		$myCourse = $course["$i"];
		echo $myCourse.'<br/>';
		switch($myCourse){
			case 'C':$myCourse='國文';
			break;
			case 'E':$myCourse='英文';
			break;
			case 'M':$myCourse='數學';
			break;
			case 'S':$myCourse='社會';
			break;
			case 'N':$myCourse='自然';
			break;
		}
		$i++;
	}
	if($course["$i"]!='-'){
		$period = $course["$i"];	
		//echo $course["$i"].'節<br/>';
		array_push($dataArray,array('period'=>$period,'week'=>$week));
		writeCourse($period,$week,$myCourse);
	}else{
		$i++;
		$week = $course["$i"];	
		//echo '<br/>第'.$course["$i"].'週<br/>';
	}
	$i++;
}

/*
$periodData = array();
$weekData = array();
$i=0;$haveweek=0;$haveperiod=0;
while($i<strlen($course)){
	if($course["$i"]!='-'){
		$haveperiod++;
		array_push($periodData,$course["$i"]);
		echo '<br/>第'.$course["$i"].'節';
	}else{
		array_push($periodData,$course["$i"]);
		$i++;
		$haveweek++;
		array_push($weekData,$course["$i"]);
		echo '<br/>這是第'.$course["$i"].'週';
	}
	$i++;
}
echo '<p>總共有 '.$haveweek.' 週</p>';
echo '<p>總共有 '.$haveperiod.' 節</p>';
print_r ($periodData);
print_r ($weekData);
echo '<p>陣列長度：'.count($periodData).'</p>';
$json = file_get_contents('./data/exp.json');
$obj=json_decode($json);
$peri=0;$weeki=-1;
echo '<p>－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－</p>';
/* */
//searchCourse(0,0);
function searchCourse($period,$week){
	$period = (int)$period-1;
	$dataFile = './data/'.$_COOKIE['name'].'.json';
	$json = file_get_contents($dataFile);
	$obj=json_decode($json);
	foreach($obj as $data){
		if($period == $data->period){
			//echo '<p>找到第'.$period.'節</p>';
			//echo '<p>週一到週五'.$data->one,$data->two,$data->three,$data->four,$data->five.'</p>';
			
			switch ($week){
				case 1:if($data->one!=''){leave();echo '課程有重疊QwQ,不可選這門課|週'.$week.'的第'.$period.'節';die();}
				break;
				case 2:if($data->two!=''){leave();echo '課程有重疊QwQ,不可選這門課|週'.$week.'的第'.$period.'節';die();}
				break;
				case 3:if($data->three!=''){leave();echo '課程有重疊QwQ,不可選這門課|週'.$week.'的第'.$period.'節';die();}
				break;
				case 4:if($data->four!=''){leave();echo '課程有重疊QwQ,不可選這門課|週'.$week.'的第'.$period.'節';die();}
				break;
				case 5:if($data->five!=''){leave();echo '課程有重疊QwQ,不可選這門課|週'.$week.'的第'.$period.'節';die();}
				break;
			}
			/* */
		}
	}
}
function writeCourse($period,$week,$myCourse){
	$i=0;
	$unit = array();
	$period = (int)$period-1;
	$dataFile = './data/'.$_COOKIE['name'].'.json';
	$json = file_get_contents($dataFile);
	$obj=json_decode($json);
	foreach($obj as $data){
		if($data->period==$period){
			$one=$data->one;$two=$data->two;$three=$data->three;$four=$data->four;$five=$data->five;
			switch($week){
				case 1:
				if($data->one==""){$one=$myCourse;}
				continue;
				
				case 2:
				if($data->two==""){$two=$myCourse;}
				continue;
				
				case 3:
				if($data->three==""){$three=$myCourse;}
				continue;
				
				case 4:
				if($data->four==""){$four=$myCourse;}
				continue;
				
				case 5:
				if($data->five==""){$five=$myCourse;}
				continue;
			
			}
			$unit["$i"] = array('period'=>"$data->period",'one'=>"$one",'two'=>"$two",'three'=>"$three",'four'=>"$four",'five'=>"$five");
		}else{
			$unit["$i"] = array('period'=>"$data->period",'one'=>"$data->one",'two'=>"$data->two",'three'=>"$data->three",'four'=>"$data->four",'five'=>"$data->five");
		}
		$i++;
	}
	$json_string = json_encode($unit);
	file_put_contents($dataFile, $json_string);
	
}
function leave(){
	echo 'yes (o wo)';
	echo '<meta http-equiv="refresh" content="1;url=./Elective_NEW.php" />';
}
leave();
?>
