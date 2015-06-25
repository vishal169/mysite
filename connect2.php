<?php
$con=mysql_connect('localhost','jimmy','jimmy','');
if(!$con)
echo "stop";
mysql_select_db('video');
$fn=$_POST['s1'];
$ln=$_POST['s2'];
$sex=$_POST['s3'];
$college=$_POST['s4'];
$pass=$_POST['s5'];
$mail=$_POST['mail'];

$q="insert into login (first,last,sex,collage,password,mail) values('$fn','$ln','$sex','$college','$pass','$mail')";
$res=mysql_query($q,$con);

$q="insert into signin (username,password) values('$fn','$pass')";
$res=mysql_query($q,$con);
 header('location:first_page.php');

?>