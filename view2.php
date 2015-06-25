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
<object id="MediaPlayer1" width="150" height="170"
classid="CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95"
codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701"
standby="Loading Microsoft® Windows® Media Player components..."
type="application/x-oleobject" align="middle">
<param name="FileName" value="test.avi">
<param name="ShowStatusBar" value="True">
<param name="DefaultFrame" value="mainFrame">
<param name="autostart" value="false">
<embed type="application/x-mplayer2"
pluginspage = "http://www.microsoft.com/Windows/MediaPlayer/"
src="<?php echo $vn ?>"
autostart="true"
align="middle"
width="300"
height="300"
defaultframe="rightFrame"
showstatusbar="true">
</embed>
</object>
</body> 
</html>
 
