<?php
error_reporting(E_ALL ^ E_DEPRECATED);
mysql_connect("localhost","root","") or die("Server Error".mysql_error());
mysql_select_db("contactdb") or die("Database Error".mysql_error());
?>