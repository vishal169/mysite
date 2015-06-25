<?php
$con=mysql_connect('localhost','jimmy','jimmy','');
if(!$con) 
echo "stop";
mysql_select_db('video');
$ln=$_POST['t1'];
$pass=$_POST['t2'];
$q="select * from signin where username='$ln'&& password='$pass'";
$res=mysql_query($q,$con);
if(!$res)
echo "errors".mysql_error();

if($run=mysql_fetch_assoc($res)){
$name=$run['username'];

session_start();
$_SESSION['id']=session_id();
$_SESSION['name']=$name;
header('location:view.php');
}
else{
echo "signup first ";
header('location:first_page.php');
}
//if(count($res))

echo "$ln";


?>
