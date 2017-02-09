<?php
class PropertyModel extends CI_Model {
    function __construct() {
        parent::__construct ();
        $this->load->database ();
    }
    // this function returns available rooms according to checkin &checkout date
    public function checkRoomAvailabilty($searchArray, $filterData, $sortCriteria, $sortBCriteria,$limit=null,$offset=NULL) {
        $reservationTable = 'reservation';
        $accomodationTable = 'accomodationtype';
        $propertyTable = 'property';
        $propertyInfo = 'property_info';
        $roomTable = 'room';

        $checkout = $searchArray ['checkOut'];
        $checkin = $searchArray ['checkIn'];
        $guestCountstring = $searchArray ['guestCount'];
        $guestCount = ( int ) substr ( $guestCountstring, 7 );

        $propertyType = $searchArray ['propertyType'];
        $destination = $searchArray ['destination'];
        $featured    =  $searchArray ['featured'];

        $d=date("y-m-d");
        //$where = " ( Featured_startDate <= '$d' and Featured_endDate >='$d' )";
        //if(propertyInfo.Featured )

        $this->db->select ( "property.property_id,description,star_rate,property.property_name as property_name,property.property_type_id,property.image_path as image_path, property.star_rate, concat(property.street,',',property.city,',',property.state,',',property.postal_code)as propertyAddress,propertyInfo.accommodates,(propertyInfo.accommodates) as accommodates, propertyInfo.bedrooms,propertyInfo.bathrooms, propertyInfo.pool, propertyInfo.free_parking, propertyInfo.air_condition, propertyInfo.television_access, propertyInfo.internet_access,
		 propertyInfo.smoking_allowd, propertyInfo.free_breakfast, propertyInfo.pet_friendly,
		 IF((Featured_startDate <= '$d' and Featured_endDate >='$d'), 'Yes', 'No') as Featured ");


        //(propertyInfo.accommodates-IFNULL(sum(res.accomodates), 0)) as availableAccomodes
        $this->db->from ( "$propertyInfo propertyInfo " );
        /*	$dateConditions = "(";
            $dateConditions .= "( res.check_in <= '$checkin' AND ( res.check_out >= '$checkin' OR res.check_out >= '$checkout' ) )";
            $dateConditions .= "OR ( (res.check_in >= '$checkin' AND res.check_in <= '$checkout') AND (res.check_out <='$checkout' OR res.check_out >='$checkout')) ";
            $dateConditions .= ")";
         */
        $this->db->join ( "$reservationTable res", "res.property_id = propertyInfo.property_id   ", "left outer" );//and $dateConditions

        //$this->db->having(" $dateConditions");
        $this->db->join ( "$propertyTable property ", "propertyInfo.property_id=property.property_id" );

        //	$where = "(city  like '%$destination%' or state like '%$destination%')";
        $where = " CONCAT(TRIM(city), ', ', TRIM(state),', ',TRIM(country)) LIKE '%$destination%' ";

        $this->db->where ( $where );
        $this->db->where ('activation_flag','YES');

        if ($featured == "Featured") {

            $where = " Featured_startDate <= '$d' and Featured_endDate >='$d' ";
            $this->db->where (  $where );
        }


        if ($propertyType != '0') {
            $where = "(property_type_id='$propertyType')";
            $this->db->where ( $where );
        }

        $i = 0;

        if ($filterData != null) {

            if (sizeof ( $filterData->selectedstarRateList ) != 0) {

                $starRateWhere = "(";
                foreach ( $filterData->selectedstarRateList as $starList ) {
                    // $this->db->or_where('property.star_rate', $starList->name);
                    $starRateWhere = 	$starRateWhere. "property.star_rate=" . $starList->name;
                    if ($i <= (sizeof ( $filterData->selectedstarRateList ) - 2)) {
                        $starRateWhere = 	$starRateWhere . " or ";
                    } else {
                        $starRateWhere = 	$starRateWhere . ")";
                    }

                    $i ++;
                }
                $this->db->where ( 	$starRateWhere);
            }
            $i = 0;
            if (sizeof ( $filterData->selectedPropertyTypeList) != 0) {

                $propertyTypewhere = "(";
                foreach ( $filterData->selectedPropertyTypeList as $propertyTypeList ) {
                    // $this->db->or_where('property.star_rate', $starList->name);
                    $propertyTypewhere = $propertyTypewhere . "property.property_type_id=" . $propertyTypeList->propertyTypeId;
                    if ($i <= (sizeof ( $filterData->selectedPropertyTypeList ) - 2)) {
                        $propertyTypewhere = $propertyTypewhere . " or ";
                    } else {
                        $propertyTypewhere = $propertyTypewhere . ")";
                    }

                    $i ++;
                }
                $this->db->where ( $propertyTypewhere);
            }

            $i = 0;

            if (sizeof ( $filterData->selectedFeatureList ) != 0) {

                $featureWhere = "(";
                foreach ( $filterData->selectedFeatureList as $featureList ) {
                    // $this->db->or_where('property.star_rate', $starList->name);
                    $featureWhere  = $featureWhere  . "propertyInfo.$featureList->name='Yes'";
                    if ($i <= (sizeof ( $filterData->selectedFeatureList ) - 2)) {
                        $featureWhere  = $featureWhere  . " or ";
                    } else {
                        $featureWhere  = $featureWhere  . ")";
                    }

                    $i ++;
                }
                $this->db->where ( $featureWhere  );
            }

            if (sizeof ( $filterData->selectedFacilityList ) != 0) {

                $facilityWhere = "(";
                foreach ( $filterData->selectedFacilityList as $facilityList ) {
                    // $this->db->or_where('property.star_rate', $starList->name);
                    $facilityWhere = $facilityWhere . "`propertyInfo`.`$facilityList->name`='Yes'";
                    if ($i <= (sizeof ( $filterData->selectedFacilityList ) - 2)) {
                        $facilityWhere = $facilityWhere . " or ";
                    } else {
                        $facilityWhere = $facilityWhere . ")";
                    }

                    $i ++;
                } // echo $where;
                $this->db->where ( $facilityWhere );
            }
            if (sizeof ( $filterData->selectedBathroomList ) != 0) {

                $bathroomWhere = "(";
                foreach ( $filterData->selectedBathroomList as $bathroomList ) {
                    if($bathroomList->name == "5+")
                        $bathroomWhere = 	$bathroomWhere. "propertyInfo.bathrooms >= 5";
                    else
                        $bathroomWhere = 	$bathroomWhere. "propertyInfo.bathrooms = " . $bathroomList->name;
                    if ($i <= (sizeof ( $filterData->selectedBathroomList ) - 2)) {
                        $bathroomWhere = 	$bathroomWhere . " or ";
                    } else {
                        $bathroomWhere = 	$bathroomWhere . ")";
                    }

                    $i ++;
                } // echo $where;
                $this->db->where ( $bathroomWhere );
            }
            /*	if ($filterData->propertyNameList [0]->name != null) {
                    $propertyName = $filterData->propertyNameList [0]->name;
                    $propertyNameWhere = "property_name like '$propertyName%'";
                    $this->db->where ( $propertyNameWhere);
                }
                if($filterData->accomodatesList[0]->name != ""){
                    $guestCount=$filterData->accomodatesList[0]->name;

                }*/
            //$where = "accomodates='$guestCount'";
            //$this->db->where ( $where );
        }
        switch($sortBCriteria) {
            case "1" :
                $this->db->having ( "bedrooms = 1" );
                break;
            case "2" :
                $this->db->having ( "bedrooms = 2" );
                break;
            case "3" :
                $this->db->having ( "bedrooms = 3" );
                break;
            case "4" :
                $this->db->having ( "bedrooms = 4" );
                break;
            case "5" :
                $this->db->having ( "bedrooms >= 5" );
                break;
            case "All" :
                $this->db->having ( "bedrooms >= 1" );
                break;
            default :
                $this->db->having ( "bedrooms >= 1" );
                break;
        }
        $this->db->where('activation_flag','YES');

        $this->db->having ( "accommodates >= $guestCount" );

        $this->db->group_by ( array (
            "property.property_id"
        ) );
        switch($sortCriteria){

            case "propAToZ" :
                $this->db->order_by("property_name", "asc");
                break;
            case "propZToA" :
                $this->db->order_by("property_name", "desc");
                break;
            case "accLowToHigh" :
                $this->db->order_by("accommodates", "asc");
                break;
            case "accHighToLow" :
                $this->db->order_by("accommodates", "desc");
                break;
            case "bedLowToHigh" :
                $this->db->order_by("bedrooms", "asc");
                break;
            case "bedHighToLow" :
                $this->db->order_by("bedrooms", "desc");
                break;
            default;
                $this->db->order_by("property_name", "asc");
                break;
        }
        $this->db->limit($limit,$offset);
        //return $this;

        $roomAvailableInfo = $this->db->get ();
        $roomAvailableInfoResult = $roomAvailableInfo->result ();
        return ($roomAvailableInfoResult);
    }
    public function checkRoomAvailabiltyCount($searchArray, $filterData, $sortCriteria, $sortBCriteria) {
        $reservationTable = 'reservation';
        $accomodationTable = 'accomodationtype';
        $propertyTable = 'property';
        $propertyInfo = 'property_info';
        $roomTable = 'room';

        $checkout = $searchArray ['checkOut'];
        $checkin = $searchArray ['checkIn'];
        $guestCountstring = $searchArray ['guestCount'];
        $guestCount = ( int ) substr ( $guestCountstring, 7 );

        $propertyType = $searchArray ['propertyType'];
        $destination = $searchArray ['destination'];
        $featured    =  $searchArray ['featured'];

        $d=date("y-m-d");
        //$where = " ( Featured_startDate <= '$d' and Featured_endDate >='$d' )";
        //if(propertyInfo.Featured )

        $this->db->select ( "property.property_id,description,star_rate,property.property_name as property_name,property.property_type_id,property.image_path as image_path, property.star_rate, concat(property.street,',',property.city,',',property.state,',',property.postal_code)as propertyAddress,propertyInfo.accommodates,(propertyInfo.accommodates) as accommodates, propertyInfo.bedrooms,propertyInfo.bathrooms, propertyInfo.pool, propertyInfo.free_parking, propertyInfo.air_condition, propertyInfo.television_access, propertyInfo.internet_access,
		 propertyInfo.smoking_allowd, propertyInfo.free_breakfast, propertyInfo.pet_friendly,
		 IF((Featured_startDate <= '$d' and Featured_endDate >='$d'), 'Yes', 'No') as Featured ");


        //(propertyInfo.accommodates-IFNULL(sum(res.accomodates), 0)) as availableAccomodes
        $this->db->from ( "$propertyInfo propertyInfo " );
        /*	$dateConditions = "(";
            $dateConditions .= "( res.check_in <= '$checkin' AND ( res.check_out >= '$checkin' OR res.check_out >= '$checkout' ) )";
            $dateConditions .= "OR ( (res.check_in >= '$checkin' AND res.check_in <= '$checkout') AND (res.check_out <='$checkout' OR res.check_out >='$checkout')) ";
            $dateConditions .= ")";
         */
        $this->db->join ( "$reservationTable res", "res.property_id = propertyInfo.property_id   ", "left outer" );//and $dateConditions

        //$this->db->having(" $dateConditions");
        $this->db->join ( "$propertyTable property ", "propertyInfo.property_id=property.property_id" );

        //	$where = "(city  like '%$destination%' or state like '%$destination%')";
        $where = " CONCAT(TRIM(city), ', ', TRIM(state),', ',TRIM(country)) LIKE '%$destination%' ";

        $this->db->where ( $where );
        $this->db->where ('activation_flag','YES');

        if ($featured == "Featured") {

            $where = " Featured_startDate <= '$d' and Featured_endDate >='$d' ";
            $this->db->where (  $where );
        }


        if ($propertyType != '0') {
            $where = "(property_type_id='$propertyType')";
            $this->db->where ( $where );
        }

        $i = 0;

        if ($filterData != null) {

            if (sizeof ( $filterData->selectedstarRateList ) != 0) {

                $starRateWhere = "(";
                foreach ( $filterData->selectedstarRateList as $starList ) {
                    // $this->db->or_where('property.star_rate', $starList->name);
                    $starRateWhere = 	$starRateWhere. "property.star_rate=" . $starList->name;
                    if ($i <= (sizeof ( $filterData->selectedstarRateList ) - 2)) {
                        $starRateWhere = 	$starRateWhere . " or ";
                    } else {
                        $starRateWhere = 	$starRateWhere . ")";
                    }

                    $i ++;
                }
                $this->db->where ( 	$starRateWhere);
            }
            $i = 0;
            if (sizeof ( $filterData->selectedPropertyTypeList) != 0) {

                $propertyTypewhere = "(";
                foreach ( $filterData->selectedPropertyTypeList as $propertyTypeList ) {
                    // $this->db->or_where('property.star_rate', $starList->name);
                    $propertyTypewhere = $propertyTypewhere . "property.property_type_id=" . $propertyTypeList->propertyTypeId;
                    if ($i <= (sizeof ( $filterData->selectedPropertyTypeList ) - 2)) {
                        $propertyTypewhere = $propertyTypewhere . " or ";
                    } else {
                        $propertyTypewhere = $propertyTypewhere . ")";
                    }

                    $i ++;
                }
                $this->db->where ( $propertyTypewhere);
            }

            $i = 0;

            if (sizeof ( $filterData->selectedFeatureList ) != 0) {

                $featureWhere = "(";
                foreach ( $filterData->selectedFeatureList as $featureList ) {
                    // $this->db->or_where('property.star_rate', $starList->name);
                    $featureWhere  = $featureWhere  . "propertyInfo.$featureList->name='Yes'";
                    if ($i <= (sizeof ( $filterData->selectedFeatureList ) - 2)) {
                        $featureWhere  = $featureWhere  . " or ";
                    } else {
                        $featureWhere  = $featureWhere  . ")";
                    }

                    $i ++;
                }
                $this->db->where ( $featureWhere  );
            }

            if (sizeof ( $filterData->selectedFacilityList ) != 0) {

                $facilityWhere = "(";
                foreach ( $filterData->selectedFacilityList as $facilityList ) {
                    // $this->db->or_where('property.star_rate', $starList->name);
                    $facilityWhere = $facilityWhere . "`propertyInfo`.`$facilityList->name`='Yes'";
                    if ($i <= (sizeof ( $filterData->selectedFacilityList ) - 2)) {
                        $facilityWhere = $facilityWhere . " or ";
                    } else {
                        $facilityWhere = $facilityWhere . ")";
                    }

                    $i ++;
                } // echo $where;
                $this->db->where ( $facilityWhere );
            }
            if (sizeof ( $filterData->selectedBathroomList ) != 0) {

                $bathroomWhere = "(";
                foreach ( $filterData->selectedBathroomList as $bathroomList ) {
                    if($bathroomList->name == "5+")
                        $bathroomWhere = 	$bathroomWhere. "propertyInfo.bathrooms >= 5";
                    else
                        $bathroomWhere = 	$bathroomWhere. "propertyInfo.bathrooms = " . $bathroomList->name;
                    if ($i <= (sizeof ( $filterData->selectedBathroomList ) - 2)) {
                        $bathroomWhere = 	$bathroomWhere . " or ";
                    } else {
                        $bathroomWhere = 	$bathroomWhere . ")";
                    }

                    $i ++;
                } // echo $where;
                $this->db->where ( $bathroomWhere );
            }
            /*	if ($filterData->propertyNameList [0]->name != null) {
                    $propertyName = $filterData->propertyNameList [0]->name;
                    $propertyNameWhere = "property_name like '$propertyName%'";
                    $this->db->where ( $propertyNameWhere);
                }
                if($filterData->accomodatesList[0]->name != ""){
                    $guestCount=$filterData->accomodatesList[0]->name;

                }*/
            //$where = "accomodates='$guestCount'";
            //$this->db->where ( $where );
        }
        switch($sortBCriteria) {
            case "1" :
                $this->db->having ( "bedrooms = 1" );
                break;
            case "2" :
                $this->db->having ( "bedrooms = 2" );
                break;
            case "3" :
                $this->db->having ( "bedrooms = 3" );
                break;
            case "4" :
                $this->db->having ( "bedrooms = 4" );
                break;
            case "5" :
                $this->db->having ( "bedrooms >= 5" );
                break;
            case "All" :
                $this->db->having ( "bedrooms >= 1" );
                break;
            default :
                $this->db->having ( "bedrooms >= 1" );
                break;
        }
        $this->db->where('activation_flag','YES');

        $this->db->having ( "accommodates >= $guestCount" );

        $this->db->group_by ( array (
            "property.property_id"
        ) );
        switch($sortCriteria){

            case "propAToZ" :
                $this->db->order_by("property_name", "asc");
                break;
            case "propZToA" :
                $this->db->order_by("property_name", "desc");
                break;
            case "accLowToHigh" :
                $this->db->order_by("accommodates", "asc");
                break;
            case "accHighToLow" :
                $this->db->order_by("accommodates", "desc");
                break;
            case "bedLowToHigh" :
                $this->db->order_by("bedrooms", "asc");
                break;
            case "bedHighToLow" :
                $this->db->order_by("bedrooms", "desc");
                break;
            default;
                $this->db->order_by("property_name", "asc");
                break;
        }
        //return $this;

        $roomAvailableInfo = $this->db->get ();
        $roomAvailableInfoResult = $roomAvailableInfo->result ();
        return ($roomAvailableInfoResult);
    }
    /* checkRoomAvailabilty ends here */

    /* Check properties which are booked during the selected time frame - STARTS */
    public function checkRoomBooked($searchArray) {
        $reservationTable = 'reservation';
        $checkout = $searchArray ['checkOut'];
        $checkin = $searchArray ['checkIn'];
        //	$guestCountstring = $searchArray ['guestCount'];
        //$guestCount = ( int ) substr ( $guestCountstring, 7 );
        //return $checkin." " . $checkout . $reservationTable  ;
        $this->db->select ( " property_id, sum(accomodates) as booked " );
        $this->db->from ( " $reservationTable res " );
        $dateConditions = " (";
        $dateConditions .= "( res.check_in <= '$checkin' AND ( (res.check_out >= '$checkin' AND res.check_out <= '$checkout') OR res.check_out >= '$checkout' ))";
        $dateConditions .= " OR ( (res.check_in >= '$checkin' AND res.check_in <= '$checkout') AND ( (res.check_out >= '$checkin' AND res.check_out <= '$checkout') OR res.check_out >= '$checkout' ) ) ";
        $dateConditions .= ") ";

        //$this->db->having(" $dateConditions");
        $this->db->where ( $dateConditions );

        $roomAvailableInfo = $this->db->get ();
        $roomAvailableInfoResult = $roomAvailableInfo->result ();

        return $roomAvailableInfoResult;
    }
    /* Check properties which are booked during the selected time frame - ENDS */

    /* this function gets property detail on click on particular property of search.html */
    public function getPropertyDetail($propertyId) {
        $this->db->select ( 'property_name as propertyName,description,image_path as imagePath,concat(street,\',\',city,\',\',state,\',\',postal_code) as propertyAddress,how_to_reach as Direction, ' );
        $this->db->from('property');
        $this->db->where("property_id = $propertyId ");
        $query = $this->db->get();
        return $query->result();
    }
    public function getPropertyInfoDetail($propertyId) {
        $this->db->select ( 'property_type_id, bedrooms, bathrooms, pool, meals, internet_access, television_access as television, pet_friendly, air_condition, in_house_kitchen, other_amenities, leisureActivities, accommodates,   ' );
        $this->db->from ( "property" );
        $this->db->join ( "property_info", "property.property_id = property_info.property_id" );
        $this->db->where("property_info.property_id = $propertyId");
        $query = $this->db->get();
        return $query->result();
    }
    public function getPropertyType($property_type) {
        $this->db->select ("property_type_name");
        $this->db->from ( "property_type" );
        $this->db->where("property_type_id = $property_type");
        $query = $this->db->get();
        return $query;
    }
    public function getlatlongById($byid) {
        $this->db->select ( "latitude,longitude" );
        $this->db->from ( "property_info" );
        $this->db->where ( 'property_id', $byid );
        $query = $this->db->get ();
        return $query->row ();
    }
    /* this function gives accomodation type as abhk/2 bhk */
    public function getAccomodationType($propertyId) {
        $roomTable = 'room';
        $accomodationTable = 'accomodationtype';
        if ($propertyId != null) {
            $this->db->select ( 'distinct(room.accomodation_type_id)as accomodationTypeId,acc.accomodation_type_name as accomodationTypeName' );
            $this->db->from ( "$roomTable room" );
            $this->db->join ( "$accomodationTable acc", "acc.accomodation_type_id==room.accomodation_type_id" );
            $query = $this->db->get_where ( 'property', array (
                'room.property_id' => $propertyId
            ) );
        } else {
            $this->db->select ( 'accomodation_type_id as accomodationTypeId,accomodation_type_name as accomodationTypeName' );
            $this->db->from ( "$accomodationTable" );
            $query = $this->db->get ();
        }

        return $query->result ();
    }
    /* this function gives rooms available for particular is ,for it's particular accomodation type */
    public function getRoomAvailabilityCount($searchArray, $filterData) {
        $reservationTable = 'reservation';
        $accomodationTable = 'accomodationtype';
        $propertyTable = 'property';
        $propertyInfo = 'property_info';
        $roomTable = 'room';

        $checkout = $searchArray ['checkOut'];
        $checkin = $searchArray ['checkIn'];
        $guestCountstring = $searchArray ['guestCount'];
        $guestCount = ( int ) substr ( $guestCountstring, 7 );
        $propertyType = $searchArray ['propertyType'];
        $destination = $searchArray ['destination'];


        $this->db->select ( "count(*) as count,(propertyInfo.accommodates-IFNULL(sum(res.accomodates), 0)) as availableAccomodes" );
        $this->db->from ( "$propertyInfo propertyInfo " );
        $dateConditions = " ( ";
        $dateConditions = $dateConditions . " ( res.check_in <= '$checkin' AND ( res.check_out >= '$checkin' OR res.check_out >= '$checkout' ) )";
        $dateConditions = $dateConditions . " OR ( (res.check_in >= '$checkin' AND res.check_in <= '$checkout') AND (res.check_out <='$checkout' OR res.check_out >='$checkout')) ";
        $dateConditions = $dateConditions . " ) ";
        //echo $dateConditions;
        $this->db->join ( "$reservationTable res", "res.property_id=propertyInfo.property_id   ", "left outer" );//and $dateConditions
        $this->db->join ( "$propertyTable property", "propertyInfo.property_id=property.property_id" );
        $where = "(city  like '%$destination%' or state like '%$destination%')";
        $this->db->where ( $where );
        $this->db->where ('activation_flag','YES');

        if ($propertyType != '0') {
            $where = "(property_type_id='$propertyType')";
            $this->db->where ( $where );
        }

        $i = 0;

        if ($filterData != null) {

            if (sizeof ( $filterData->selectedstarRateList ) != 0) {

                $starRateWhere = "(";
                foreach ( $filterData->selectedstarRateList as $starList ) {
                    // $this->db->or_where('property.star_rate', $starList->name);

                    $starRateWhere = $starRateWhere . "property.star_rate=" . $starList->name;
                    if ($i <= (sizeof ( $filterData->selectedstarRateList ) - 2)) {
                        $starRateWhere = $starRateWhere . " or ";
                    } else {
                        $starRateWhere = $starRateWhere . ")";
                    }

                    $i ++;
                }
                $this->db->where ( $starRateWhere );
            }

            $i = 0;
            if (sizeof ( $filterData->selectedPropertyTypeList) != 0) {

                $propertyTypewhere = "(";
                foreach ( $filterData->selectedPropertyTypeList as $propertyTypeList ) {
                    // $this->db->or_where('property.star_rate', $starList->name);
                    $propertyTypewhere = $propertyTypewhere . "property.property_type_id=" . $propertyTypeList->propertyTypeId;
                    if ($i <= (sizeof ( $filterData->selectedPropertyTypeList ) - 2)) {
                        $propertyTypewhere = $propertyTypewhere . " or ";
                    } else {
                        $propertyTypewhere = $propertyTypewhere . ")";
                    }

                    $i ++;
                }
                $this->db->where ( $propertyTypewhere);
            }

            $i = 0;

            if (sizeof ( $filterData->selectedFeatureList ) != 0) {

                $where = "(";
                foreach ( $filterData->selectedFeatureList as $featureList ) {
                    // $this->db->or_where('property.star_rate', $starList->name);
                    $where = $where . "`propertyInfo`.`$featureList->name`='Yes'";
                    if ($i <= (sizeof ( $filterData->selectedFeatureList ) - 2)) {
                        $where = $where . " or ";
                    } else {
                        $where = $where . ")";
                    }

                    $i ++;
                }
                $this->db->where ( $where );
            }

            if (sizeof ( $filterData->selectedFacilityList ) != 0) {

                $facilityWhere = "(";
                foreach ( $filterData->selectedFacilityList as $facilityList ) {
                    // $this->db->or_where('property.star_rate', $starList->name);
                    $facilityWhere = $facilityWhere . "`propertyInfo`.`$facilityList->name`='Yes'";
                    if ($i <= (sizeof ( $filterData->selectedFacilityList ) - 2)) {
                        $facilityWhere = $facilityWhere . " or ";
                    } else {
                        $facilityWhere = $facilityWhere . ")";
                    }

                    $i ++;
                } // echo $where;
                $this->db->where ( $facilityWhere );
            }

            if (sizeof ( $filterData->selectedBathroomList ) != 0) {

                $bathroomWhere = "(";
                foreach ( $filterData->selectedBathroomList as $bathroomList ) {
                    if($bathroomList->name == "5+")
                        $bathroomWhere = 	$bathroomWhere. "propertyInfo.bathrooms >= 5 ";
                    else
                        $bathroomWhere = 	$bathroomWhere. "propertyInfo.bathrooms = " . $bathroomList->name;
                    if ($i <= (sizeof ( $filterData->selectedBathroomList ) - 2)) {
                        $bathroomWhere = 	$bathroomWhere . " or ";
                    } else {
                        $bathroomWhere = 	$bathroomWhere . ")";
                    }

                    $i ++;
                } // echo $where;
                $this->db->where ( $bathroomWhere );
            }

            /*	if ($filterData->propertyNameList [0]->name != null) {
                    $propertyName = $filterData->propertyNameList [0]->name;
                    $where = "property_name like '$propertyName%'";
                    $this->db->where ( $where );
                }*/
        } else {
        }

        $this->db->having ( "availableAccomodes >= $guestCount" );

        $roomAvailableInfo = $this->db->get ();

        $roomAvailableCount = $roomAvailableInfo->row()->count;
        return $roomAvailableCount;
    }
    public function verifyDuplicateIPData($ip_address, $date_visited) {
        $visitorTable = 'visitors_info';
        $this->db->select ( " COUNT(visitor_id)as count" );
        $this->db->from ( "$visitorTable visitor" );
        $where = "visitor_ip = '$ip_address' AND date_visited = '$date_visited'";
        $this->db->where ( $where );

        $result = $this->db->get ();
        $resultCount = $result->row ()->count;

        return $resultCount;
    }
    public function insertVisitorData($visitorData) {
        $visitorTable = 'visitors_info';
        $query = $this->db->insert ( $visitorTable, $visitorData );
    }
    public function getVisitorCount() {
        $visitorTable = 'visitors_info';
        $query = $this->db->select ( 'count(distinct visitor_ip) as count' );
        $this->db->from ( "$visitorTable" );
        $this->db->where ( 'date_visited', date ( 'Y-m-d' ) );
        $query = $this->db->get ();
        return $query->row ()->count;
    }
    /* this function gives last minute deal data */
    public function getlastMinDeal() {
        $currentDate = date ( 'Y-m-d' );
        $propertyTable = 'property';
        $auditRentTable = 'audit_rent';
        $this->db->select ( "property.property_name as name,auditRent.rent_description as des,property.image_pathas imagePath" );
        $this->db->from ( "$propertyTable property" );
        $this->db->join ( "$auditRentTable auditRent", "auditRent.property_id=property.property_id" );
        $where = "start_date<= '$currentDate' AND end_date <='$currentDate'";
        $this->db->where ( $where );
        $this->db->order_by ( 'rent_id', 'desc' );
        $query = $this->db->get ();
        $lastMinDealData = $query->result ();
        return $lastMinDealData;
    }
    /* this function gives owner detail particular to proprty */
    public function getOwnerDetail($propertyId) {
        $pid = $propertyId;
        $ownerInfoTable = 'property_owner_info';
        $propertyTable = 'property';
        $this->db->select ( " owner_name as name,phone,email,property_name as propertyName " );
        $this->db->from ( " $ownerInfoTable  owner" );
        $this->db->join ( " $propertyTable property ", " owner.property_id=property.property_id " );
        $this->db->where ( "property.property_id = '". $pid ."'" );
        $query 	= $this->db->get ();
        $retVal = $query->result ();
        return ($retVal);

    }
    /* this function gives message content from db depending upon message type */
    public function getmessageContent($messageType) {
        $templateMessageTable = 'msg_template_table';
        $this->db->select ( "template_content as message_content,template_id" );
        $this->db->from ( "$templateMessageTable" );
        $this->db->where ( 'type', $messageType );
        $query = $this->db->get ();
        return $query;
    }
    /* this function gives room reant per property per accomodation Type */
    public function getroomRentDetail($propertyId) {
        $roomTable = 'room';
        $accomodationTable = 'accomodationtype';
        $this->db->select ( "base_price as basePrice,price_per_adult as adultPrice,price_per_child as childPrice,accomodation_type_name as accomodation,room_capacity as capacity" );
        $this->db->from ( "$roomTable room" );
        $this->db->join ( "$accomodationTable acc", "acc.accomodation_type_id=room.accomodation_type_id" );

        $this->db->where ( "property_id", $propertyId );
        $query = $this->db->get ();
        return $query->result ();
    }
    /* this function inserts registration data in registration table */
    public function insertRegistrationData($registerData) {
        $registrationTable = 'registration';
        $query = $this->db->insert ( $registrationTable, $registerData );
    }
    /* this function checks registration table for username and password availability */
    public function authenticate($username, $password, $accestype) {
        $registrationTable = 'registration';
        $this->db->select ( 'count(*) as user_count,user_id, Gender ' );
        $this->db->from ( $registrationTable );
        $this->db->where ( 'user_name', $username );
        $this->db->where ( 'password', $password );
        $this->db->where ( 'access_type', $accestype );
        $query = $this->db->get ();

        return $query->row ();
    }
    public function getUser($user) {
        $this->db->select ( "CONCAT(first_name,' ',last_name) as name, email_address" );
        $this->db->from ( "registration" );
        $this->db->where ( 'user_id', $user );
        $query = $this->db->get ();
        return $query->row ();
    }
    /* this function inserts username,pass and datetime in login table */
    public function insertLoginData($loginData) {
        $loginTable = 'login';
        $query = $this->db->insert ( $loginTable, $loginData );
        $lastId = $this->db->insert_id ();
        return $lastId;
    }
    public function deleteLoginUser($last_user_id) {
        $this->db->where('login_id', $last_user_id);
        $this->db->delete('login');
    }
    /* this function used to fetch proprty images randomly */
    public function galleryImgFetch() {
        $propertyTable = 'property';
        $propertyInfoTable = 'property_info';
        $this->db->select ( 'property.property_id,image_path,property_name,description' );
        $this->db->from ( " $propertyTable property " );
        $this->db->join ( " $propertyInfoTable propertyInfo", "property.property_id=propertyInfo.property_id" );
        $this->db->where ( 'activation_flag', 'YES');
        $this->db->where ( 'Featured', 'Yes');

        $d=date("y-m-d");
        $where = " ( Featured_startDate <= '$d' and Featured_endDate >='$d' )";
        $this->db->where ( $where );
        $this->db->order_by ( 'Featured_startDate Desc' );
        //$this->db->limit ( 6 );
        $query = $this->db->get();

        return $query->result();
    }
    /* this function inserts data in enquiry table */
    public function insertEnquiryData($enquiryData) {
        $enquiryTable = 'enquiry';
        $query = $this->db->insert ( $enquiryTable, $enquiryData );
    }
    /* this function used to retrive values fron registration table based on cokkie value */
    public function getLogedInUserDetails($user_name) {
        $registrationTable = 'registration';
        $this->db->select ( 'user_name,email_address,mobile_number' );
        $this->db->from ( $registrationTable );
        $this->db->where ( 'user_name', $user_name );
        $query = $this->db->get ();

        return $query->result ();
    }

    /* Get Destination details based on text entered by user on index1 screen */
    public function destinationFetch($dest){
        $registrationTable = 'property';
        $this->db->select ( 'property_name, street, city, state' );
        $this->db->from ( $registrationTable );

        $where = " ( property_name like '%$dest%' or street like '%$dest%' or city like '%$dest%' or state like '%$dest%' )";
        $this->db->where ($where );
        $query = $this->db->get ();

        return $query->result ();
    }

    /* submit review */
    public function submitReview($reviewArray) {
        $this->db->insert ( 'customer_reviews', $reviewArray );
        $lastId = $this->db->insert_id ();
        return $lastId;
    }
    /* end submit review */
    public function getReviewsByPropertyId($property_id) {
        $this->db->select ( "customer_name,DATE_FORMAT(check_in, '%d/%m/%Y') check_in,DATE_FORMAT(check_out, '%d/%m/%Y') check_out,star_rating,review_text" );
        $this->db->from ( 'customer_reviews' );
        $this->db->where ( 'property_id', $property_id );
        $this->db->order_by ( "review_id", "desc" );
        $query = $this->db->get ();
        return $query->result ();
    }
    /* end get Reviews By PropertyId */
    /* available accomodates */
    public function getAvailableAccomodates($property_id) {
        $is_reserved = $this->db->query ( "SELECT reservation_id FROM reservation WHERE check_out > NOW() AND property_id = $property_id" );
        if ($is_reserved->result_array ()) {
            $query = $this->db->query ( "SELECT (P.accommodates - SUM(R.accomodates)) accomodates 
						  FROM property_info P INNER JOIN reservation R ON P.property_id = R.property_id 
						  WHERE P.property_id = $property_id AND R.check_out > NOW()" );
            $query1 = $query->result_array ();
            foreach ( $query1 as $num ) {
                return $num ['accomodates'];
            }
        } else {
            $query2 = $this->db->query ( "SELECT P.accommodates accomodates FROM property_info P WHERE P.property_id = $property_id" );
            $query3 = $query2->result_array ();
            foreach ( $query3 as $num ) {
                return $num ['accomodates'];
            }
        }
    }
    /* //available accomodates */
    /*GET AVALIABLE NO OF ACCOMODATES FOR PARTICULAR PEOPERTY FOR SPECIFIC CHECKIN & CHECKOUT DATE*/
    public function getAvailablePropertyAccomodatesCount($confirmArray) {
        $reservationTable = 'reservation';
        $propertyTable = 'property';
        $propertyInfo = 'property_info';


        $checkout = $confirmArray ['checkOut'];
        $checkin = $confirmArray ['checkIn'];
        $guestCount = $confirmArray ['accomodates'];
        $propertyId = $confirmArray ['propertyId'];

        $this->db->select ( "(propertyInfo.accommodates-IFNULL(sum(res.accomodates), 0)) as availableAccomodes" );
        $this->db->from ( "$propertyInfo propertyInfo" );
        $this->db->join ( "$reservationTable res", "res.property_id=propertyInfo.property_id", "left" );
        $this->db->join ( "$propertyTable property", "propertyInfo.property_id=property.property_id" );

        $where = "(res.property_id is Null";
        $this->db->where ( $where );
        $where = "(check_out >= '$checkout' AND check_in >='$checkin')";
        $this->db->or_where ( $where );
        $where = "(check_out <= '$checkout' AND check_out <='$checkout'))";
        $this->db->or_where ( $where );
        $where = "(propertyInfo.property_id='$propertyId')";
        $this->db->where ( $where );

        $roomAvailableInfo = $this->db->get ();
        $roomAvailableCount = $roomAvailableInfo->row ()->availableAccomodes;
        return $roomAvailableCount;
    }
    //getAvailablePropertyAccomodatesCount ENDS HERE

    public function booking($reservationArray){
        $reservationTable="reservation";
        $this->db->insert($reservationTable,$reservationArray);
        $afftectedRows = $this->db->affected_rows();
        return  $afftectedRows;
    }
    public function getBookingProperty($p_id){
        $this->db->select("property_name,image_path");
        $this->db->from("property");
        $this->db->where("property_id", $p_id);
        $query = $this->db->get();
        return $query->row();
    }
    public function getPropertyTypeList(){
        $propertyTable = 'property_type';

        $this->db->select ( 'property_type_id as propertyTypeId,property_type_name as propertyTypeName' );
        $this->db->from ( "$propertyTable" );
        $query = $this->db->get ();
        return $query->result ();
    }
    public function getPropertyListing(){
        $propertyTable = 'property';
        $propertyInfoTable = 'property_info';
        $this->db->select( '* ' );
        $this->db->from( " $propertyTable property " );
        $this->db->join( " $propertyInfoTable propertyInfo", "property.property_id = propertyInfo.property_id" );
        $query = $this->db->get ();
        return $query->result ();
    }

//    public function getQuickSearchCount($name){
//        $propertyTable = 'property';
//        $this->db->select ( '*' );
//        $this->db->from ( " $propertyTable property " );
//        $this->db->where ( 'state', $name);
//        $query = $this->db->get ();
//        return $query->result ();
//    }
//
//    public function getQuickSearchData($limit,$id,$name){
//        $propertyTable = 'property';
//        $propertyInfoTable = 'property_info';
//        $this->db->select ( '*' );
//        $this->db->from ( " $propertyTable property " );
//        $this->db->join ( " $propertyInfoTable propertyInfo", "property.property_id=propertyInfo.property_id" );
//        $this->db->limit($limit);
//        $this->db->where ('property_type_id',$id);
//        $query = $this->db->get ();
//        return $query->result ();
//    }
    public function getQuickSearchCount($name){
        $propertyTable = 'property';
        $propertyInfo = 'property_info';
        $this->db->select( '*' );
        $this->db->from(" $propertyTable property ");
        $this->db->join ( "$propertyInfo propertyInfo", "property.property_id = propertyInfo.property_id", "left" );
        $this->db->where( 'state', $name);
        $query = $this->db->get();
        return $query->result();
    }

    public function getQuickSearchData($limit=null,$offset=NULL,$name){
//        $query = $this->db->get('property', $limit, $offset);
//        return $query->result_array();
        $propertyTable = 'property';
        $propertyInfo = 'property_info';
        $this->db->select( '*' );
        $this->db->from(" $propertyTable property ");
        $this->db->join ( "$propertyInfo propertyInfo", "property.property_id = propertyInfo.property_id", "left" );
        $this->db->limit($limit, $offset);
        $this->db->where( 'state', $name);
        $query = $this->db->get();
        return $query->result();
    }
    public function getFeaturedSearchCount(){
        $propertyTable = 'property';
        $propertyInfoTable = 'property_info';
        $this->db->select( '* ' );
        $this->db->from( " $propertyTable property " );
        $this->db->join( " $propertyInfoTable propertyInfo", "property.property_id = propertyInfo.property_id" );
        $this->db->where( 'activation_flag', 'YES');
        $this->db->where( 'Featured', 'Yes');
        $d = date("y-m-d");
        $where = " ( Featured_startDate <= '$d' and Featured_endDate >='$d' )";
        $this->db->where ( $where );
        $this->db->order_by ( 'Featured_startDate Desc' );
        //$this->db->limit ( 6 );
        $query = $this->db->get();

        return $query->result();

    }
    public function getFeaturedSearchData($limit=null,$offset=NULL){
        $propertyTable = 'property';
        $propertyInfoTable = 'property_info';
        $this->db->select( '* ' );
        $this->db->from( " $propertyTable property " );
        $this->db->join( " $propertyInfoTable propertyInfo", "property.property_id = propertyInfo.property_id" );
        $this->db->where( 'activation_flag', 'YES');
        $this->db->where( 'Featured', 'Yes');
        $d = date("y-m-d");
        $where = " ( Featured_startDate <= '$d' and Featured_endDate >='$d' )";
        $this->db->where ( $where );
        $this->db->order_by ( 'Featured_startDate Desc' );
        $this->db->limit($limit, $offset);
        $query = $this->db->get();

        return $query->result();

    }
}
