<?php $dn=$_GET['id']; 

include "../db.php";

$sql="UPDATE appscheduler_bookings SET doc_d='yes' WHERE app_id=".$dn;
echo $sql;
$res=mysql_query($sql);
if($res){header("Location:appointments.php");}


?>
