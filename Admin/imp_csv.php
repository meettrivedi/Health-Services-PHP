<?php  

if (!isset($_SESSION)) 
{
  session_start();
  
}
if($_SESSION['Name']!="") {
//connect to the database 
include "../db.php";
// 

if ($_FILES[csv][size] > 0) { 

    //get the csv file 
    $file = $_FILES[csv][tmp_name]; 
    $handle = fopen($file,"r"); 
     
    //loop through the csv file and insert into database 
    do { 
        if ($data[0]) { 
            mysql_query("INSERT INTO student_table (student_id,student_name,password,student_phone,student_email,street,city,state,dob,gender) VALUES 
                ( 
                    '".addslashes($data[0])."', 
                    '".addslashes($data[1])."', 
                    '".addslashes($data[2])."',
                    '".addslashes($data[3])."', 
                    '".addslashes($data[4])."', 
                    '".addslashes($data[5])."', 
                    '".addslashes($data[6])."',
                    '".addslashes($data[7])."',
                    '".addslashes($data[8])."',
                    '".addslashes($data[9])."'
                ) 
            "); 
        } 
    } while ($data = fgetcsv($handle,1000,",","'")); 
    // 

    //redirect 
    header('Location: imp_csv.php?success=1'); die; 

} 

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
	<div id="content">
<?php if (!empty($_GET[success])) { echo "<b>Your file has been imported.</b><br><br>"; } //generic success notice ?> 
<br><br><br>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
  Choose your file to insert in the student table: <br /> 
  <input name="csv" type="file" id="csv" /> 
  <input type="submit" name="Submit" value="Submit" /> 
</form> 
</div>
</div>
</body> 
</html> 
<?php }  else {
$logoutGoTo = "../index.php";
header("Location: $logoutGoTo");
} ?>
