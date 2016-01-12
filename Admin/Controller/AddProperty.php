<?php
include_once("SQL/SQLFile.php");
include_once("SQL/DbConnection.php");
/*--retrieve values--*/
$PropertyName = $_POST['PropertyName'];
$Street = $_POST['Street'];
$City = $_POST['City'];
$State = $_POST['State'];
$PostalCode = $_POST['PostalCode'];
$Phone = $_POST['Phone'];
$StarRate = $_POST['StarRate'];
$fdata_mainImg=$_FILES['mainImage'];
$fdata=$_FILES['propertyImages'];
if(is_array($fdata['name']))
{
	$files="";
	$temp="";
	$path = "../Property gallery/$PropertyName/";
	mkdir($path);
	/*--upload main img--*/
	$exetention = explode(".", $fdata_mainImg["name"]);
	$mainImg = "mainImage.".end($exetention);
	move_uploaded_file($fdata_mainImg["tmp_name"], $path.$mainImg);
	/*--upload gallery imgs--*/
	for($i=0 ; $i<count($fdata['name']) ; $i++)
	{
		$temp = $fdata['tmp_name'][$i];
		$files = $fdata['name'][$i];
		move_uploaded_file($temp,$path.$files);
	}
}
$path = "Admin/Property gallery/$PropertyName/";
$location_map = $_POST['location_map'];
$description = $_POST['description'];
$Bedrooms = $_POST['Bedrooms'];
$Bathrooms = $_POST['Bathrooms'];
$Pool = $_POST['Pool'];
$Meals = $_POST['Meals'];
$EntertainMent = $_POST['EntertainMent'];
$OtherAmenities = $_POST['OtherAmenities'];
$Theme = $_POST['Theme'];
$Attractions = $_POST['Attractions'];
$LeisureActivities = $_POST['LeisureActivities'];
$General = $_POST['General'];

$postdata = array(
					'PropertyName' => $PropertyName,
					'Street' => $Street,
					'City' => $City,
					'State' => $State,
					'PostalCode' => $PostalCode,
					'Phone' => $Phone,
					'StarRate' => $StarRate,
					'propertyImages' => $path,
					'location_map' => $location_map,
					'description' => $description,
					'Bedrooms' => $Bedrooms,
					'Bathrooms' => $Bathrooms,
					'Pool' => $Pool,
					'Meals' => $Meals,
					'EntertainMent' => $EntertainMent,
					'OtherAmenities' => $OtherAmenities,
					'Theme' => $Theme,
					'Attractions' => $Attractions,
					'LeisureActivities' => $LeisureActivities,
					'General' => $General
				);
$postdata = json_encode($postdata);
/*--call to insert function--*/
$lastPropertyId = insertProperty($postdata,$con);
$con->close();
echo "<script>alert('Property added successfully')</script>";
echo "<meta http-equiv='refresh' content='0;url=AddPropertyOwnerInfo.html'>";
?>
