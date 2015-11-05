<?php  

if (!isset($_SESSION)) 
{
  session_start();
  
}
if($_SESSION['ID']!="") {
//connect to the database 
include "../db.php";//select the table 

$sql="select * from appscheduler_bookings where appointment_d='".date("Y-m-d")."' AND doctor_id='".$_SESSION['ID']."' AND doc_d = 'no'";
$sql1="select COUNT(*) from appscheduler_bookings where appointment_d='".date("Y-m-d")."' AND doctor_id='".$_SESSION['ID']."' AND doc_d = 'no' GROUP by doctor_id";
//echo $sql;
$result=mysql_query($sql,$connect);
$num = mysql_num_rows($result);
?>
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
<table border="1" ><th><td><b>Name</b></td><td><b>Time</b></td><td><b>Student ID</b></td></th>
<?php
if($num==o){echo "No more appointments today";}
else{		$i=1;
	while($row=mysql_fetch_array($result))
	{?>
		
	<tr ><td><?php 	echo $i."&nbsp;&nbsp;&nbsp;"; ?> </td>
		<td> <?php	echo $row['student_name']."&nbsp;&nbsp;&nbsp;"; ?></td>
		<td><?php	echo $row['appointment_t']."&nbsp;&nbsp;&nbsp;"; ?></td>
		<td><?php	echo $row['student_id']."&nbsp;&nbsp;&nbsp;"; ?></td>
		<?php echo "<td><a href="."done.php?id=".$row['app_id']."> Done</a></td>"; ?>
		</tr>
		<?php $i++;
	}
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
