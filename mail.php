<?php
require("PHPMailer_5.2.4/class.phpmailer.php");
$mail = new PHPMailer(true);
include "db.php"; //select the table 
echo $now = explode("-",date("d-m-Y"));
$nowDate = $now[0];
$nowMonth = $now[1];
$nowYear = $now[2];

$newDate=$nowDate+1;
$newMonth=$nowMonth;
//echo $newDate;

$new=$nowYear."-".$nowMonth."-".$newDate;
$new1=$nowYear."-".$newMonth."-".$nowDate;

//echo $new;

$sql="select * from appscheduler_bookings where appointment_d='".$new."'OR appointment_d='"$new1."'";
//echo $sql;
$result=mysql_query($sql,$connect);


if(true){
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = "meetdbaproject2014@gmail.com"; // GMAIL username
    $mail->Password = ""; // GMAIL password
}
while($row=mysql_fetch_array($result))
{
//Typical mail data
$email=$row['student_email'];
$msg="Dear".$row['student_name'].",".PHP_EOL."This is to remind you that you that you have an appointment on ".$row['appointment_d']. " at " .$row['appointment_t']." Please Be present".PHP_EOL."Regards";
$mail->AddAddress($email);
$mail->SetFrom("meetdbaproject2014@gmail.com");
$mail->Subject = "Your appointment in Health Services";
$mail->Body = $msg;

try{
    $mail->Send();
    echo "Success!";
} catch(Exception $e){
    //Something went bad
    echo "Fail - " . $mail->ErrorInfo;
}

}
header("Location:index.php");
?>
