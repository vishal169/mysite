<?php
$q = ($_GET['q']);

$con=mysql_connect('localhost','jimmy','jimmy','');
if(!$con)
echo "stop";
mysql_select_db('video');

$sql="SELECT * FROM login WHERE first='$q'";

$result=mysql_query($sql,$con);

echo "<table border='1'>
<tr>
<th>Employee first Name</th>
<th>Employee last Name</th>
<th>E mail</th>
</tr>";

if($row = mysql_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['first'] . "</td>";
 echo "<td>" . $row['last'] . "</td>";
  echo "<td>" . $row['mail'] . "</td>";
  echo "</tr>";
}
echo "</table>";

session_start();
$_SESSION['ename']=$row['first'];
$_SESSION['gmail']=$row['mail'];

//echo $_SESSION['username'];
//echo $_SESSION['email'];

mysql_close($con);
?>