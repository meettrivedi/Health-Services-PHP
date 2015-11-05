<?php
require("class.phpmailer.php");
$mail = new PHPMailer(true);
$connect = mysql_connect("localhost","root","meet4493"); 
mysql_select_db("health_center",$connect); //select the table 
$now = explode("-",date("d-m-Y"));
		$nowDate = $now[0];
		$nowMonth = $now[1];
		$nowYear = $now[2];
$newDate=$nowDate+1;
echo $newDate;
$new=$newDate."-".$nowMonth."-".$nowYear;
echo $new;

$sql="select * from appscheduler_bookings where appointment_d='".."'";

//Send mail using gmail

if(true){
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = "meetdbaproject2014@gmail.com"; // GMAIL username
    $mail->Password = "meet4493"; // GMAIL password
}

//Typical mail data
$mail->AddAddress("sheth.shraddha04@gmail.com");
$mail->AddAddress("meetyo4493@gmail.com");
$mail->SetFrom("meetdbaproject2014@gmail.com");
$mail->Subject = "Test";
$mail->Body = "test";

try{
    $mail->Send();
    echo "Success!";
} catch(Exception $e){
    //Something went bad
    echo "Fail - " . $mail->ErrorInfo;
}

?>
