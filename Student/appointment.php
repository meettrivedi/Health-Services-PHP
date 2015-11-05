<?php
if (!isset($_SESSION)) 
{
  session_start();
  
}
if($_SESSION['ID']!="") {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../favicon.ico" />

<title>Health Services</title>
</head>

<body>
<div id="container">
	<?php
		include "Header.php";
		?>
	<div id="content">
		<?php 
		//pre-task
		include "../db.php";
		$sql = "select * from doctor_table";
		$result = mysql_query($sql,$connect);
		$now = explode("-",date("d-m-Y"));
		$nowDate = $now[0];
		$nowMonth = $now[1];
		$nowYear = $now[2];
		?>
		
		<br><br><br>
		<form action="add_app.php" method="post" name="appointment">
		<table><tr><td>Select the type of appointment: </td>
		<td>
		<select name="app_type">
		<?php while($row=mysql_fetch_array($result)){ 			
		echo "<option value='".$row['doc_type']."'>".$row['doc_type']."</option>";
		} ?>
		</select></td></tr>
		<tr><td></td><td></td></tr>
		
		
		<tr>
		<td>Select Month:</td>
		<td><select name="month">
		<?php 
		for($i=0;$i<3;$i++)
		{
		if($nowMonth>12)
		{$nowMonth=$nowMonth%12;}
		
		echo "<option value='".$nowMonth."'>".$nowMonth."</option>";
		$nowMonth++;
			}
		
		?>
		</select>
		</td>
		</tr>
				
		<tr>
		<td>Select Date:</td>
		<td><select name="date">
		<?php 
		for($i=1;$i<=31;$i++)
		
		{	
			echo "<option value='".$i."'>".$i."</option>";
			}
		?>
		</select>
		</td>
		</tr>
		
		<tr>
		<td>Select Year:</td>
		<td><select name="year">
		<?php 
		for($i=1;$i<=2;$i++)
		{echo "<option value='".$nowYear."'>".$nowYear."</option>";$nowYear++;}
		?>
		</select>
		</td>
		</tr>
		
		<tr>
		<td>Select Time:</td>
		<td><select name="time">
		<?php 
		for($i=10;$i<=19;$i++)
		{echo "<option value='".$i."'>".$i.":00</option>";}
		?>
		</select>
		</td>
		</tr>
		
		<tr><td></td><td><input type="hidden" name="hid" value="<?php $_SESSION['ID'] ?>"></td></tr>
		<tr><td><input type="submit"></td></tr>
		</table>
		</form>
	  </div>
		
	
	
	<div id="footer"></div>	
</div>
</body>
</html>

<?php
} else {
$logoutGoTo = "../index.php";
header("Location: $logoutGoTo");
}
?>

