<?php

// get the q parameter from URL
$q=$_REQUEST["q"]; $hint="";
$con=mysql_connect('localhost','jimmy','jimmy','');
if(!$con)
echo "stop";
mysql_select_db('video');
if ($q !== "") {
 $query="select * from login where first='$q'";
 $res=mysql_query($query,$con);
 if($res!=0)
$hint="handle already exits select new";

}

// Output "no suggestion" if no hint was found
// or output the correct values 
echo $hint==="" ? "" : $hint;
?>