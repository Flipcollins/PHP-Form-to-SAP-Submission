<?php session_start();
$idportal = $_REQUEST['username'];
include ('../bpdata.php');
?>

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
<body>


<div class="w3-container w3-border app">
    <div class="w3-card-4">

	<form method="post" action="index.php" class="w3-container"	>
	 <div class="w3-panel w3-pale-red w3-leftbar w3-rightbar
             w3-border-red">
                <p align="center">
                    <b>Please select any one of the options below.</b>
                </p>
            </div>
			<div align="center">
	<p align="center">
 		<h3 class="w3-text-red" ><b>Are you applying as?</b></h3>
		</P>
		 <p align="center">

           <a href="search.php?username=<?php echo $idportal; ?>" class="button w3-btn w3-green">Company Application</a>
            </p>
</div>
		   <p align="center">

           <a href="individual.php?username=<?php echo $idportal; ?>" class="button w3-btn w3-green">Individual Application</a>
            </p>
</div>
              </form> 
      

		
</div>


</div>


</body>
</html>

