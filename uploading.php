<?php session_start();

	$_SESSION["FIRST_NAME"] = $_POST["firstname"];
	$_SESSION["LAST_NAME"] = $_POST["lastname"];
	$_SESSION["TELEPHONE"] = $_POST["telephone"];

$service_order = $_SESSION['SERVICE_ORDER'];
?>
<html xmlns="http://www.w3.org/1999/html">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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



    <table align="center">
        <tr>
            <td>




                <div class="w3-panel w3-pale-red w3-leftbar w3-border-red" align="center">

                    <p> <b>Upload files application attachments</b></p>
					<br/><p class="w3-red">NB: Files allowed:<b> pdf, doc, docx, rtf, jpg, png, jpeg, gif, bmp, tif, xls, bmp, tif, xls<b/>
                </div>


                <form method="post" action="next.php" class="w3-container"  enctype="multipart/form-data">


                    <p>
                        <label class="w3-label w3-text-black"><b>Proof of payment</b></label>
                        <input class="w3-input w3-border w3-light-grey" type="file" name="file" 
                               id="pop" >
                    </p>
					
					
                    <p>
                        <label class="w3-label w3-text-black"><b>Other Attachments(1)</b></label>
                        <input class="w3-input w3-border w3-light-grey" type="file" name="file1" 
                               id="pop1" >
                    </p>
					
					
                    <p>
                        <label class="w3-label w3-text-black"><b>Other Attachments(2)</b></label>
                        <input class="w3-input w3-border w3-light-grey" type="file" name="file2"
                               id="pop2" >
                    </p>





                    <input class="w3-btn w3-green" name="submit1" type="submit"
                           value="Upload Attachments"/>

                </form>

                <div class="w3-panel w3-pale-red w3-leftbar w3-border-red" align="center">
                    <p>
                        <b>Click upload to finish the application process</b></p>
                </div>

          

<script>
    var fl = document.getElementById('pop');

    fl.onchange = function(e){
        var ext = this.value.match(/\.(.+)$/)[1];
        switch(ext)
        {
            case 'jpg':
            case 'bmp':
            case 'png':
            case 'tif':
            case 'pdf':
            case 'doc':
            case 'xls':
            case 'docx':
            case 'rtf':
            case 'gif':


                break;
            default:
                alert('Incorrect file format - Please retry using the correct file format');
                this.value='';
        }
    };

</script>

<script>
    var fl = document.getElementById('pop1');

    fl.onchange = function(e){
        var ext = this.value.match(/\.(.+)$/)[1];
        switch(ext)
        {
            case 'jpg':
            case 'bmp':
            case 'png':
            case 'tif':
            case 'pdf':
            case 'doc':
            case 'xls':
            case 'docx':
            case 'rtf':
            case 'gif':


                break;
            default:
                alert('Incorrect file format - Please retry using the correct file format');
                this.value='';
        }
    };

</script>

<script>
    var fl = document.getElementById('pop2');

    fl.onchange = function(e){
        var ext = this.value.match(/\.(.+)$/)[1];
        switch(ext)
        {
            case 'jpg':
            case 'bmp':
            case 'png':
            case 'tif':
            case 'pdf':
            case 'doc':
            case 'xls':
            case 'docx':
            case 'rtf':
            case 'gif':


                break;
            default:
                alert('Incorrect file format - Please retry using the correct file format');
                this.value='';
        }
    };

</script>

</div>
</body>
</html>
