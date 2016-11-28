<?php
$updir = './files';
$upfiles = $updir.basename($_FILES['upfile']['name']);
if (move_uploaded_file($_FILES['upfile']['tmp_name'], $upfiles)) {
 echo "document.location.href=./update.html;<h1>上傳成功 \n";
} else {
 echo "document.location.href="./update.html";<h1>上傳失敗 \n";
}
print_r($_FILES);
?>
