<html>
<head>
<head>

</head>
<body>
<style>
.style1 {
	font-family: "Courier New", Courier, monospace;
	font-size: large;
}
.style2 {
	color: #FFFFFF;
	font-weight: bold;
	font-size: 36px;
	font-family: "Times New Roman", Times, serif;
}
.a{
align:center;
}
div.signin{
align:right;
border:2px;
float:left;
display:inline;
}
</style>
</head>
<body >
<table bgcolor="#0033FF" width="100%" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="142" rowspan="5" valign="top"><img src="images.jpg" width="175" height="129" alt="av" /></td>
    <td width="221"></td>
    <td width="247"></td>
    <td width="238"></td>
    <td width="86"></td>
    <td width="142"></td>
  </tr>
  <tr>
    <td colspan="4" valign="top"><div align="center" class="style1"></div>
    <div align="center" class="style2">COLLEGE TUBE </div></td>
    <td colspan="4" valign="top"> <h2>Welcome <?php session_start(); echo $_SESSION['name'];?></h2></td>
  </tr>
  <tr><td>
  
<button type="button" onclick="change()">home</button></td>
<td><button type="button" onclick="change1()">upload</button></td>
<td><button type="button" onclick="change2()">logout</button></td>
</div>
</td></tr>
</table>
</body>
</html>
<?php

if(isset($_SESSION['name'])){ ?>	
<html>
<body>
<script>
function change(){
window.location = 'view.php';
}
function change1(){
window.location = 'form.php';
}
function change2(){
window.location = 'logout.php';
}
</script>
</body>
</html>
<?php 
$con=mysql_connect('localhost','jimmy','jimmy','');
if(!$con)
echo "stop";
mysql_select_db('video');
if(isset($_FILES['file1']['name'])){
$name=$_FILES['file1']['name'];
$type=$_FILES['file1']['type'];
$temp=$_FILES['file1']['tmp_name'];
$fn=$_FILES['file2']['name'];
$ftn=$_FILES['file2']['tmp_name'];
$fileinfo=pathinfo($_FILES['file2']['name']);
$fext=$fileinfo['extension'];
$random=rand();
$target_path= "../upload/";
$target_path1 =$target_path.basename( $_FILES['file1']['name']);

$target_path2 =$target_path.basename( $_FILES['file2']['name']);

$ff=fopen($ftn,'r');
$content=fread($ff,filesize($ftn));
$content=addslashes($content);
fclose($ff);
move_uploaded_file($_FILES['file1']['tmp_name'], $target_path1);
move_uploaded_file($_FILES['file2']['tmp_name'], $target_path2);

$name = addslashes($name);
$q="INSERT into myvideo(name,url,pic,ext) values('$name','$random.$type','$fn','$fext')";
$res=mysql_query($q,$con);
}
$q="select * from myvideo";
$res=mysql_query($q,$con);
?>
<body bgcolor="#CCCCCC">
<table width="546" border="0" cellpadding="0" cellspacing="0">
<?php 
while($run=mysql_fetch_assoc($res)){
$i=$run['id'];
$vn=$run['name'];
$vu=$run['url'];
$fn=$run['pic'];
?>

<tr>
<td width="224" height="91" valign="top"><a href="view1.php?video=<?php echo $i;?> "><img src="../upload/<?php echo $fn ?>" width="224" height="92"/></a> <br></td>;
</tr>
<tr>
<td width="20%" height="91" valign="top" ><a href="view1.php?video=<?php echo $i; ?>" ><?php echo $vn."<br>";?>
</td>
</tr>

</a>
</table></body>
<?php
} 
}
else{
header('location:first.html');}
?>