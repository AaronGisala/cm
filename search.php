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
<link rel="stylesheet" type="text/css" href="css/btn_css.css">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/tablesort.css">
<title>Contact System</title>

</head>
<body>
<div id="wrapper">
	<div id="logo"><img src="images/person.png" width="75" height="75"/>Contact Management System
    </div>
    
    <p align="center"><a href="contact.php" class="button back">Back</a></p>
    
<table border="1" align="center" cellpadding="3" cellspacing="0">
	<tr bgcolor="#006699" style="color:#FFF;">
    	<th height="38" id="th" div>ID</th>
        <th div id="th">First Name</th>
        <th div id="th">Last Name</th>
        <th div id="th">Function</th>
        <th div id="th">Contact No:</th>
        <th div id="th">Email</th>
        <th div id="th">Company</th>
        <th div id="th">Date</th>
        <th div id="th">Profession</th>
        <th div id="th" colspan="2">Action</th>
    </tr>
     <?php
		$v_sql=mysql_query("SELECT * FROM tblcontact ORDER BY id DESC");
		$num_rows=mysql_num_rows($v_sql);
		$i=1;
	?>
    <?php
        if (isset($_POST['btn_search'])){
            $search=$_POST['search'];
			$v_sql=mysql_query("SELECT * FROM tblcontact 
									WHERE 
										KhmerName LIKE '%$search%' OR
										EnglishName LIKE '%$search%' OR 
										Position LIKE '%$search%'")or die(mysql_error());
			$num_rows=mysql_num_rows($v_sql);
			if($num_rows){
						while($row=mysql_fetch_array($v_sql)){
	?>
	<tr>
    	<td height="33"><center><?php echo $i; ?></center></td>
        <td><?php echo $row['KhmerName']; ?></td>
        <td><?php echo $row['EnglishName']; ?></td>
        <td><?php echo $row['Position']; ?></td>
        <td><?php echo $row['Phone']; ?></td>
        <td><?php echo $row['Email']; ?></td>
        <td><?php echo $row['Address']; ?></td>
        <td><?php echo $row['Deadline']; ?></td>        
        <td><?php echo $row['Other']; ?></td>
        <td width="3%"><a href="update.php?tag=<?php echo $row['id'];?>&vid=
											   <?php echo $i; ?>&&vids=<?php echo $i; ?> ">
            <center><img src="images/edit.png" width="21"/></center></a></td>
        <td width="3%"><a href="delete.php?tag=<?php echo $row['id'];?>">
            <center><img src="images/delete.png" width="22"/></center></a></td>
    </tr> 
    <?php  $i++; 
			}
				}else {
					
					echo '<script language="javascript">
                            alert("This data is not available! Please try again ..!"); window.location="contact.php";
                			</script>';	
					}
			}
	  ?>
</table>
</div>
		<div id="h3" align="center">The results you have found are : <?php echo $num_rows; ?> </h3></div>
</body>
</html>