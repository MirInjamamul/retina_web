<?php
require('db.php');

//Upcoming Exams Query
$query = "SELECT * FROM upcoming_exam";
$result1 = mysqli_query($con,$query) or die(mysql_error());
$rows1 = mysqli_num_rows($result1);

//Notice Board
$queryNotice = "SELECT * FROM notice";
$resultNotice = mysqli_query($con,$queryNotice) or die(mysql_error());
$rowsNotice = mysqli_num_rows($resultNotice);

//Login Admin Panel
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $queryLogin = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
    $resultLogin = mysqli_query($con,$queryLogin) or die(mysql_error());
    $rowsLogin = mysqli_num_rows($resultLogin);

    if($rowsLogin>0){
        header("Location: adminPanel.php");
    }else{
        header("Location: index.php");
    }
}

?>
<!doctype html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Retina Medical Coaching</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>

    <!-- Css -->
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" />
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="icon" type="image/ico" href="images/logo.jpg" />

    <!-- jS -->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="js/owl.carousel.min.js" type="text/javascript"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/main.js" type="text/javascript"></script>


</head>
<body>


<!-- TOP HEADER Start
    ================================================== -->

<section id="top">
    <div class="container">
        <div class="row">
             <div class="col-md-7">
                <p class="contact-action"><img src="images/PhoneDial.png">  IN CASE OF ANY QUESTIONS, CALL THIS NUMBER: <strong>+8801707781789 , +8801612450544 </strong></strong></p>
            </div>
            <div class="col-md-3 clearfix">
                <ul class="login-cart">
                    <li>
                        <a data-toggle="modal" data-target="#myModal" href="#">
                            <!--	<i class="fa fa-user"></i> -->
                            <img src="images/LoginImage.png">  Login
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2">
                <div class="search-box">
                    <div class="input-group">
                        <input placeholder="Search Here" type="text" class="form-control">
					      	<span class="input-group-btn">
					        	<button class="btn btn-default" type="button"></button>
					      	</span>
                    </div><!-- /.input-group -->
                </div><!-- /.search-box -->
            </div>
        </div> <!-- End Of /.row -->
    </div>	<!-- End Of /.Container -->


    <!-- MODAL Start
        ================================================== -->

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Introduce Yourself</h4>
                </div>
                <div class="modal-body clearfix">

                    <form action="#" action="" method="post" name="login" id="create-account_form" class="std">
                        <fieldset>
                            <h3>Create your account</h3>
                            <div class="form_content clearfix">
                                <h4>Enter your e-mail address to create an account.</h4>
                                <p class="text">
                                    <label for="email_create">E-mail address</label>
										<span>
											<input placeholder="E-mail address"  type="text" id="email_create" name="email_create" value="" class="account_input">
					                    </span>
                                </p>
                                <p class="submit">
                                    <button class="btn btn-primary">Create Your Account</button>
                                </p>
                            </div>
                        </fieldset>
                    </form>
                    <form action="" method="post" name="login" id="login_form" class="std">
                        <fieldset>
                            <h3>Already registered?</h3>
                            <div class="form_content clearfix">
                                <p class="text">
                                    <label for="email">E-mail address</label>
                                    <span><input placeholder="E-mail address" type="text" id="email" name="username" value="" class="account_input"></span>
                                </p>
                                <p class="text">
                                    <label for="passwd">Password</label>
                                    <span><input placeholder="Password" type="password" id="passwd" name="password" value="" class="account_input"></span>
                                </p>
                                <p class="lost_password">
                                    <a href="#popab-password-reset" class="popab-password-link">Forgot your password?</a>
                                </p>
                                <p class="submit">
                                    <button type="submit" class="btn btn-success" name="submit">Log in</button>
                                </p>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</section>  <!-- End of /Section -->



<!-- LOGO Start
================================================== -->

<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="#">
                    <img src="images/logo.jpg" width="15%" alt="logo">
                </a>
            </div>	<!-- End of /.col-md-12 -->
        </div>	<!-- End of /.row -->
    </div>	<!-- End of /.container -->
</header> <!-- End of /Header -->




<!-- MENU Start
================================================== -->

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div> <!-- End of /.navbar-header -->

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav nav-main">
                <li class="active"><a href="#">HOME</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="registration.php">Registration</a></li>
                <li><a href="geniusRegistration.php">Retina Genius</a></li>
                <li><a href="result.php">Result</a></li>
            </ul> <!-- End of /.nav-main -->
        </div>	<!-- /.navbar-collapse -->
    </div>	<!-- /.container-fluid -->
</nav>	<!-- End of /.nav -->

<!-- SLIDER Start
================================================== -->


<section id="slider-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="slider" class="nivoSlider">
                    <img src="images/slider1.jpg" alt="" />
                    
                    <img src="grandCelebrationImages/gcr46.JPG" alt="" />
                    <img src="grandCelebrationImages/gcr51.JPG" alt="" />
                </div>	<!-- End of /.nivoslider -->
            </div>	<!-- End of /.col-md-12 -->
        </div>	<!-- End of /.row -->
    </div>	<!-- End of /.container -->
</section> <!-- End of Section -->




<section id="topic-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1 style="color: darkred">RETINA</h1>
                <h5>A Medical and Varsity Admission Coaching</h5><br> <br>
                
                <marquee style="color:red;"> Retina Genius Registration is GOING On!!</marquee>
                
                <center><h4><a href="http://retinakhulnabranch.com/geniusRegistration.php">RETINA GENIUS REGISTRATION - 2020 Click Here</a></h4> </center>
                <p style="text-align: justify">"তোমাদেরকে মেডিকেল কলেজের আঙিনায় পৌঁছে দিতে <br> আমাদের প্রচেষ্টা থাকবে সর্বোচ্চ<br>
                    আমাদের আন্তরিকতা হবে যথাযথ এবং পরিপূর্ণ <br> আমাদের আন্তরিকতা হবে প্রশ্নাতীত"</p>
                <marquee style="color:red;"> Retina Genius Registration is GOING On!!</marquee>
                
                <center><h4><a href="http://retinakhulnabranch.com/geniusRegistration.php">RETINA GENIUS REGISTRATION - 2020 Click Here</a></h4> </center>
            </div>	<!-- End of /.col-md-4 -->
            <div class="col-md-8 hidden-xs">
                <ol class="breadcrumb pull-right">
                    <li><a class="active" href="">Home</a></li>
                </ol>
            </div>	<!-- End of /.col-md-8 -->
        </div>	<!-- End of /.row -->
    </div>	<!-- End of /.container -->
</section>	<!-- End of /#Topic-header -->



<!-- PRODUCTS Start
================================================== -->

<section id="shop">
    <div class="container">
        <div class="row">
            <div class="col-md-9">

            </div>	<!-- End of /.col-md-9 -->
            <div class="col-md-3">
                <div class="blog-sidebar">
                    <div class="block">
                        <h4>Latest News</h4>
                        <?php
                        if($rowsNotice>0){
                        ?>
                        <div class="list-group">
                            <?php

                            while ($rowTS = mysqli_fetch_array($resultNotice)) {

                                ?>
                                <a href="" class="list-group-item">
                                    <font color="#b22222"><?php $summary = $rowTS['notice']; echo $summary;?> </font></font>
                                </a>

                            <?php
                            }
                            } ?>
                        </div>
                    </div>
                    <div class="block">
                        <img src="" alt="Advertisement will be shown here">
                    </div>
                    <div class="block">
                        <h4>Upcoming Exams</h4>
                        <?php
                        if($rows1>0){
                        ?>
                        <div class="list-group">
                        <?php

                        while ($rowTS = mysqli_fetch_array($result1)) {

                        ?>
                            <a href="" class="list-group-item">
                                Exam Name : <font color="#d2691e"><?php $summary = $rowTS['exam_name']; echo $summary;?> </font><br>   Exam Date &nbsp;&nbsp;: <font color="#d2691e"><?php $summary = $rowTS['exam_date']; echo $summary;?></font>
                            </a>

                        <?php
                        }
} ?>
                        </div>
                    </div>


                </div>	<!-- End of /.col-md-3 -->

            </div>	<!-- End of /.row -->
        </div>	<!-- End of /.container -->
</section>	<!-- End of Section -->

<!-- FOOTER Start
    ================================================== -->

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="block clearfix">
                    <a href="#">
                        <img src="images/logo.jpg" alt="" width="15%"><br>
                    </a>
                    <p>
                        Chase your dream to be a doctor..
                    </p>
                    <p style="text-align: justify">"তোমাদেরকে মেডিকেল কলেজের আঙিনায় পৌঁছে দিতে <br> আমাদের প্রচেষ্টা থাকবে সর্বোচ্চ<br>
                        আমাদের আন্তরিকতা হবে যথাযথ এবং পরিপূর্ণ <br> আমাদের আন্তরিকতা হবে প্রশ্নাতীত"</p>
                    <h4 class="connect-heading">CONNECT WITH US</h4>
                    <ul class="cash-out pull-left">
                        <li>
                            <a href="https://www.facebook.com/khulnaretina/">
                                <img src="images/facebook.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/user/RetinaBd">
                                <img src="images/youtube.png" alt="">
                            </a>
                        </li>
                        
                    </ul>
                </div>	<!-- End Of /.block -->
            </div> <!-- End Of /.Col-md-4 -->
            <div class="col-md-4">
                <div class="block">
                    <h4>GET IN TOUCH</h4>
                    <p ><i class="fa  fa-map-marker"></i> <span>ঠিকানা : </span> ১৭ , কেডিএ এভিনিউ, তেতুলতলা মোড়, আল-আমিন ট্রেড সেন্টার (৫ম তলা) ,
                    ইন্ডিয়ান ভিসা অফিসের বিপরীতে </p>
                    <p> <i class="fa  fa-phone"></i> <span>Mobile:</span> +8801707781789 </p>

                    <p> <i class="fa  fa-mobile"></i> <span>Mobile:</span> +8801612450544</p>

                    <p class="mail"><i class="fa  fa-envelope"></i>Eamil: <span>retina.khulna@gmail.com</span></p>
                </div>	<!-- End Of /.block -->
            </div> <!-- End Of Col-md-3 -->
            <div class="col-md-4">
                <div class="block">
                    <h4>UPCOMING Events</h4>
                    <!--	<div class="media">
                              <a class="pull-left" href="#">
                                <img class="media-object" src="images/product-item.jpg" alt="...">
                              </a>
                              <a class="pull-left" href="#">
                                <img class="media-object" src="images/product-item.jpg" alt="...">
                              </a>
                              <a class="pull-left" href="#">
                                <img class="media-object" src="images/product-item.jpg" alt="...">
                              </a>
                              <a class="pull-left" href="#">
                                <img class="media-object" src="images/product-item.jpg" alt="...">
                              </a>
                              <a class="pull-left" href="#">
                                <img class="media-object" src="images/product-item.jpg" alt="...">
                              </a>
                              <a class="pull-left" href="#">
                                <img class="media-object" src="images/product-item.jpg" alt="...">
                              </a>
                        </div>	 End Of /.media -->
                </div>	<!-- End Of /.block -->
            </div> <!-- End Of Col-md-3 -->
        </div> <!-- End Of /.row -->
    </div> <!-- End Of /.Container -->



    <!-- FOOTER-BOTTOM Start
    ================================================== -->

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="cash-out pull-left">
                        <li>
                            <a href="#">
                                <img src="images/American-Express.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/PayPal.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/Maestro.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/Visa.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/Visa-Electron.png" alt="">
                            </a>
                        </li>
                    </ul>
                    <p class="copyright-text pull-right">Retina Medical & Dental Coaching @2017-2019 Designed by <a href="">Mir Injamamul</a> All Rights Reserved <br> Mobile: 01752112232 <br> Email : injamamul1221@cseku.ac.bd</p>
                </div>	<!-- End Of /.col-md-12 -->
            </div>	<!-- End Of /.row -->
        </div>	<!-- End Of /.container -->
    </div>	<!-- End Of /.footer-bottom -->
</footer> <!-- End Of Footer -->

<a id="back-top" href="#"></a>
</body>
</html>
