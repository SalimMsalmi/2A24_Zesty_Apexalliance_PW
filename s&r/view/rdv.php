<?php
    include_once '../model/res.php';
    include_once '../controller/resC.php';

    $error = "";

    // create 
    $res = null;

    // create an instance of the controller
    $resC = new resC();
    if (
        isset($_POST["idres"]) &&
		isset($_POST["idservice"]) &&		
        isset($_POST["dateres"]) &&
		isset($_POST["timeres"]) && 
        isset($_POST["nsres"]) && 
        isset($_POST["mailres"])
    ) {
        if (
            !empty($_POST["idres"]) && 
			!empty($_POST['idservice']) &&
            !empty($_POST["dateres"]) && 
			!empty($_POST["timeres"]) && 
            !empty($_POST["nsres"]) && 
            !empty($_POST["mailres"])
        ) {
            $adherent = new Adherent(
                $_POST['idres'],
				$_POST['idservice'],
                $_POST['dateres'], 
				$_POST['timeres'],
                $_POST['nsres'],
                $_POST['mailres']
            );
            $resC->ajouterres($res);
            header('Location:service.php');
        }
        else
            $error = "Missing information";
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
						<form method="POST">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Select Service</span>
										<select name="idservice "class="form-control">
											<option>98</option>
											<option>88</option>
											<option>71</option>
                                            <option>54</option>
											<option>92</option>
											<option>84</option>
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
											<input name ="nsres" class="form-control" type="" required>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Mail</span>
											<input name ="mailres" class="form-control" type="" required>
										</div>
									</div>
								</div>

							<div class="form-btn">
								<button class="submit-btn">send!</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>