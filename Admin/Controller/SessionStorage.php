<?php
session_start();
if($_POST['id'])
{
	$_SESSION['propertyDetailId'] = $_POST['id'];
	echo $_SESSION['propertyDetailId'];
	
}
?>