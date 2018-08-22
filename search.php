<?php session_start();?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">

<link rel="stylesheet" href="resources/bootstrap.min.css">
<link rel="stylesheet" href="resources/jquery-ui.css">

<script src="resources/jquery-1.12.4.js"></script>
<script src="resources/jquery-ui.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<head>
    <title>Ministry of Environment, Water and Climate</title>
</head>
 <div class="w3-container  w3-green">
        <h2 align="center">Ministry of Environment, Water and Climate</h2>
    </div>
    <div class="w3-padding"><h4 align="center">WEATHER DATA SUBSCRIPTION FORM</h4></div>
	


<div class="w3-container w3-border app">
<?php

include ('../bpdata.php');

$_GET['username'];
$idportal = $_GET['username'];
$_SESSION['IDPORTAL'] = $idportal;

//echo $idportal;   

if (isset($_POST['SUBMIT'])) 
{
	
//require('saprfc.php');
include('../connection.php');
  
$result = $sap->callFunction("ZBAPI_COMPANY_DETAILS",
array(

array("IMPORT", "COMPANYNUMBER", $_POST['COMPANYNUMBER']),

array("TABLE", "ITAB", array())

));

    // Call successfull?
    if ($sap->getStatus() == SAPRFC_OK) {
    // Yes, print out the Userlist
    //echo "Success". '<br>'.'<br>';
    foreach ($result["ITAB"] as $list2) {
    //echo "<tr><td>", $list["object"],"</td><td>",$user["TITLE"],"</td></tr>";
    //echo $list["OBJECT_ID"]. '<br>'.'<br>';
    //$service_order = $list["OBJECT_ID"];

}


	
$name1 = $list2["NAME"];
$name2 = $list2["NAME_2"];
$name3 = $list2["NAME_3"];
$name4 = $list2["NAME_4"];
$houseno1 = $list2["HOUSE_NO"];
$street1 = $list2["STREET"];
$city1 = $list2["CITY"];
$phone1 = $list2["TEL1_NUMBR"];
$telephone1 = $list2["TEL1_EXT"];
$company = $_POST['COMPANYNUMBER'];
$idportal = $_POST['NATIONAL_ID'];




        if (isset($_POST['company'])) {


			 $_SESSION['COMPANYNUMBER'] = $_POST['COMPANYNUMBER'];
			 $_SESSION['NATIONAL_ID'] = $_POST['NATIONAL_ID'];
			 
        }

        If($list2["NAME"] != "") {
			
	

		?>

            <div align="center">
                <div class="w3-panel w3-pale-green w3-leftbar w3-rightbar w3-border-green">
                    <p>
                    <table>
                        <tr>
                            <table cellpadding="3" cellspacing="3" align="center" border="0">
                                <tr>
                                    <td>Company Name&nbsp;&nbsp;</td>
                                    <td><?php echo $name . '' . $name1 . '' . $name2 . '' . $name3 . '' . $name4; ?> </td>
                                </tr>
                                <tr>
                                    <td>House Number&nbsp;&nbsp;</td>
                                    <td><?php echo $houseno1; ?></td>
                                </tr>
                                <tr>
                                    <td>Street Name&nbsp;&nbsp;</td>
                                    <td><?php echo $street1; ?></td>
                                </tr>

                                <tr>
                                    <td>City&nbsp;&nbsp;</td>
                                    <td><?php echo $city1; ?></td>
                                </tr>

                                <tr>
                                    <td>Telephone&nbsp;&nbsp;</td>
                                    <td><?php echo $phone1; ?></td>
                                </tr>
                                <tr>
                                    <td>Other Phone&nbsp;&nbsp;</td>
                                    <td><?php echo $telephone1; ?></td>
                                </tr>

                            </table>

                        </tr>
                    </table>
                    </p>
                </div>
		
                <form method="post" action="company.php" class="w3-container">
    					 <input type="hidden" name="COMPANYNUMBER" value="<?php echo $company; ?>"/>
					  <input type="hidden" name="NATIONAL_ID" value="<?php echo $idportal; ?>"/>

                    <p align="center">
                        <input class="w3-btn  w3-green" type="submit" name="company" value="Thank you for verifying your company
            details.
            Click next to continue"/>
                    </p>

                </form>
            </div>
            <?php
        }else{


        ?>

        <div align="center">
            <div align="center">
                <div class="w3-panel w3-pale-green w3-leftbar w3-rightbar w3-border-green">
                    <p>
                    <table>
                        <tr>
        <a href="index.php"> <button class="w3-red w3-btn">Company Details not found <br />Please retry or apply as an individual</button></a>

       </tr></table><br /></div>
        </div>
            <?php

}

    

    }else{

    // No, print long Version of last Error
    $sap->printStatus();
    // or print your own error-message with the strings received from
    $sap->getStatusText() or $sap->getStatusTextLong();
}

//Logoff/Close saprfc-connection LL/2001-08
$sap->logoff();

return $result;
//}


}



?>
    <div class="w3-card-4">

 
  <form method="post" action="search.php" class="w3-container">
	   
	<table align="center">
	<tr><td>
	<p align="center">
 		<h3 class="w3-text-red" ><b>N.B Please input your Company Number and click continue</b></h3>
		</P>
	<p>
						
                            <label class="w3-label w3-text-black"><b>Company Number</b></label>
                            <input class="w3-input w3-border w3-light-grey" name="COMPANYNUMBER"  type="text" 
							placeholder="Company Number"  required   >
							
							 <input type="hidden" name="NATIONAL_ID" value="<?php echo $idportal; ?>"/>
							
                        <p>

					<input class="w3-btn  w3-green" type="submit" name="SUBMIT"   value="Click to continue"/>
					
                </p>

            </p>
			
</td></tr>
</table>
</form>

<table align="left">  <tr><td>
<p >
<a href="index.php"> <button class="w3-green w3-btn">Go Back</button></a>

</p>
</td></tr></table>
</div>


</div>


</body>
</html>


<?php

?>