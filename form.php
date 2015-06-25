<html>
<head>
<meta charset="ISO-8859-1">


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
<script type="text/javascript">
function failValidation(msg) {
    alert(msg); // just an alert for now but you can spice this up later
    return false;
}
function validateForm() {
    var image_upload = document.forms["upload_form"]["file2"].value;
    var video_upload = document.forms["upload_form"]["file1"].value;
    //var access = document.forms["sign_form"]["access"].value;
   
     if (video_upload==null || video_upload=="") {
        alert("No video has been selected to upload");
        return false;
}
     else if (!isVideo(video_upload)) {
    	   return failValidation('You can upload only .m4v,.avi,.mpg,.mp4 files');
     }
     
     else if (image_upload==null || image_upload=="") {
        alert("No image has been selected to upload");
        return false;
}
     else if (!isImage(image_upload)) {
    	   return failValidation('You can upload only .jpg,.gif,.bmp,.png files');
    }
}  
function getExtension(filename) {
    var parts = filename.split('.');
    return parts[parts.length - 1];
}
function isImage(filename) {
    var ext = getExtension(filename);
    switch (ext.toLowerCase()) {
    case 'jpg':
    case 'gif':
    case 'bmp':
    case 'png':
        //etc
        return true;
    }
    return false;
}
function isVideo(filename) {
    var ext = getExtension(filename);
    switch (ext.toLowerCase()) {
    case 'm4v':
    case 'avi':
    case 'mpg':
    case 'mp4':
        // etc
        return true;
    }
    return false;
}

function change(){
window.location = 'view.php';
}
function change1(){
window.location = 'form.php';
}
function change2(){
window.location = 'logout.php';
}

//new serch part###################################

function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getuser.php?q="+str,true);
  
  xmlhttp.send();
}
</script>

<body>
<h2>Select users who can watch or download your video 
</h2>
<form>

<?php 
if(isset($_SESSION['name']))
{
$con=mysql_connect('localhost','jimmy','jimmy','');
if(!$con)
echo "stop";
mysql_select_db('video');

$q="select * from login";
$res=mysql_query($q,$con);

?>
<select name="users" onchange="showUser(this.value)">
<option value="">Select a person:</option>
<?php 

 while($row = mysql_fetch_array($res)) {
 echo "<option value=".$row['first'].">".$row['first']."</option>";
 } 
 ?>
</select>
</form>
<br>
<div id="txtHint"><b>Person info will be listed here.</b></div>
</script>
</body>

<form name="upload_form" action="view.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm();"><br><br><br>
<p><h3>uplaod your video</h3></p>
<input type="file" name="file1" value="video"><br>
<p><h3>uplaod a pic that describes your video</h3></p>
<input type="file" name="file2" value="image"><br><br><br><br>
<input type="submit" value="upload" >
<?php }	
else {
header('location:first_page.php');
}

?>
</form>
</html>