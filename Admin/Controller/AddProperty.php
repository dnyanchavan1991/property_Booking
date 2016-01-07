<?php
include_once("SQL/SQLFile.php");
include_once("SQL/DbConnection.php");
//echo "reached";
//echo $postdata = file_get_contents("php://input");
$PropertyName = $con->real_escape_string($_POST['PropertyName']);
$Street = $con->real_escape_string($_POST['Street']);
$City = $con->real_escape_string($_POST['City']);
$State = $con->real_escape_string($_POST['State']);
$PostalCode = $con->real_escape_string($_POST['PostalCode']);
$Phone = $con->real_escape_string($_POST['Phone']);
//$propertyImages = $_POST['propertyImages'];
$fdata=$_FILES['propertyImages'];
if(is_array($fdata['name']))
{
	$files="";
	$temp="";
	$path = "../Property gallery/$PropertyName/";
	mkdir($path);
	for($i=0 ; $i<count($fdata['name']) ; $i++)
	{
		$temp = $fdata['tmp_name'][$i];
		$files = $fdata['name'][$i];
		move_uploaded_file($temp,$path.$files);
	}
	//echo $files;
}
$path = $con->real_escape_string($path);
$location_map = $con->real_escape_string($_POST['location_map']);
$description = $con->real_escape_string($_POST['description']);
//$AccomodationType = $_POST['AccomodationType'];
$accomodationType ="";
foreach($_POST['AccomodationType'] as $check)
{
    $accomodationType.=$check.",";
}
$accomodationType = trim($accomodationType,",");

$Bedrooms = $con->real_escape_string($_POST['Bedrooms']);
$Bathrooms = $con->real_escape_string($_POST['Bathrooms']);
$Pool = $con->real_escape_string($_POST['Pool']);
$Meals = $con->real_escape_string($_POST['Meals']);
$EntertainMent = $con->real_escape_string($_POST['EntertainMent']);
$OtherAmenities = $con->real_escape_string($_POST['OtherAmenities']);
$Theme = $con->real_escape_string($_POST['Theme']);
$Attractions = $con->real_escape_string($_POST['Attractions']);
$LeisureActivities = $con->real_escape_string($_POST['LeisureActivities']);
$General = $con->real_escape_string($_POST['General']);
//$lastPropertyId = insertProperty($postdata);
$postdata = array(
					'PropertyName' => $PropertyName,
					'Street' => $Street,
					'City' => $City,
					'State' => $State,
					'PostalCode' => $PostalCode,
					'Phone' => $Phone,
					'propertyImages' => $path,
					'location_map' => $location_map,
					'description' => $description,
					'AccomodationType' => $accomodationType,
					'Bedrooms' => $Bedrooms,
					'Bathrooms' => $Bathrooms,
					'Pool' => $Pool,
					'Meals' => $Meals,
					'EntertainMent' => $EntertainMent,
					'OtherAmenities' => $OtherAmenities,
					'Theme' => $Theme,
					'Attractions' => $Attractions,
					'LeisureActivities' => $LeisureActivities,
					'General' => $General,
				);
$postdata = json_encode($postdata);
$lastPropertyId = insertProperty($postdata,$con);
?>
