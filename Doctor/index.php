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

<title>Health Centre</title>
</head>

<body>
<div id="container">
	<?php
		include "Header.php";
		?>
	<div id="content">
		<div id="left">
			<h1>Welcome Doctor,<?php echo $_SESSION['Name'];?></h1>
			
	<p>&nbsp;</p>
	
	<h1>&nbsp;</h1>
	  </div>
		
		<div id="footerline"></div>
	</div>
	
	
</div>
</body>
</html>

<?php
} else {
$logoutGoTo = "../index.php";
header("Location: $logoutGoTo");
}
?>
