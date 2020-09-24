<?php
require('db.php');

//Upcoming Exams Query
$query = "SELECT * FROM retina_genius_2020 Where flag = 0";
$result1 = mysqli_query($con,$query) or die(mysql_error());
$rows1 = mysqli_num_rows($result1);

//Notice List
$queryNotice = "SELECT * FROM notice";
$resultNotice = mysqli_query($con,$queryNotice) or die(mysql_error());
$rowsNotice = mysqli_num_rows($resultNotice);

//Upload Upcoming Exam Name
if(isset($_POST['upcomingExamFormImport'])){

    $exam_name = $_POST['exam_name'];
    $new_date = date('Y-m-d', strtotime($_POST['examDate']));

    $con->query("INSERT INTO upcoming_exam (exam_name,exam_date) VALUES('$exam_name', '$new_date')");
}

// notice Update
if(isset($_POST['noticeFormImport'])){

    $notice = $_POST['notice'];

    $con->query("INSERT INTO notice (notice) VALUES('$notice')");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
                <p class="contact-action"><img src="images/PhoneDial.png">  IN CASE OF ANY QUESTIONS, CALL THIS NUMBER: <strong>+880##########</strong></strong></p>
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
                                    <button class="btn btn-success" name="submit">Log in</button>
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
                <li><a href="#">Admin Home</a></li>
                <li><a href="resultUpload.php">Result Upload</a></li>
                <li><a href="sollutionUpload.php">Solution Upload</a></li>
                <li class="active"><a href="genisusRegistrationList2020.php">Retina Genius</a></li>
                <li><a href="logout.php">Logout</a></li>
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
                    <img src="images/slider2.jpg" alt=""/>
                </div>	<!-- End of /.nivoslider -->
            </div>	<!-- End of /.col-md-12 -->
        </div>	<!-- End of /.row -->
    </div>	<!-- End of /.container -->
</section> <!-- End of Section -->




<section id="topic-header">
    <div class="container">
        
        <div class="row">
            <div class="col-md-12 text-center"><h1 style="color: brown">Retina Genius List</h1></div>
            <br>
            <?php
            if($rows1>0){
            ?>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th><center>Name</center></th>
                    <th><center>College Name</center></th>
                    <th><center>Mobile Number</center></th>
                    <th><center>Guardian Number</center></th>
                    <th><center>SSC GPA</center></th>
                    <th><center>Test GPA</center></th>
                    <th><center>Aim</center></th>
                </thead>
                <?php
                $count= 0;
                while ($rowTS = mysqli_fetch_array($result1)) {
                    $count++;
                    ?>
                    <tr>
                        <td><center><?php $summary = $rowTS['name']; echo $summary;?></center></td>
                        <td><center><?php $summary = $rowTS['college_name']; echo $summary;?></center></td>
                        <td><center><?php $summary = $rowTS['mobile_number']; echo $summary;?></center></td>
                        <td><center><?php $summary = $rowTS['guardian_number']; echo $summary;?></center></td>
                        <td><center><?php $summary = $rowTS['ssc_gpa']; echo $summary;?></center></td>
                        <td><center><?php $summary = $rowTS['test_gpa']; echo $summary;?></center></td>
                        <td><center><?php $summary = $rowTS['aim']; echo $summary;?></center></td>
                    </tr>



                <?php
                }
                }
                else
                {
                ?>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th><center>Name</center></th>
                    <th><center>College Name</center></th>
                    <th><center>Mobile Number</center></th>
                    <th><center>Guardian Number</center></th>
                    <th><center>SSC GPA</center></th>
                    <th><center>Test GPA</center></th>
                    <th><center>Aim</center></th>
                     <th>Content Control</th>
                    </tr>
                    </thead>
                    <tr>
                        <td colspan="8" style="color: red"><center><?php echo "No result to show"; ?></center></td>
                    </tr>
                    <?php }
                    ?>
                </table>
        </div>
    </div>
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
                        <div class="list-group">
                            <a href="" class="list-group-item">
                                1
                            </a>
                            <a href="" class="list-group-item">
                                <i class="fa  fa-dot-circle-o"></i>
                                2
                            </a>
                            <a href="" class="list-group-item">
                                <i class="fa  fa-dot-circle-o"></i>
                                3
                            </a>
                            <a href="" class="list-group-item">
                                <i class="fa  fa-dot-circle-o"></i>
                                4
                            </a>
                            <a href="" class="list-group-item">
                                <i class="fa  fa-dot-circle-o"></i>
                                5
                            </a>
                        </div>
                    </div>
                    <div class="block">
                        <img src="" alt="Advertisement will be shown here">
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
                        Retina related talks will be here
                    </p>
                    <h4 class="connect-heading">CONNECT WITH US</h4>
                    <ul class="social-icon">
                        <li>
                            <a class="facebook-icon" href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a class="plus-icon" href="#">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </li>
                        <li>
                            <a class="twitter-icon" href="#">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a class="pinterest-icon" href="#">
                                <i class="fa fa-pinterest"></i>
                            </a>
                        </li>
                        <li>
                            <a class="linkedin-icon" href="#">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>	<!-- End Of /.social-icon -->
                </div>	<!-- End Of /.block -->
            </div> <!-- End Of /.Col-md-4 -->
            <div class="col-md-4">
                <div class="block">
                    <h4>GET IN TOUCH</h4>
                    <p ><i class="fa  fa-map-marker"></i> <span>RETINA,</span> address will be here</p>
                    <p> <i class="fa  fa-phone"></i> <span>Mobile:</span> +880####### </p>

                    <p> <i class="fa  fa-mobile"></i> <span>Mobile:</span> +880#######</p>

                    <p class="mail"><i class="fa  fa-envelope"></i>Eamil: <span>email will be here</span></p>
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
