<!--
in this file we write code for connection with database.
-->
<?php
$con = mysqli_connect("localhost","root","","finderdb");

if(!$con)
{
	echo "Database connection failed...";
}
?>
