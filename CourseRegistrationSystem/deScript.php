<?php
	for($i=0;$i<strlen($key);$i++){
		switch((int)$key["$i"]){
			case 1:$code-=(int)$key["$i"];continue;
			case 3:$code*=(int)$key["$i"];continue;
			case 7:$code+=(int)$key["$i"];continue;
			case 2:$code-=(int)$key["$i"];continue;
			case 4:$code/=(int)$key["$i"];continue;
			case 5:$code-=(int)$key["$i"];continue;
			case 6:$code*=(int)$key["$i"];continue;
			case 8:$code+=(int)$key["$i"];continue;
			case 9:$code/=(int)$key["$i"];continue;
			default:continue;
		}
	}
	echo $code

?>