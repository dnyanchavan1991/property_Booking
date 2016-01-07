<?php
//include_once("DbConnection.php");
function insertProperty($postdata ,$con)
{
	$request = json_decode($postdata);
	//print_r($request);
	$PropertyName = $request->PropertyName;
	$Street = $request->Street;
	$City = $request->City;
	$State = $request->State;
	$PostalCode = $request->PostalCode;
	$Phone = $request->Phone;
	$propertyImages = $request->propertyImages;
	$location_map = $request->location_map;
	$description = $request->description;
	$AccomodationType = $request->AccomodationType;
	$Bedrooms = $request->Bedrooms;
	$Bathrooms = $request->Bathrooms;
	$Pool = $request->Pool;
	$Meals = $request->Meals;
	$EntertainMent = $request->EntertainMent;
	$OtherAmenities = $request->OtherAmenities;
	$Theme = $request->Theme;
	$Attractions = $request->Attractions;
	$LeisureActivities = $request->LeisureActivities;
	$General = $request->General;
	//var_dump($con);
	//$id = null;
	
	/*if($insert = $con->prepare("INSERT INTO property(PropertyName,Street,City,PostalCode,Phone,State,ImagePath,location_map,description) VALUES (?,?,?,?,?,?,?,?,?)"))
	{
		echo "prepared stmt";
		$res = $insert->bind_param("sssisssss" , $PropertyName,$Street,$City,$PostalCode,$Phone,$State,$propertyImages,$location_map,$description);
		if(!$res)
		{
			echo "bind error".$insert->error;
		}
		else
		{
			$insert->execute();
			echo "executed";
		}
		
		/*if($insert)
		{
			echo $newRecordId = $con->insert_id;
		}*/
	/*}
	else
	{
		echo "error".$con->error;
	}*/
	$new_connection = mysql_connect("localhost","root","");
	if($new_connection)
	{
		mysql_select_db("hotelbook");
	}
	$sql = mysql_query("INSERT INTO property(PropertyName,Street,City,PostalCode,Phone,State,ImagePath,location_map,description) 
	VALUES ('$PropertyName','$Street','$City','$PostalCode','$Phone','$State','$propertyImages','$location_map','$description')");
	
}
?>