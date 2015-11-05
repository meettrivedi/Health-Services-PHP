<?php  

if (!isset($_SESSION)) 
{
  session_start();
  
}
if($_SESSION['Name']!="") {
//connect to the database 
include "../db.php"; //select the table 

$sql="select * from appscheduler_bookings where appointment_d='".date("Y-m-d")."'";
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
<table border="1" ><th><td><b>Name</b></td><td><b>Time</b></td><td><b>Appointment type</b></td><td><b>Confirm</b></td><td><b>Attended?</b></td></th>
<?php
	$i=1;
	while($row=mysql_fetch_array($result))
	{?>
		
	<tr ><td><?php 	echo $i."&nbsp;&nbsp;&nbsp;"; ?> </td>
		<td> <?php	echo $row['student_name']."&nbsp;&nbsp;&nbsp;"; ?></td>
		<td><?php	echo $row['appointment_t']."&nbsp;&nbsp;&nbsp;"; ?></td>
		<td><?php	echo $row['doc_type']."&nbsp;&nbsp;&nbsp;"; ?></td>
		<?php echo "<td><a href="."attended.php?id=".$row['app_id']."> Attended</a></td>"; ?>
		<td><?php	echo $row['Attended']."&nbsp;&nbsp;&nbsp;"; ?></td>
		</tr>
		<?php $i++;
	}
}
?>
</table>
<br><br><br><br>
</center>
</div>
</div>
</body>
</html>
