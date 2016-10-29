<?php
$myArray = array();
$myArray[0] = array("data"=>"hacker");
$myArray[1] = array("data"=>"cracker");
$myArray[2] = array("data"=>"user");

ECHO array_search("data",$myArray);


$a=array("a"=>"red","b"=>"green","c"=>"blue");
echo array_search("a",$a);



/*
$array = array();
$array[0] = array('data'=>1);
$array[1] = array('data'=>2);
foreach ($array as $value) {
    print $value;
}
/* */
/*
$Arr = array();
$Arr[0]=array( "apple"=>'2' , "banana"=>0 , "hacker"=>'1' );
$Arr[1]=array( "apple"=>'2' , "banana"=>0 , "hacker"=>'1' );
foreach ($Arr as $value ){
	ECHO 'value='.$value.'<br>';
}
/* */

?>
