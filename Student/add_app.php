<?php
if (!isset($_SESSION)) 
{
  session_start();
  
}
if($_SESSION['ID']!="") 
{
$m=$_POST['month'];
$d=$_POST['date'];
$y=$_POST['year'];
$t=$_POST['time'].":00";
//echo $t;
include "../db.php";

$sql="select * from student_table WHERE student_id=".$_SESSION['ID'];
$result = mysql_query($sql);
$row=mysql_fetch_array($result);
//echo $row['email'];
$sql1="select * from doctor_table WHERE doc_type='".$_POST['app_type']."'";
$result1 = mysql_query($sql1);
//if($result1){echo "done";}
$row1=mysql_fetch_array($result1);
//echo $row1['doctor_id'];

//$nw= strtotime('today');
echo $new=$y."-".$m."-".$d;

echo $date1=date('d/m/y');

echo $date2 = date("d/m/y", mktime(0, 0, 0, $d, $m, $y));

echo $sdate3=date("Y-m-d");

$two=strtotime($new);
$one=strtotime($date2);

if(!checkdate($m,$d,$y))
{
echo '<script type="text/javascript">alert("Your Entered date is invalid ");window.location=\'appointment.php\';</script>';
}

else
{
$sql3="select * from appscheduler_bookings where appointment_d='".$new."' AND appointment_t='".$t.":00' AND doc_type='".$_POST['app_type']."'";
$result3=mysql_query($sql3);
$row4=mysql_fetch_array($result3);


if($row4['app_id']>0){
	echo "here";
echo '<script type="text/javascript">alert("Sorry there is already an appoint ment on same day and time ");window.location=\'appointment.php\';</script>';
}
else
{
	//echo "here";
	//echo $row['student_id']."','".$row['student_name']."','".$row['student_email']."','".$row['student_phone']."','','".$new."','".$t."','".$row1['doctor_id']."','".$row1['doc_type']."')";
$sql2="INSERT INTO appscheduler_bookings (student_id, student_name,student_email, student_phone, student_notes, appointment_d, appointment_t, doctor_id, doc_type,city,state,student_dob) VALUES('".$row['student_id']."','".$row['student_name']."','".$row['student_email']."','".$row['student_phone']."','','".$new."','".$t."','".$row1['doctor_id']."','".$row1['doc_type']."','".$row['city']."','".$row['state']."','".$row['dob']."')";
$result2=mysql_query($sql2);
if($result2){echo '<script type="text/javascript">alert("Appontment made");window.location=\'appointment.php\';</script>';}else{echo "na thayu";}
}

}

}
else
{
	header("Location: ../index.php");
	}
?>
