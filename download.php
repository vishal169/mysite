<?php 
session_start();
if(isset($_SESSION['name'])){
$vn=$_SESSION['vn'];
$size=filesize($vn);
header('Content-Type:application/octet-stream');
header('Content-Description:File Transfer');
//header('Content-Type: video/mp4');
header('Content-Disposition:attachment;filename="'.$vn.'"');
header('Content-Length:'.$size);

$file=fopen($vn,'rb');

while(!feof($file)){
echo fread($file,256);
}
fclose($file);
}
else {
echo "dfsaf";
}
?>
