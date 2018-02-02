<?php 
require_once("connectdb.php");
$tag="";
$id="";

if(isset($_GET['tag']))
	$tag=$_GET['tag'];
if(isset($_GET['tag']))
	$tag=$_GET['tag'];		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/tablesort.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="css/btn_stye.css" />
<title>Contact System</title>
</head>
	<div id="wrapper">
	<div id="logo"><img src="images/person.png" width="75" height="75"/>Contact Management 
    </div>
    
    <form action="contact.php">
    	<div align="center"><button class="thoughtbot">Home Page</button></div>
    </form>
    <br />
<table border="1" align="center" cellpadding="3" cellspacing="0">
	<tr bgcolor="#006699" style="color:#FFF;">
    	<th width="2%" height="38" id="th" div>ID</th>
        <th width="12%" id="th" div>First Name</th>
        <th width="12%" id="th" div>Last Name</th>
        <th width="8%" id="th" div>Function</th>
        <th width="7%" id="th" div>Contact No:</th>
        <th width="11%" id="th" div>Email</th>
        <th width="10%" id="th" div>Company</th>
        <th width="8%" id="th" div>Date</th>
        <th width="10%" id="th" div>Profession</th>
    </tr>
	<?php
		$list=mysql_query("SELECT * FROM qmeet WHERE datemeet BETWEEN 0 AND 5");
		$num_rows=mysql_num_rows($list);
		$i=1;
		if($num_rows){
		while($row=mysql_fetch_array($list)){
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
     </tr> 
    <?php 
		$i++; 
			} 
		}else{
			echo '<script language="javascript">
                            alert("Welcome"); window.location="contact.php";
                </script>'; 
		}
	?>
	</table>
 </div>
 		<div id="h3" align="center"> : <?php echo $num_rows; ?> </h3></div>
<body>

</body>
</html>