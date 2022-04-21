<?php
    include_once '../model/res.php';
    include_once '../controller/resC.php';

	$mysqli = new mysqli('localhost', 'root', '', 'zestymar') or die(mysqli_error($mysqli));
    $error = "";
	$idservice=0;
	$dateres='';
	 $timeres='' ;
	 $nsres='';
	$mailres='';
    // create 
    $res = null;

    // create an instance of the controller
    //$resC = new resC();
	
	
	if (isset($_GET['submit'])){
		$idservice=$_GET['idservice'];
		$dateres=$_GET['dateres'];
		$timeres=$_GET['timeres'];
		$nsres=$_GET['nsres'];
		$mailres=$_GET['mailres'];
	    //echo $idservice;
		header("location:affichres.php");
		$mysqli->query(" INSERT INTO `booknow`(`idservice`, `dateres`, `timeres`, `nsres`, `mailres`) VALUES ('$idservice','$dateres','$timeres','$nsres','$mailres')") or
				 die($mysqli->error);
	 } 

    
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form Zesty</title>

	<!-- Google font -->
	<link href="http://fonts.googleapis.com/css?family=Playfair+Display:900" rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Alice:400,700" rel="stylesheet" type="text/css" />

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/stylebook.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>

	<div id="booking" class="section">
		<div class="section-center">
		<button><a href="service.php">Back</a></button>
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="booking-bg">
							<div class="form-header">
								<h2>Make your reservation With Zesty </h2>
								<p>book your appointement online and receive a confirmation mail!</p>
							</div>
						</div>
						<form method="GET">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Select Service</span>
										<select name="idservice"class="form-control">
                                   
								   <?php
									//create sql to get services from db
                                      $sql="SELECT * FROM services" ;
									  //executing NOT SURE MYSQLI
									  $conn= mysqli_connect('localhost', 'root', '', 'zestymar');
									  $serv=mysqli_query($conn,$sql);
									  //if fama services
									  while($row=mysqli_fetch_assoc($serv))
									  {
										  $idservice=$row['idservice'];
										  $nameservice=$row['nameservice'];
										  ?>
										  <option value="<?php echo $idservice; ?>"><?php echo $nameservice; ?></option>;
										  <?php 

									  }





                                      ?>
										
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>
							
								

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Select date</span>
										<input name="dateres" class="form-control" type="date" required>
									</div>
								</div>
							</div>
							
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Time</span>
										<select name ="timeres"class="form-control">
											<option>10:00</option>
											<option>16:00</option>
											<option>17:00</option>
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>
							</div>

							<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Price</span>
											<input class="form-control" type="" required>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Name & Surname</span>
											<input name ="nsres" class="form-control" type="text" required>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Mail</span>
											<input name ="mailres" class="form-control" type="text" required>
										</div>
									</div>
								</div>

							<div class="form-btn">
								<input type ="submit" value="submit" name="submit" class="submit-btn">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>