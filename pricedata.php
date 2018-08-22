<?php
/**
 * Created by PhpStorm.
 * User: Fah
 * Date: 6/12/2017
 * Time: 9:37 AM
 */


//require('saprfc.php');

include('../connection.php');

$ZMEWOD = 'ZMEWOD';
$ZEW5 = 'ZEW5';
$ZEW6 ='ZEW6';
$ZEW7 = 'ZEW7';
$ZEWST = 'ZEWST';
$ZEWSW = 'ZEWSW';


$result = $sap->callFunction("ZBAPI_GET_MINISTRY_ENV",
    array(

        array("IMPORT", "ZMEWOD", $ZMEWOD),
        array("IMPORT", "ZEW5", $ZEW5),
        array("IMPORT", "ZEW6", $ZEW6),
        array("IMPORT", "ZEW7", $ZEW7),
        array("IMPORT", "ZEWST", $ZEWST),
        array("IMPORT", "ZEWSW", $ZEWSW),



        array("TABLE", "ITAB_ZMEWOD", array()),
        array("TABLE", "ITAB_ZEWSW", array()),
        array("TABLE", "ITAB_ZEW6", array()),
        array("TABLE", "ITAB_ZEW7", array()),
        array("TABLE", "ITAB_ZEWST", array()),
        array("TABLE", "ITAB_ZEW5", array()),






    ));


// Call successfull?
if ($sap->getStatus() == SAPRFC_OK) {



    foreach ($result["ITAB_ZMEWOD"] as $list) {
        $ITAB_ZMEWOD = $list['KBETR'];
        // echo $ITAB_ZFILM;

    }

    foreach ($result["ITAB_ZEW5"] as $list) {
        $ITAB_ZEW5 = $list['KBETR'];
       // echo $ITAB_ZFEATURE;
    }

    foreach ($result["ITAB_ZEW6"] as $list) {
        $ITAB_ZEW6 = $list['KBETR'];
        // echo $ITAB_ZFEATURE;
    }


    foreach ($result["ITAB_ZEW7"] as $list) {
        $ITAB_ZEW7 = $list['KBETR'];
      //  echo $ITAB_ZADULT;
    }

    foreach ($result["ITAB_ZEWST"] as $list) {
        $ITAB_ZEWST = $list['KBETR'];
              // echo $ITAB_ZLOCALBAND;
    }

    foreach ($result["ITAB_ZEWSW"] as $list) {
        $ITAB_ZEWSW = $list['KBETR'];
       // echo $ITAB_ZEWSW;
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