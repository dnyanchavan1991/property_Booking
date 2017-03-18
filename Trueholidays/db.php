<?PHP
	$con=mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("agileso1_propertybook",$con) or die (mysql_error());
	//$con=mysqli_connect("localhost","root","","propertybook"); //local
	/*$con=mysqli_connect("localhost","db_prop","property_P@ssw0rd","propertybook");*/
	/*$con=mysqli_connect("localhost","root","","agileso1_propertybook"); */// server
?>