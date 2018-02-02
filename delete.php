<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
include_once("connectdb.php");
$id=$_GET['tag'];
$sql="DELETE from tblcontact where ID=".$id;
$query=mysql_query($sql);
if($query){
	echo '<script language="javascript"> alert("Your delete was successful!");window.location="contact.php";</script>';
	}
	else 
		 {
			echo '<script language="javascript"> alert("Please try again!");</script>';
		 }
		 
?>
</body>
</html>