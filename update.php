<?php include("connectdb.php"); 
	$opr="";
	$id="";
		if(isset($_GET['opr']))
		$opr=$_GET['opr'];
		if(isset($_GET['id']))
		$id=$_GET['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<title>Contact System</title>

<link rel="stylesheet" href="css/btn_stye.css" />

<link rel="stylesheet" type="text/css" href="css/tablesort.css">
<link rel="stylesheet" href="js/jquery-ui.css" />
	<script src="js/jquery-1.9.1.js"></script>
    <script src="js/jquery-ui.js"></script>

</head>
	<script>
    $(function() {
    $( "#datepicker" ).datepicker();
    });
    </script>

<body>
<div id="wrapper">
	<div id="logo"><img src="images/person.png" width="75" height="75"/>Contact Management System
    </div>
<?php 
	
	$id=$_REQUEST['tag'];
	$vid=$_REQUEST['vid'];
	$sql_upd=mysql_query("SELECT * FROM tblcontact
							WHERE
								id=$id;
							");
	$u_row=mysql_fetch_array($sql_upd);
?>

<?php 
 	if(isset($_POST['btn_upd'])){
		$khname=$_POST['txtkhname'];
		$enname=$_POST['txtenname'];
		$position=$_POST['txtposition'];
		$phone=$_POST['txtphone'];
		$email=$_POST['txtemail'];
		$address=$_POST['txtaddress'];
		$deadline=$_POST['txtdeadline'];
		$other=$_POST['txtother'];
		$sql_upd=mysql_query("UPDATE tblcontact
								SET
									KhmerName='$khname',
									EnglishName='$enname',
									Position='$position',
									Phone='$phone',
									Email='$email',
									Address='$address',
									Deadline='$deadline',
									Other='$other'
								WHERE
									id='$id'
							");
	if($u_row=$sql_upd)
		echo '<script language="javascript">
                            alert("Your action was successful..!"); window.location="contact.php";
                </script>'; 
	else
		echo "សូមព្យាយាមម្ដងទៀត!!".mysql_error();
	}
?>
<form method="post">
<table border="1" align="center" cellpadding="3" cellspacing="0">
	<tr bgcolor="#006699" style="color:#FFF;">
    	<th width="4%" height="38" id="th" div>ID</th>
        <th width="12%" id="th" div>First Name</th>
        <th width="12%" id="th" div>Last Name</th>
        <th width="9%" id="th" div>Function</th>
        <th width="12%" id="th" div>Contact No:</th>
        <th width="8%" id="th" div>Email</th>
        <th width="11%" id="th" div>Company</th>
        <th width="11%" id="th" div>Date</th>
        <th width="7%" id="th" div>Profession</th>
    </tr>
	<tr>
    	<td height="33"><center><?php echo $vid; ?></center></td>
        <td><input type="text" value="<?php echo $u_row['KhmerName']; ?>" 
        						name="txtkhname" autocomplete="off" size="5" /></td>
        <td><input type="text" value="<?php echo $u_row['EnglishName']; ?>"
        						name="txtenname" autocomplete="off" size="6" /></td>
        <td><input type="text" value="<?php echo $u_row['Position']; ?>" 
        						name="txtposition" autocomplete="off" size="2" /></td>
        <td><input type="text" value="<?php echo $u_row['Phone']; ?>" 
        						name="txtphone" autocomplete="off" size="3" /></td>
        <td><input type="text" value="<?php echo $u_row['Email']; ?>" 
        						name="txtemail" autocomplete="off" size="13" /></td>
        <td><input type="text" value="<?php echo $u_row['Address']; ?>" 
        						name="txtaddress" autocomplete="off" size="5" /></td>
        <td><input type="text" value="<?php echo $u_row['Deadline']; ?>" 
        						name="txtdeadline" autocomplete="off" size="3" id="datepicker"/></td>
        <td><input type="text" value="<?php echo $u_row['Other']; ?>" 
        						name="txtother" autocomplete="off" size="8" /></td>
    </form>
    </tr> 
</table>

 		<div align="center"><button class="punch" name="btn_upd">Action</button></div>
 
</body>
</html>