<?php

include "db.php";
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
?>

