<?php 
$con=mysql_connect('localhost','jimmy','jimmy','');
if(!$con)
echo "stop";
mysql_select_db('video');
 $video=$_GET['video'];
 echo $video;
 $q="select * from myvideo where id='$video'";
 $res=mysql_query($q,$con);
 $run=mysql_fetch_assoc($res);
 if(!$res)
 echo mysql_error();
 
 echo $run['name']."<br>";
 
 $vn=$run['name'];
 
 echo $vn;
?>
<!DOCTYPE html> 
<html> 
<body> 
<video width="320" height="240" autoplay>
  <source src="<?php echo $vn ?>" type="video/mp4">
  <source src="<?php echo $vn ?>" type="video/ogg">
  <source src="<?php echo $vn ?>" type="video/webm	">
  
Your browser does not support the video tag.
</video>
</body> 
</html>
 
