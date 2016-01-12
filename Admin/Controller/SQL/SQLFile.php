<?php
//include_once("DbConnection.php");
session_start();
/*-- insert property info function--*/
function insertProperty($postdata ,$con)
{
	$request = json_decode($postdata);
	$PropertyName = $request->PropertyName;
	$Street = $request->Street;
	$City = $request->City;
	$State = $request->State;
	$PostalCode = $request->PostalCode;
	$Phone = $request->Phone;
	$StarRate = $request->StarRate;
	$propertyImages = $request->propertyImages;
	$location_map = $request->location_map;
	$description = $request->description;
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
		
	$newRecordId = "";
	//$con->autocommit(FALSE);
	if($insert1 = $con->prepare("INSERT INTO property(PropertyName,Street,City,PostalCode,Phone,StarRate,State,ImagePath,location_map,description) VALUES (?,?,?,?,?,?,?,?,?,?)"))
	{
		//echo "prepared stmt";
		$res = $insert1->bind_param("sssisissss" , $PropertyName,$Street,$City,$PostalCode,$Phone,$StarRate,$State,$propertyImages,$location_map,$description);
		if(!$res)
		{
			echo "bind error1".htmlspecialchars($insert1->error);
		}
		else
		{
			$insert1->execute();
			//echo "executed";
		}
		if($insert1)
		{
			$newRecordId = $con->insert_id;
			$_SESSION['lastPropertyId'] = $newRecordId;
		}
		$insert1->close();
	}
	else
	{
		echo "error while inserting new property".$con->error;
	}
	if($insert2 = $con->prepare("INSERT INTO property_info(PropertyId,Bedrooms,Bathrooms,Pool,Meals,EntertainMent,OtherAmenities,Theme,Attractions,LeisureActivities,General)
		VALUES (?,?,?,?,?,?,?,?,?,?,?)"))
	{
		//echo "prepared stmt";
		$res1 = $insert2->bind_param("issssssssss" , $newRecordId,$Bedrooms,$Bathrooms,$Pool,$Meals,$EntertainMent,$OtherAmenities,$Theme,$Attractions,$LeisureActivities,$General);
		if(!$res1)
		{
			echo "bind error2".htmlspecialchars($insert2->error);
		}
		else
		{
			$insert2->execute();
			$insert2->close();
			//echo "executed";
		}
	}
	else
	{
		echo "error while inserting new property".$con->error;
	}
	//echo "success";
}
/*-- insert property info function END --*/

/*-- insert property owner info function--*/
function addPropertyOwnerInfo($data, $con)
{
	$request = json_decode($data);
	$name = $request->name;
	$email = $request->email;
	$address = $request->address;
	$registred_date = $request->registred_date;
	$phone = $request->phone;
	
	$ID = $_SESSION['lastPropertyId'];
	if($prepareInsert = $con->prepare("INSERT INTO ad_property_owner_info(PropertyId,name,phone,email,address,registred_date) VALUES (?,?,?,?,?,?)"))
	{
		$bindResult = $prepareInsert->bind_param("isssss" , $ID,$name,$phone,$email,$address,$registred_date);
		if(!$bindResult)
		{
			echo "bind error".htmlspecialchars($prepareInsert->error);
		}
		else
		{
			$prepareInsert->execute();
			$prepareInsert->close();
			//echo "executed";
		}
	}
	else
	{
		echo "error while inserting new property owner info".$con->error;
	}
}
/*-- insert property owner info function END --*/
function propertyList($con)
{
	echo "list";
	$response = array();
	$posts = array();
	$query = "select P.PropertyId,P.PropertyName,P.City,PO.name,PO.phone,PO.registred_date FROM property P inner join property_info PI inner join ad_property_owner_info PO ON P.PropertyId = PI.PropertyId AND PI.PropertyId = PO.PropertyId";
	if($getList = $con->prepare($query))
	{
		$getList->execute();
		$getList->bind_result($property_id,$property_name,$city,$owner_name,$owner_phone,$reg_date);
		while($getList->fetch())
        {
			$PropertyId = $property_id;
			$PropertyName = $property_name;
			$city = $city;
			$ownerName = $owner_name;
			$ownerPhone = $owner_phone;
			$propertyRegistrationDate = date("d/m/Y h:i A", strtotime($reg_date));
			$posts = array('PropertyId'=> $PropertyId, 'PropertyName'=> $PropertyName, 'city'=> $city, 'ownerName'=> $ownerName, 'ownerPhone'=> $ownerPhone, 'propertyRegistrationDate'=> $propertyRegistrationDate); 
			array_push($response,$posts);
		}
		file_put_contents("../Admin/Controller/json/Properties.json",json_encode($response));
		$getList->close();
	}
	else
	{
		echo "error while selecting list of properties".$con->error;
	}
}
session_destroy();
?>