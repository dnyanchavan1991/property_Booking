<?php 
	$con=@mysql_connect("localhost","root","")or die("Server Not Found");
	@mysql_select_db("agileso1_propertybook",$con)or die("Database Not Found");
?>