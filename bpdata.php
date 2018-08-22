<?php
 require('saprfc.php');

   include('connection.php');

 $result = $sap->callFunction("ZBAPI_GET_DETAILS",
        array(

            array("IMPORT", "IDNUMBER",$idportal),
            
            array("TABLE", "ITAB", array())

        ));



   // Call successfull?
    if ($sap->getStatus() == SAPRFC_OK) {
    // Yes, print out the Userlist
    //echo "Success". '<br>'.'<br>';
    foreach ($result["ITAB"] as $list) {
    //echo "<tr><td>", $list["object"],"</td><td>",$user["TITLE"],"</td></tr>";
    //echo $list["OBJECT_ID"]. '<br>'.'<br>';
    $bpnumber = $list["PERS_NO"];
	$firstname = $list["FIRSTNAME"];
	$lastname = $list["LASTNAME"];
	$middlename = $list["MIDDLENAME"];
	$phone = $list["TEL1_NUMBR"];
	$mail = $list["E_MAIL"];
	$houseno = $list["HOUSE_NO"];
	$street = $list["STREET"];
	$city = $list["CITY"];
	
	

	}
	} else {


        // No, print long Version of last Error
        $sap->printStatus();
        // or print your own error-message with the strings received from
        $sap->getStatusText() or $sap->getStatusTextLong();
    }

    //Logoff/Close saprfc-connection LL/2001-08
    $sap->logoff();

    return $result;
    //}
	


	    ?>