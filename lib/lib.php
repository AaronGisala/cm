<?php
function is_dp($v_sql){
$sql_ch=mysql_query($v_sql);
$num_rows=mysql_num_rows($sql_ch);

if($num_rows>0)
	return true;
else
	return false;	
}

?>