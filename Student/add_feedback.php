<?php 
$id=$_GET['id'];
echo $_POST['fb'];
include "../db.php";
$sql1="select * from appscheduler_bookings where app_id=".$id;
$result1=mysql_query($sql1);
$row1=mysql_fetch_array($result1);
echo $row['student_id'];
$sql="Insert into feedback (student_id, doctor_id, fb, date, app_id) VALUES ('".$row1['student_id']."','".$row1['doctor_id']."','".$_POST['fb']."','".$row1['appointment_d']."',".$id.")";
$sql2="UPDATE appscheduler_bookings SET fb='yes' WHERE app_id=".$id;
$result2=mysql_query($sql2);
$result=mysql_query($sql);if($result){echo "1";}
header("Location: feedback.php");
?>
