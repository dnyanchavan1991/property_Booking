<?PHP
	$con=mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("agileso1_propertybook",$con) or die (mysql_error());
?>