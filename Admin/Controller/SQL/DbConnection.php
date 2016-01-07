<?php
$con = new mysqli("localhost","root","","hotelbook");
// Check connection
if ($con->connect_error)
{
	echo "Failed to connect to MySQL: " . $con->connect_error;
}
//echo "<pre>";
//var_dump($con);
?>
