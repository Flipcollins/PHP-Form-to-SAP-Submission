<?php session_start();
$_SESSION['COMPANYNUMBER'] = $_POST['COMPANYNUMBER'];
$_SESSION['NATIONAL_ID'] = $_POST['NATIONAL_ID'];


$idportal = $_SESSION['NATIONAL_ID'];
include('../bpdata.php');
include('pricedata.php');


?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">

<link rel="stylesheet" href="resources/bootstrap.min.css">
<link rel="stylesheet" href="resources/jquery-ui.css">
<link rel="stylesheet" href="resources/style.css">

<script src="resources/jquery-1.12.4.js"></script>
<script src="resources/jquery-ui.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">





<head>

    <title>Ministry of Environment, Water and Climate</title>


</head>
<body>
<a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>

<div>

    <div class="w3-container  w3-green">
        <h2 align="center">Ministry of Environment, Water and Climate</h2>
        <h5 align="center">Meteorological Services Department</h5>
    </div>

    <div class="w3-padding"><h4 align="center">WEATHER DATA SUBSCRIPTION FORM</h4></div>
    <body>
    <?php
    if (isset($_POST['SUBMIT'])){
    // require('saprfc.php');

    include('../connection.php');

    $result = $sap->callFunction("ZBAPI_WEATHER_SUBS",
        array(

            array("IMPORT", "IDNUMBER", $_POST['idnumber']),
            array("IMPORT", "BPNUMBER", $_POST['bpnumber']),
            array("IMPORT", "FIRSTNAME", $_POST['firstname']),
            array("IMPORT", "LASTNAME", $_POST['lastname']),
            array("IMPORT", "ADDRESS", $_POST['address']),

            array("IMPORT", "COMPANYNUMBER", $_POST['companynumber']),
            array("IMPORT", "APPTYPE", $_POST['APPTYPE']),
            array("IMPORT", "TELEPHONE", $_POST['telephone']),
            array("IMPORT", "EMAIL", $_POST['email']),
            array("IMPORT", "REGION", $_POST['region']),
          
            array("IMPORT", "ORGANISATION", $_POST['organisation']),
            array("IMPORT", "ORGADDRESS", $_POST['orgaddress']),
            array("IMPORT", "AMOUNTPAID", $_POST['amountpaid']),
            array("IMPORT", "STATUS", $_POST['status']),
            array("IMPORT", "BULLETIN", $_POST['bulletin']),
            array("IMPORT", "MAIL", $_POST['mail']),
            array("IMPORT", "MAIL_SUB", $_POST['mail_sub']),
            array("IMPORT", "WILL_COLLECT", $_POST['will_collect']),
            array("IMPORT", "WILL_COLLECT_SUB", $_POST['will_collect_sub']),
            array("IMPORT", "MAIL1", $_POST['mail1']),
            array("IMPORT", "MAIL_SUB1", $_POST['mail_sub1']),
            array("IMPORT", "WILL_COLLECT1", $_POST['will_collect1']),
            array("IMPORT", "WILL_COLLECT_SUB1", $_POST['will_collect_sub1']),
			
            array("EXPORT", "SERVICE_ORDER", $service_order),
            array("TABLE", "ITAB", array())


        ));


    // Call successfull?
    if ($sap->getStatus() == SAPRFC_OK) {
    // Yes, print out the Userlist
    //echo "Success". '<br>'.'<br>';
    foreach ($result["ITAB"] as $list) {
    //echo "<tr><td>", $list["object"],"</td><td>",$user["TITLE"],"</td></tr>";
    //echo $list["OBJECT_ID"]. '<br>'.'<br>';
    $service_order = $list["OBJECT_ID"];


    $_SESSION["SERVICE_ORDER"] = $service_order;
    if ($_POST['status'] == 'Z2'){

    $sum = $_POST['mail_sub'] + $_POST['will_collect_sub'] + $_POST['mail_sub1'] + $_POST['will_collect_sub1'];

    ?>
    <div class="w3-container">
        <h4 align="center"><font color="#228b22"><b>Thank you for submitting your application details.<br/>Your online application reference number
                    is <?php echo $list["OBJECT_ID"]; ?>
                </b></font></h4>
    </div>
    <div class="w3-container w3-center">

 <form method="post" action="https://paynow.pfms.gov.zw/paynow/do.payment.php" id="form"  >

                    <div align="center">
                    <table align="center" class="w3-table">

 
                        <tr>

                            <td><input type="hidden" name="amount"
                                       value="<?php  echo $sum;  ?>"
                                       />
                            </td>
                        </tr>
                        <tr>

                            <td><input required type="checkbox" name="desc"
                                       value="<?php echo $list["OBJECT_ID"]; ?>"
                                       style="display:none" checked="checked"/></td>
                        </tr>
                        <tr>

                            <td><input required type="checkbox" name="email"
                                       value="<?php echo $_POST['email']; ?>"
                                       style="display:none" checked="checked"/></td>
                        </tr>
                        <tr>

                            <td><input required type="checkbox" name="mobile"
                                       value="<?php echo $_POST['telephone'];?>"
                                       style="display:none" checked="checked"/></td>
                        </tr>
						
						    <tr>


                        </tr>

                    </table>
                    <!--<input required type="hidden" name ="merchantkey" value="e0be1737-6ea2-490c-8a22-9fec8428025d">
                    <input required type="hidden" name ="ministrycode" value="0000">-->
                    <input required type="hidden" name="ministrycode" value="U022">
                    <input required type="hidden" name="app" value="ZEW2">
                    <input required type="hidden" name="id" value="<?php echo $_POST['idnumber']; ?>">
                    <p><b><font color="red"> NB : Click to finalize your application payment</font></b></p>
                    <input class="w3-btn  w3-red" type="submit" value="Process Final Payment via PAYNOW">

                </form>  
        <?php


        } elseif ($_POST['status'] == 'Z0') {

            ?>
            <div class="w3-container">
                <h4 align="center"><font color="#228b22"><b>Thank you for submitting your application.<br/>
                            Your online application reference number is <?php echo $list["OBJECT_ID"]; ?>
                        </b></font></h4>
            </div>
            <?php
        } else {
            ?>
            <div class="w3-container">
                <h4 align="center"><font color="#228b22"><b>Thank you for submitting your application
                        </b></font></h4>
            </div>
            <div class="w3-container w3-center">
                <a href="uploading.php">
                    <button class="w3-btn w3-green">Upload Attachments</button>
                </a>
            </div>

            <?php
        }

        ?>



        <?php

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


        }

        ?>


        <div id="renewal" class="w3-container w3-border app">
            <div class="w3-card-4">


                <form method="post" action="company.php" class="w3-container" name="myform">


                    <div class="w3-panel w3-pale-red w3-leftbar w3-border-red">
                        <br>

                        <p>

                            This is a weather data subscription form.
                        </p>
                    </div>


                    <div class="w3-panel w3-pale-green w3-leftbar w3-border-green">
                        <p>
                            <u>IMPORTANT NOTES:</u> <br/>
                            Fields that are marked with * are required.
                            Subscriptions are accepted on a prepaid basis only.Request for private subscriptions should
                            be sent to the Department of Meteorological Services.By signing this form, private
                            subscribers are declaring that the subscription is for their personal use and will not be
                            reproduced for third parties without a written consent from the Department of Meteorological
                            Services.<br>
                            <br>
                            <u>PRODUCT DESCRIPTION:</u>

                        <div class="w3-padding">
                            <div class="w3-third"><b> 1.Weekly Rainfall Bulletin</b><br>

                                Weekly rainfall situation report<br>
                                Weekly pan evaporation map<br>
                                Seasonal rainfall situation update<br>
                                Produced from November to April<br>
                                Seven day weather forecast<br></div>
                            <div class="w3-third"><b>2.Ten Day Agromet Bulletin</b><br>

                                Ten day agro-weather summary<br>
                                Quality of season to date<br>
                                Vegetation condition maps<br>
                                Seven day agro-weather forecast<br>
                                Agro-weather advisories<br>
                            </div>
                            <div class="w3-third">
                                <div class="w3-panel w3-pale-red w3-leftbar w3-border-red">
                                    <b>This subscription covers the period</b>

                                    <br>
                                    <b> 1.</b> From 1st October to 30th April (Agromet Bulletin)<br>
                                    <b> 2.</b> 1st May to 30th September (Agromet Winter)<br>
                                    <b> 3.</b> 1st November to 30th April (Rainfall Bulletin) <br>


                        </p>
                    </div>
            </div>


        </div>

        <br>

    </div>
    <div class="w3-row-padding">


        <div class="w3-half">
            <div class="w3-panel w3-pale-red w3-leftbar w3-border-red">

                Part A: Customer Details
            </div>


            <input type="checkbox" name="APPTYPE" value="COMPANY"
                   style="display:none" checked="checked"/>

            <p>
                <label class="w3-label w3-text-black"><b>Identification Number</b></label>
                <input class="w3-input w3-border w3-light-grey" name="idnumber" type="text"
                       value="<?php echo $idportal; ?>" required readonly>
            </p>


            <p>
                <label class="w3-label w3-text-black"><b>Business Partner Number</b></label>
                <input class="w3-input w3-border w3-light-grey" name="bpnumber" type="text"
                       readonly value="<?php echo $bpnumber; ?>">
            </p>

            <p>
                <label class="w3-label w3-text-black"><b>Company Number</b></label>
                <input class="w3-input w3-border w3-light-grey" name="companynumber" type="text"
                       readonly value="<?php echo $_SESSION['COMPANYNUMBER']; ?>">
            </p>

            <p>
                <label class="w3-label w3-text-black"><b>First Name</b></label>
                <input class="w3-input w3-border w3-light-grey" name="firstname"
                       type="text"
                       value="<?php echo $firstname; ?>" readonly>
            </p>

            <p>
                <label class="w3-label w3-text-black"><b>Last Name</b></label>
                <input class="w3-input w3-border w3-light-grey" name="firstname"
                       type="text"
                       value="<?php echo $lastname; ?>" readonly>
            </p>

            <p>
                <label class="w3-label w3-text-black"><b>Address</b></label>
                <input class="w3-input w3-border w3-light-grey" name="address" type="text"
                       readonly value="<?php echo $houseno . " " . $street . " " . $city; ?>">
            </p>

            <p>
                <label class="w3-label w3-text-black"><b><font color="red">*</font>Province</b></label><br/>


                <SELECT name="region" class="w3-input w3-border w3-light-grey" required>
                    <OPTION value="" disabled selected>Select province</OPTION>
                    <OPTION value="Z1">Harare</OPTION>
                    <OPTION value="Z10">Bulawayo</OPTION>
                    <OPTION value="Z2">Manicaland</OPTION>
                    <OPTION value="Z3">Mashonaland Central</OPTION>
                    <OPTION value="Z4">Mashonaland East</OPTION>
                    <OPTION value="Z5">Mashonaland West</OPTION>
                    <OPTION value="Z6">Masvingo</OPTION>
                    <OPTION value="Z7">Matebeleland North</OPTION>
                    <OPTION value="Z8">Matebeleland South</OPTION>
                    <OPTION value="Z9">Midlands</OPTION>
                </SELECT>

            </p>

            <p>
                <label class="w3-label w3-text-black"><b>Telephone Number/Extension</b></label>
                <input class="w3-input w3-border w3-light-grey" name="telephone" type="text"
                       value="<?php echo $phone; ?>" readonly>
            </p>
            </p>

            <p>
                <label class="w3-label w3-text-black"><b><font color="red">*</font>Email</b></label>
                <input required class="w3-input w3-border w3-light-grey " name="email" type="email" value="<?php echo $mail; ?>"
                    >

            </p>


        </div>


        <div class="w3-half">

            <p>
                <label class="w3-label w3-text-black"><b><font color="red">*</font>Amount Paid</b></label>
                <input required class="w3-input w3-border " name="amountpaid" type="text" id="amountpaid"
                       placeholder="Amount Paid"
                    >
            </p>

            <p>
                <label class="w3-label w3-text-black"><b><font color="red">*</font>Payment Status</b></label>
                <select class="w3-input form-control" name="status" required>
                    <option value="">Select</option>
                    <option value="Z2">Pay Online</option>
    
                    <option value="Z3">Paid</option>

                </select></p>
				
				                   
            
 <div class="w3-panel w3-pale-red w3-leftbar w3-border-red">
                     Bulletin being subscribed for
                              </div>
                        
                         <label class="w3-label w3-text-black"><b><font color="red">*</font>Bulletin being subscribed for</b></label>
                        <select class="form-control" name="bulletin" id="bulletin" required>
                            <option value="">select</option>
                            <option value="weekly">Weekly rainfall</option>
                            <option value="tenday">Ten day Agromet</option>
                            <option value="both">Both</option>
                        </select>
                    
                    
                        <br>
                        <div id="weekly">
                        <p>
                        
                              <div class="w3-panel w3-pale-red w3-leftbar w3-border-red">
                     Weekly rainfall bulletin
                              </div>
							     <div class="w3-panel w3-pale-green w3-leftbar w3-border-green">
                   <span class="w3-text-red"> <b>NB&nbsp;</b>Select mode before entering duration of subscription.</span>
                              </div>
      
                         <div class="table-responsive">
                       
                        <table class="table table-striped" >
                            <tr>
                                <td><b>Mode<br /></b></td>
                                <td><b>Season Subscription (Price Per Month) (US$)</b></td>
                                <td><b>Duration of subscription (Months)</b></td>
                                <td><b>Price (US$)</b></td>
                            </tr>
                           <tr>
                                <td>Email&nbsp;<input type="checkbox" name="mail" id="mode" value="E"></td>
                                <td><input type="text" name="text2" onkeyup="calc()" value="<?php echo $ITAB_ZEWSW; ?>" readonly class="form-control"></td>
                                <td><input type="text" name="text1" onkeyup="calc()" id="duration" class="form-control"></td>
                                <td><input type="text" name="mail_sub" class="form-control" readonly></td>
                            </tr>
                            
                    
                             <tr>
                                <td>Will collect&nbsp;<input type="checkbox" name="will_collect" id="modea" value="W"></td>
                                 <td><input type="text" name="text5" readonly onkeyup="calcu()" value="<?php echo $ITAB_ZEWSW; ?>" class="form-control"></td>
                                <td><input type="text" name="text4" onkeyup="calcu()" id="durationa" class="form-control"></td>
                                <td><input type="text" name="will_collect_sub" class="form-control" readonly></td>
                            </tr>
                        </table>
                        </div>
                 </p>
            </div>
         
                <br>
            <div id="tenday">
                   <p> 
            <div class="w3-panel w3-pale-red w3-leftbar w3-border-red">
                    Ten day Agromet Bulletin
                              </div>
							     							     <div class="w3-panel w3-pale-green w3-leftbar w3-border-green">
                   <span class="w3-text-red"> <b>NB&nbsp;</b>Select mode before entering duration of subscription.</span>
                              </div>
                        
                        <div class="table-responsive">
                       
                        <table class="table table-striped" >
                            <tr>
                                <td><b>Mode<br /></b></td>
                                <td><b>Season Subscription (Price Per Month) (US$)</b></td>
                                <td><b>Duration of subscription (Months)</b></td>
                                <td><b>Price (US$)</b></td>
                            </tr>
                           <tr>
                                <td>Email&nbsp;<input type="checkbox" name="mail1" id="modeb" value="E"></td>
                                <td><input type="text" name="textb" onkeyup="calculat()" value="<?php echo $ITAB_ZEWST; ?>" readonly class="form-control"></td>
                                <td><input type="text" name="texta" onkeyup="calculat()" id="durationb" class="form-control"></td>
                                <td><input type="text" name="mail_sub1" class="form-control" readonly></td>
                            </tr>
                            
                    
                             <tr>
                                <td>Will collect&nbsp;<input  type="checkbox" name="will_collect1" id="modec" value="W"></td>
                                 <td><input type="text" name="b" readonly onkeyup="calculat()" value="<?php echo $ITAB_ZEWST; ?>" class="form-control"></td>
                                <td><input type="text" name="a" onkeyup="cal()" id="durationc" class="form-control"></td>
                                <td><input type="text" name="will_collect_sub1" class="form-control" readonly></td>
                            </tr>
                        </table>
                        </div>
                 </p>
        </div>
               
    
     
</div>
</div>
           <div class="w3-container">
                    
                     <p>
   <font color="red">*</font><input required type="checkbox" name="declaration" required> I declare that the information given by me in this application is true and correct in every respect to the best of my knowledge and belief.
I understand that any false statement on this form may render me liable to disqualification.<br />
                        </p>
                
                    <input class="w3-btn  w3-green" type="submit" name="SUBMIT" value="Save Application"/>

                    
                </p>
				</form>
</div>
               
  
        <script>
  var update = function () {
    if ($("#mode").is(":checked")) {
        $('#duration').prop('disabled', false);
    }
    else {
        $('#duration').prop('disabled', 'disabled');
    }
  };
  $(update);
  $("#mode").change(update);
</script>
  <script>
  var update = function () {
    if ($("#modea").is(":checked")) {
        $('#durationa').prop('disabled', false);
    }
    else {
        $('#durationa').prop('disabled', 'disabled');
    }
  };
  $(update);
  $("#modea").change(update);
</script>
  <script>
  var update = function () {
    if ($("#modeb").is(":checked")) {
        $('#durationb').prop('disabled', false);
    }
    else {
        $('#durationb').prop('disabled', 'disabled');
    }
  };
  $(update);
  $("#modeb").change(update);
</script>
  <script>
  var update = function () {
    if ($("#modec").is(":checked")) {
        $('#durationc').prop('disabled', false);
    }
    else {
        $('#durationc').prop('disabled', 'disabled');
    }
  };
  $(update);
  $("#modec").change(update);
</script>





  <script>
function calc()
{
var elm = document.forms["myform"];

if (elm["text1"].value != "" && elm["text2"].value != "")
{elm["mail_sub"].value = parseInt(elm["text1"].value) * parseInt(elm["text2"].value);}
}
</script>
       <script>
function calcu()
{
var elm = document.forms["myform"];

if (elm["text4"].value != "" && elm["text5"].value != "")
{elm["will_collect_sub"].value = parseInt(elm["text4"].value) * parseInt(elm["text5"].value);}
}
</script>
              <script>
function calculat()
{
var elm = document.forms["myform"];

if (elm["texta"].value != "" && elm["textb"].value != "")
{elm["mail_sub1"].value = parseInt(elm["texta"].value) * parseInt(elm["textb"].value);}
}
</script>
                      <script>
function cal()
{
var elm = document.forms["myform"];

if (elm["a"].value != "" && elm["b"].value != "")
{elm["will_collect_sub1"].value = parseInt(elm["a"].value) * parseInt(elm["b"].value);}
}
                    </script>  
<script>
        
         $(function () {
             $('#weekly').show();
             $('#tenday').hide();
            
    $('#bulletin').change(function() {
    
    if (this.value == 'weekly'){
        
        $('#weekly').show();
        $('#tenday').hide();
    }
    else if (this.value == 'tenday'){
     $('#weekly').hide();
        $('#tenday').show();
    
}
    else if (this.value == 'both'){
         $('#weekly').show();
        $('#tenday').show();
    } 
    
});
         });
        </script>
         
 </body>
</html>


