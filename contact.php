<?php require_once("connectdb.php"); ?>
<?php include("lib/lib.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />

<title>Contact System</title>
<link rel="stylesheet" href="css/btn_stye.css" />
<link rel="stylesheet" type="text/css" href="css/tablesort.css">
<link rel="stylesheet" type="text/css" href="css/typing_text.css" />

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
   
	<div id="wrapper">
        <div id="logo"><img src="images/person.png" width="75" height="75"/>Contact Management 
        </div>
        <div><form method="post" action="search.php"><p class="p" align="center">Search by Name or Function: 
                  <input type="text" name="search" size="20" placeholder="" required/>
                  <button class="search" name="btn_search">Search</button></p>
             </form>
    </div>
        
<table border="1" align="center" cellpadding="3" cellspacing="0">
	<tr bgcolor="#006699" style="color:#FFF;">
    	<th width="3px" height="38" id="th" div>ID</th>
        <th width="12px" id="th" div>First Name</th>
        <th width="12px" id="th" div>Last Name</th>
        <th width="9px" id="th" div>Function</th>
        <th width="12px" id="th" div>Contact No:</th>
        <th width="8px" id="th" div>Email</th>
        <th width="11px" id="th" div>Company</th>
        <th width="11px" id="th" div>Date</th>
        <th width="7px" id="th" div>Profession</th>
        <th div id="th" colspan="2">Action</th>
    </tr>
    <?php
		$v_sql=mysql_query("SELECT * FROM tblcontact ORDER BY id DESC");
		$num_rows=mysql_num_rows($v_sql);
		$i=1;
		while($row=mysql_fetch_array($v_sql)){
	?>
	<tr>
        <?php
        $id="";
        $action="";
        if(isset($_GET['opr']))
            $opr=$_GET['opr'];
        if(isset($_GET['id']))
            $id=$_GET['id'];
		?>
    	<td height="33"><center><?php echo $i; ?></center></td>
        <td><?php echo $row['KhmerName']; ?></td>
        <td><?php echo $row['EnglishName']; ?></td>
        <td><?php echo $row['Position']; ?></td>
        <td><?php echo $row['Phone']; ?></td>
        <td><?php echo $row['Email']; ?></td>
        <td><?php echo $row['Address']; ?></td>
        <td><?php echo $row['Deadline']; ?></td>        
        <td><?php echo $row['Other']; ?></td>
        <td width="3px"><a href="update.php?tag=<?php echo $row['id'];?> &vid=<?php echo $i;?>">
            <center><img src="images/edit.png" width="21"/></center></a></td>
        <td width="3px"><a href="delete.php?tag=<?php echo $row['id'];?>">
            <center><img src="images/delete.png" width="22"/></center></a></td>
    </tr> 
    <?php $i++; } ?>
	<tr>
    <?php
		$id="";	
		if(isset($_GET['id']))
		$id=$_GET['id'];
//-------------------Add data----------------------
		if(isset($_POST['btn_add'])){
			$khname=$_POST['txtkhname'];
			$enname=$_POST['txtenname'];
			$position=$_POST['txtposition'];
			$phone=$_POST['txtphone'];
			$email=$_POST['txtemail'];
			$address=$_POST['txtaddress'];
			$deadline=$_POST['txtdeadline'];
			$other=$_POST['txtother'];
//----------------check Duplicate-------------------
			$v_sql="SELECT * FROM tblcontact WHERE EnglishName='$enname'";
			$dp=is_dp($v_sql);
			if($dp==true)
			    echo '<script language="javascript">
							alert("This data already exists Please input a new data!"); window.location="contact.php";
					   </script>';
			else
				{
				$ins_sql=mysql_query("INSERT INTO tblcontact (`id`, `KhmerName`, `EnglishName`, `Position`, `Phone`, `Email`, `Address`, `Deadline`, `Other`)
											VALUES(
												Null,
												'$khname',
												'$enname',
												'$position',
												'$phone',
												'$email',
												'$address',
												'$deadline',
												'$other'
												)"
											);
			if($ins_sql){
				 echo '<script language="javascript">
									alert("The data was succesfully added Thank you!"); window.location="contact.php";
					   </script>'; 

			}else
			{echo mysql_error();}
				 echo '<script language="javascript">
							alert("Your data is not valid! Please try again..!"); window.location="contact.php";
					   </script>';
			}
		}
	?>
	<form method="post" action="">
    	<td height="33"><center>No</center></td>
        <td><input type="text" name="txtkhname" autocomplete="off" size="4" /></td>
        <td><input type="text" name="txtenname" autocomplete="off" size="5" /></td>
        <td><input type="text" name="txtposition" autocomplete="off" size="1" /></td>
        <td><input type="text" name="txtphone" autocomplete="off" size="3" /></td>
        <td><input type="text" name="txtemail" autocomplete="off" size="12" /></td>
        <td><input type="text" name="txtaddress" autocomplete="off" size="4" /></td>
        <td><input type="text" name="txtdeadline" autocomplete="off" size="2" id="datepicker"/></td>       
        <td><input type="text" name="txtother" autocomplete="off" size="4" /></td>
        <td width="3px" colspan="2"><div><button class="add" name="btn_add" />Add</button></div></td>
       
    </form>
    </tr>
</table>
<br/>
	<div id="h3" align="center">The list of total names is : <?php echo $num_rows; ?> contacts</h3></div>
 
    
</body>
</html>