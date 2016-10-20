<?php
    header("Content-Type:text/html; charset=utf-8");
   
    echo "<p><b>刪除陣列元素的問題，並重新排列陣列順序 Example</b></p>";
   
    $test_array = array('A1'=>'a','B2'=>'b','C3'=>'c','D4'=>'d','E5'=>'e'); //預設陣列
   
    //----------我是分隔線----------
   
    echo "<p>Step1.</p>";
    foreach($test_array as $key => $value){
        echo '陣列順序'.$key.'：=>'.$value.'<br />';
    }
    print_r($test_array);
    echo '<hr />';
   
    //----------我是分隔線----------
   
    echo "<p>Step2.</p>";
    echo "<p>刪掉陣列裡的D4</p>";
    foreach($test_array as $key => $value){
      if($value == 'd'){
         unset($test_array[$key]);
      }
    }
   
    foreach($test_array as $key => $value){
        echo '陣列順序'.$key.'：=>'.$value.'<br />';
    }
    print_r($test_array);
    echo "<p>可以注意到順序剩下0、1、2、4</p>";
    echo '<hr />';
   
    //----------我是分隔線----------
   
    echo "<p>Step3.</p>";
    echo "<p>若要把順序重新調整需使用到array_values()</p>";
    $test_array=array_values($test_array);
    foreach($test_array as $key => $value){
        echo '陣列順序'.$key.'：=>'.$value.'<br />';
    }
    print_r($test_array);
    echo "<p>可以注意到順序已重新排列為0、1、2、3</p>";
?>