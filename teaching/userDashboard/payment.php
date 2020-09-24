<?php
session_start();

$db = mysqli_connect("localhost","retinakh_retina","retinakh_retina","retinakh_retina");
$name = $_SESSION['username'];
$query = "SELECT * FROM user_info WHERE username = '$name'";
$result = mysqli_query($db,$query);
$rowTS = mysqli_fetch_array($result);

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // receive all input values from the form
  $payment_number = mysqli_real_escape_string($db, $_POST['payment_number']);
  $payment_amount = mysqli_real_escape_string($db, $_POST['payment_amount']);
  if($payment_number == "" || $payment_amount == ""){
     $message = "Fill All Field";
    echo "<script type='text/javascript'>alert('$message');</script>"; 
  }
  else{
      $user_id = $rowTS['id'];
      $subscribe_plan_id = $_GET['plan_id'];

  	  $query = "INSERT INTO subscription (user_id, subscribe_plan_id , payment_number , payment_amount)
  			  VALUES('$user_id', '$subscribe_plan_id', '$payment_number', '$payment_amount')";
  	mysqli_query($db, $query);
  	header('location: user.php');
  }
  
   }
?>

<!doctype html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>USER DASHBOARD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    
    <link href="css/main.css" rel="stylesheet">
    <link href="css/font-style.css" rel="stylesheet">
    <link href="css/register.css" rel="stylesheet">

	<script type="text/javascript" src="js/jquery.js"></script>    
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <style type="text/css">
      body {
        padding-top: 60px;
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
  	<!-- Google Fonts call. Font Used Open Sans & Raleway -->
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
  	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
	</head>
  <body>

  	<!-- NAVIGATION MENU -->

    <div class="navbar-nav navbar-inverse navbar-fixed-top">
        <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="images/logo30.png" alt=""> User Dashboard</a>
        </div> 
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <!-- <li><a href="index.html"><i class="icon-home icon-white"></i> Home</a></li>                            
              <li><a href="tables.html"><i class="icon-th icon-white"></i> Tables</a></li>
              <li><a href="login.html"><i class="icon-lock icon-white"></i> Login</a></li> -->
              <li class="active"><a href="user.php"><i class="icon-user icon-white"></i> User</a></li>
			  <li><a href="studyPlan.php"><i class="icon-lock icon-white"></i> Study Plan</a></li>
			  <li><a href="logout.php"><i class="icon-lock icon-white"></i> Logout</a></li>

            </ul>
          </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container">
        <div class="row">

        	<!-- <div class="col-lg-6">
        		
        		<div class="register-info-wraper">
        			<div id="register-info">
        				<div class="cont2">
        					<div class="thumbnail">
								<!-- <img src="images/face.jpg" alt="Marcel Newman" class="img-circle"> -->
				<!--			</div><!-- /thumbnail -->
				<!--			<h2>Welcome <?php echo"".$_SESSION["username"]; ?></h2>
        				</div>
        				<div class="row">
        					<div class="col-lg-3">
        						<div class="cont3">
        							<p><ok>Username:</ok> <?php echo"".$_SESSION["username"]; ?></p>
        							<p><ok>Mail:</ok> Under Construction</p>
        							<p><ok>Location:</ok>  Under Construction</p>
        							<p><ok>Address:</ok>  Under Construction</p>
        						</div>
        					</div>
        					<div class="col-lg-3">
        						<div class="cont3">
        						<p><ok>Registered:</ok>  Under Construction</p>
        						<p><ok>Last Login:</ok>  Under Construction</p>
        						<p><ok>Phone:</ok>  Under Construction</p>
        						<p><ok>Mobile</ok>  Under Construction</p>
        						</div>
        					</div>
        				</div><!-- /inner row -->
				<!--		<hr>
						<div class="cont2">
							<h2>Choose Your Option</h2>
						</div>
						<br>
							<div class="info-user2">
								<!-- <span aria-hidden="true" class="li_user fs1"></span>
								<span aria-hidden="true" class="li_settings fs1"></span>
								<span aria-hidden="true" class="li_mail fs1"></span>
								<span aria-hidden="true" class="li_key fs1"></span>
								<span aria-hidden="true" class="li_lock fs1"></span> -->
				<!--				<a href="studyPlan.php"><span aria-hidden="true" class="li_pen fs1"></span> </a>
							</div>

        				
        			</div>
        		</div>

        	</div> -->

        	<div class="col-sm-6 col-lg-6">
        		<div id="register-wraper">
        		    <form id="register-form" class="form" action="#" method="POST">
        		        <legend>Payment Registration</legend>
        		    
        		        <div class="body">
        		        	<!-- first name -->
    		        		<label for="name">Rocket Number: 017521122322<br>BKASH Number: 01752112232<br>Please Pay Your Fee To this Number</label>
        		        	<!-- last name -->
    		        		<label for="Mobile Number"><br>Your ROCKET / BKASH Number</label>
    		        		<input name="payment_number" class="input-huge" type="text">
        		        	<!-- username -->
        		        	<label>AMOUNT of MONEY</label>
        		        	<input name="payment_amount" class="input-huge" type="text">
        		        </div>
        		    
        		        <div class="footer">
        		            <button type="submit" class="btn btn-success">Submit</button>
        		        </div>
        		    </form>
        		</div>
        	</div>

        </div>
    </div>

	<div id="footerwrap">
      	<footer class="clearfix"></footer>
      	<div class="container">
      		<div class="row">
      			<div class="col-sm-12 col-lg-12">
      			<p><img src="images/logo.png" alt=""></p>
      			<p>Blocks Dashboard Theme - Crafted With Love - Copyright 2013</p>
      			</div>

      		</div><!-- /row -->
      	</div><!-- /container -->		
	</div><!-- /footerwrap -->  
</body></html>