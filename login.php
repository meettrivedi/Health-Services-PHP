<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="favicon.ico" />
<title>Database</title>
</head>

<body>
<?php
session_start();
$UserName=$_POST['txtUserName'];
$Password=$_POST['txtPassword'];
$UserType=$_POST['cmbType'];

if($UserType=="Admin")
{
include "db.php";
$sql = "select * from admin_table where emp_id='".$UserName."' and password='".$Password."'";
$result = mysql_query($sql);
$records = mysql_num_rows($result);
$row = mysql_fetch_array($result);
echo $records;
if ($records==0)
{
echo '<script type="text/javascript">alert(" Either:<br>(1)Wrong UserName or Password <br> or <br> (2)Your account has not been approved yet");window.location=\'index.php\';</script>';
//header("location:index.php");
}
else
{
session_start();
$_SESSION['ID']='admin';
$_SESSION['Name']='admin';
header("location:Admin/index.php");
} 
mysql_close($con);
}
else if ($UserType=="Doctor")
{
include "db.php";
$sql = "select * from doctor_table where doctor_id='".$UserName."' and password='".$Password."' ";
$result = mysql_query($sql);
$records = mysql_num_rows($result);
$row = mysql_fetch_array($result);
if ($records==0)
{
echo '<script type="text/javascript">alert("Either you have entered Wrong UserName or Password or Your account has not been approved yet");window.location=\'index.php\';</script>';
}
else
{
session_start();
$_SESSION['ID']=$row['doctor_id'];
//$_SESSION['Name']=$row['username'];
header("location:Doctor/index.php");
} 
mysql_close($con);
}
else if ($UserType=="Student")
{

include "db.php";
$sql = "select * from student_table where student_id='".$UserName."' and Password='".$Password."'";
$result = mysql_query($sql);
$records = mysql_num_rows($result);
$row = mysql_fetch_array($result);
if ($records==0)
{
echo '<script type="text/javascript">alert("Wrong UserName or Password or Your account has not been approved yet");window.location=\'index.php\';</script>';
}
else
{
session_start();
$_SESSION['ID']=$row['student_id'];
//$_SESSION['Name']=$row['username'];
//$_SESSION['Sem']=$row['Semester'];
header("location:Student/index.php");
} 
mysql_close($con);

}


?>
</body>
</html>
