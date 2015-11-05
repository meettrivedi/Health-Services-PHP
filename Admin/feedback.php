<?php
if (!isset($_SESSION)) 
{
  session_start();
  
}
if($_SESSION['Name']!="") {
	include "../db.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../favicon.ico" />

<title>Health Service</title>
</head>

<body>
<div id="container">
	<?php
		include "Header.php";
		?>
	<div id="content">
		<p>&nbsp;&nbsp;&nbsp;&nbsp;</p>
			<h1>&nbsp;&nbsp;&nbsp;&nbsp;
			<center>
<?php


$sql="select * from doctor_table";
$result=mysql_query($sql);
echo "<table border='1'>";
echo "<tr><td>Name</td><td>Bad</td><td>Good</td><td>Normal</td></tr>";
while($rows=mysql_fetch_array($result))
{
	$sql1="select fb, count(*) as total from feedback where doctor_id='".$rows['doctor_id']."' group by fb";
	$result1=mysql_query($sql1);
	
	echo "<tr>";
	echo "<td><b>".$rows['doctor_name']."</b></td>";
	
	
	
	while($rows1=mysql_fetch_assoc($result1))
	{
		
		
		
		echo "<td>".$rows1['total']."</td>";
		
		
		}
		echo "</tr>";
	}
	echo "</table>";
	echo "</center>";
	echo "<br><br>";
}
?>

</h1>
</div>
</div>
</body>
</html>
