<?php  

if (!isset($_SESSION)) 
{
  session_start();
  
}
if($_SESSION['ID']!="") {
//connect to the database 
//select the table 
include "../db.php";

$sql="select * from appscheduler_bookings where student_id='".$_SESSION['ID']."' ORDER BY appointment_d ASC";
//echo $sql;
$result=mysql_query($sql);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../favicon.ico" />
<title>Health Centre</title> 
</head> 
<body> 
<div id="container">
	<?php
		include "Header.php";
		?>
	<div id="content" style="font-size:130%;">
		
		<p>&nbsp;</p>
<center>
<table border="1" ><th><td><b>Date</b></td><td><b>Time</b></td><td><b>Appointment type</b></td></th>
<?php
	$i=1;
	while($row=mysql_fetch_array($result))
	{?>
		
	<tr ><td><?php 	echo $i."&nbsp;&nbsp;&nbsp;"; ?> </td>
		<td> <?php	echo $row['appointment_d']."&nbsp;&nbsp;&nbsp;"; ?></td>
		<td><?php	echo $row['appointment_t']."&nbsp;&nbsp;&nbsp;"; ?></td>
		<td><?php	echo $row['doc_type']."&nbsp;&nbsp;&nbsp;"; ?></td>
		<?php //echo "<td><a href="."attended.php?id=".$row['app_id']."> Attended</a></td>"; ?>
		</tr>
		<?php $i++;
	}

?>
</table>
<br><br><br><br>
</center>
</div>
</div>
</body>
</html>
<?php
} else {
$logoutGoTo = "../index.php";
header("Location: $logoutGoTo");
}
?>
