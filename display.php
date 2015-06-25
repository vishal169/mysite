<?php
$con=mysql_connect('localhost','jimmy','jimmy','');
if(!$con)
echo "stop";
mysql_select_db('video');

$id=$_GET['id'];
echo $id;
$q="select * from myvideo where id='$id'";
$res=mysql_query($q,$con);
$run=mysql_fetch_assoc($res);
echo $id;
echo $run['name']."<br>";
$im=$run['pic'];
header("content-type:image/png");
echo $im;

?>
