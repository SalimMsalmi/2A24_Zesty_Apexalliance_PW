<?php
	include '../controller/resC.php';
	$resC=new resC();
	$listeres=$resC->afficheres();  
?>




<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Thank You for booking!</title>

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
								<h2>Appointement set! </h2>
								<p>Thank you for booking! please check your mail!</p>
							</div>
						</div>
                      
						
						<!-- <?PHP foreach($listeres as $res){	?> -->
						<form method="POST">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Service: <?php echo $res['idservice']; ?> </span>
									</div>
								</div>
							
								

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Date: <?php echo $res['dateres']; ?></span>
										
									</div>
								</div>
							</div>
							
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Time: <?php echo $res['timeres']; ?></span>
										
									</div>
								</div>
							</div>

							<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Price: </span>
											
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Name & Surname: <?php echo $res['nsres']; ?></span>
										
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Mail: <?php echo $res['mailres']; ?></span>
											
										</div>
									</div>
								</div>

                                <div class="form-btn">
                                         
                        <a href="suppres.php?idres=<?php echo $res['idres']; ?>">cancel appointement</a>

                        </div>

							

						</form>
						<!--<?php
				}
			?>-->
					</div>
				</div>
			
                 

            </div>
		</div>
	</div>
</body>

</html>