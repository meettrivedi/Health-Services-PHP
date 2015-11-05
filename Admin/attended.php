<?php $att=$_GET['id']; 

include "../db.php"; 

$sql="UPDATE appscheduler_bookings SET Attended='yes' WHERE app_id=".$att;
echo $sql;
$res=mysql_query($sql);
if($res){header("Location:today.php");}


?>
