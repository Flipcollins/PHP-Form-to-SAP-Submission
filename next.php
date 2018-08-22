<?php
session_start();

	$_SESSION["FIRST_NAME"] = $_POST["firstname"];
	$_SESSION["LAST_NAME"] = $_POST["lastname"];
	$_SESSION["TELEPHONE"] = $_POST["telephone"];
	
$service_order = $_SESSION['SERVICE_ORDER'];
?>
<html xmlns="http://www.w3.org/1999/html">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>

<head>
    <title>Uploading Files</title>

</head>

<body>


<div>


     <div class="w3-container  w3-green">
        <h2 align="center">Ministry of Environment, Water and Climate</h2>
        <h5 align="center">Ozone Department</h5>
    </div>
    <div class="w3-padding"><h4 align="center">WEATHER DATA SUBSCRIPTION FORM</h4></div>

    <table align="center" width="600">
        <tr>
            <td>
                <div class="w3-panel w3-pale-red w3-leftbar w3-border-red" align="center">
                    <p>
                        <b>Thank you for applying</b></p>
                </div>
                <?php
                //proof of payment
                $filename = $_FILES["file"]["name"];
                $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
                $file_ext1 = substr($filename, strripos($filename, '.')); // get file name
                $filesize = $_FILES["file"]["size"];
                $allowed_file_types = array('.pdf', '.doc', '.docx', '.rtf', '.jpg', '.png', '.jpeg', '.gif','.bmp','.tif','.xls');

               //other
                $filename1 = $_FILES["file1"]["name"];
                $file_basename = substr($filename1, 0, strripos($filename1, '.')); // get file extention
                $file_ext2 = substr($filename1, strripos($filename1, '.')); // get file name
                $filesize = $_FILES["file1"]["size"];
                $allowed_file_types = array('.pdf', '.doc', '.docx', '.rtf', '.jpg', '.png', '.jpeg', '.gif','.bmp','.tif','.xls');

                //other2
                $filename2 = $_FILES["file2"]["name"];
                $file_basename = substr($filename2, 0, strripos($filename2, '.')); // get file extention
                $file_ext3 = substr($filename2, strripos($filename2, '.')); // get file name
                $filesize = $_FILES["file2"]["size"];
                $allowed_file_types = array('.pdf', '.doc', '.docx', '.rtf', '.jpg', '.png', '.jpeg', '.gif','.bmp','.tif','.xls');

                


                //Upload National ID

                if (in_array($file_ext1, $allowed_file_types) && ($filesize < 10000000)) {
                    // Rename file
                    $newfilename = $service_order . idupload1 . $file_ext1;
                    if (file_exists("documents/" . $newfilename)) {
                        // file already exists error
                        echo "<b>Proof of payment has already been uploaded</b>";
                        echo "<br />";
                    } else {
                        move_uploaded_file($_FILES["file"]["tmp_name"], "documents/" . $newfilename);
                        echo "<b>Proof of payment has been uploaded successfully</b>";
                        echo "<br />";
                    }
                } elseif (empty($file_basename)) {
                    // file selection error
                    //echo "Please select a file to upload.";
                } elseif ($filesize > 10000000) {
                    // file size error
                    echo "<b>Proof of payment file size is too large</b>";
                    echo "<br />";
                } else {
                    // file type error
                    echo "Only these file types are allowed for upload: " . implode(', ', $allowed_file_types);
                    unlink($_FILES["file"]["tmp_name"]);
                }


                //upload Proof of Payment or Deduction payment and stamp duty

                if (in_array($file_ext2, $allowed_file_types) && ($filesize < 10000000)) {
                    // Rename file
                    $newfilename1 = $service_order . idupload2 . $file_ext2;
                    if (file_exists("documents/" . $newfilename1)) {
                        // file already exists error
                        echo "<b>Other attachments(1) have already been uploaded</b>";
                        echo "<br />";
                    } else {
                        move_uploaded_file($_FILES["file1"]["tmp_name"], "documents/" . $newfilename1);
                        echo "<b>Other attachments(1) have been uploaded successfully</b>";
                        echo "<br />";
                    }
                } elseif (empty($file_basename)) {
                    // file selection error
                    //echo "Please select a file to upload.";
                } elseif ($filesize > 10000000) {
                    // file size error
                    echo "<b>Other attachments(1) file size is too large</b>";
                    echo "<br />";
                } else {
                    // file type error
                    echo "Only these file types are allowed for upload: " . implode(', ', $allowed_file_types);
                    unlink($_FILES["file1"]["tmp_name"]);
                }


                //upload lease agreement

                if (in_array($file_ext3, $allowed_file_types) && ($filesize < 10000000)) {
                    // Rename file
                    $newfilename2 = $service_order . idupload3 . $file_ext3;
                    if (file_exists("documents/" . $newfilename2)) {
                        // file already exists error
                        echo "<b>Other attachments(2) have already been uploaded</b>";
                        echo "<br />";
                    } else {
                        move_uploaded_file($_FILES["file2"]["tmp_name"], "documents/" . $newfilename2);
                        echo "<b>Other attachments(2) have been uploaded successfully</b>";
                        echo "<br />";
                    }
                } elseif (empty($file_basename)) {
                    // file selection error
                    //echo "Please select a file to upload.";
                } elseif ($filesize > 10000000) {
                    // file size error
                    echo "<b>Other attachments(2) file size is too large</b>";
                    echo "<br />";
                } else {
                    // file type error
                    echo "Only these file types are allowed for upload: " . implode(', ', $allowed_file_types);
                    unlink($_FILES["file2"]["tmp_name"]);
                }


               

                if (isset($_POST['submit'])) {
                    require('saprfc.php');

                    include('../connection.php');

                    //   require('saprfc.php');


                    $txt = $_POST['txt'];
                    $txt1 = $_POST['txt1'];
                    $txt2 = $_POST['txt2'];
					$txt3 = $_POST['txt3'];
					$txt4 = $_POST['txt4'];
					$txt5 = $_POST['txt5'];
					$txt6 = $_POST['txt6'];
                   
                    echo '<bold><h4 align = "center"><font color="green"> ';
                    echo 'Your online application has been created, your reference number is ' . $txt;
                    echo '</font></h4></b>';
                    //$filed =$_POST['.$file_ext1.'];
                    //$txt = '8000006805';
                    //var_dump($_FILES);
                    //exit;
                    //$pathto = $_FILES["file"]["tmp_name"];//$_POST['pathto'];
                    $pathto = $_POST['pathto'];
                    $result = $sap->callFunction("ZBAPI_WEATHER_SUBS_DOCS",
                        array(
                            array("IMPORT", "UPLOAD_ID", $txt),
                            array("IMPORT", "EXT1", $txt1),
                            array("IMPORT", "EXT2", $txt2),
							 array("IMPORT", "FIRSTNAME", $txt4),
							 array("IMPORT", "LASTNAME", $txt5),
                        array("IMPORT", "TELEPHONE", $txt6),
                            array("IMPORT", "EXT3", $txt3)));


                    // Call successfull?
                    if ($sap->getStatus() == SAPRFC_OK) {
                        // Yes, print out the Userlist
                        //echo "Success". '<br>'.'<br>';
                        //=> echo $pathto;
                    } else {


                        // No, print long Version of last Error
                        $sap->printStatus();
                        // or print your own error-message with the strings received from
                        $sap->getStatusText() or $sap->getStatusTextLong();
                    }

                    //Logoff/Close saprfc-connection LL/2001-08
                    $sap->logoff();

                    return $result;

                }



                 ?>
                 <br/>

                <form action="next.php" method="POST"/>

                <input type="checkbox" name="txt" value="<?php echo $_SESSION['SERVICE_ORDER']; ?>"
                       style="display:none" checked="checked"/>

                <input type="checkbox" name="txt1" value="<?php echo $file_ext1; ?>"
                       style="display:none" checked="checked"/>

                <input type="checkbox" name="txt2" value="<?php echo $file_ext2; ?>"
                       style="display:none" checked="checked"/>

                <input type="checkbox" name="txt3" value="<?php echo $file_ext3; ?>"
                       style="display:none" checked="checked"/>
					   
					    <input type="checkbox" name="txt4" value="<?php echo $_SESSION['FIRST_NAME']; ?>"
                       style="display:none" checked="checked"/>
					   
					   
					    <input type="checkbox" name="txt5" value="<?php echo $_SESSION['LAST_NAME']; ?>"
                       style="display:none" checked="checked"/>
					   
					    <input type="checkbox" name="txt6" value="<?php echo $_SESSION['TELEPHONE']; ?>"
                       style="display:none" checked="checked"/>

              


                <INPUT TYPE="HIDDEN" NAME="SUBMIT" VALUE="TRUE">
                <input class="w3-btn  w3-green" name="submit" type="submit"
                       value="Click to retrieve your online application reference number"/>
                </form>
                <br/>


                <div class="w3-panel w3-pale-red w3-leftbar w3-border-red" align="center">
                    <p>
                        <b>Retrive your online application reference number</b></p>
                </div>
            </td>
        </tr>
    </table>

</div>


</div>
</body>
</html>
