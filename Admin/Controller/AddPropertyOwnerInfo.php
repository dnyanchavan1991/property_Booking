<?php
include_once("SQL/SQLFile.php");
include_once("SQL/DbConnection.php");
/*--retrieve values--*/
$PropertyOwnerName = $_POST['name'];
$PropertyOwnerEmail = $_POST['email'];
$PropertyOwnerAddress = $_POST['address'];
$input_date = str_replace('/', '-', $_POST['registred_date']);
$PropertyOwnerRegistred_date = date("Y-m-d", strtotime($input_date));
$PropertyOwnerPhone = $_POST['phone'];

$data = array(
					'name' => $PropertyOwnerName,
					'email' => $PropertyOwnerEmail,
					'address' => $PropertyOwnerAddress,
					'registred_date' => $PropertyOwnerRegistred_date,
					'phone' => $PropertyOwnerPhone
				);
$data = json_encode($data);
/*--call to insert function--*/
$lastPropertyId = addPropertyOwnerInfo($data,$con);
$con->close();
echo "<script>alert('Property owner info added successfully')</script>";
echo "<meta http-equiv='refresh' content='0;url=../AddPropertyOwnerInfo.html'>";
?>
