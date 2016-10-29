<?php
$url = "127.0.0.1/CourseRegistrationSystem/analysis.php";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array("course"=>"C-156-413"))); 
$output = curl_exec($ch); 
curl_close($ch);
 
//echo $output;
?>