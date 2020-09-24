<?php 

$db = mysqli_connect("localhost","retinakh_retina","retinakh_retina","retinakh_retina");
//Query
$query = "SELECT * FROM study_plan";
$result1 = mysqli_query($db,$query);
$rows1 = mysqli_num_rows($result1);
?>
<!doctype html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Study Plan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />

    <!-- DATA TABLE CSS -->
    <link href="css/table.css" rel="stylesheet">

    <script type="text/javascript" src="js/jquery.js"></script>    
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/admin.js"></script>

    <style type="text/css">
      body {
        padding-top: 60px;
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
        
  	<!-- Google Fonts call. Font Used Open Sans -->
  	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

  	<!-- DataTables Initialization -->
    <script type="text/javascript" src="js/datatables/jquery.dataTables.js"></script>
  			<script type="text/javascript" charset="utf-8">
  			    $(document).ready(function () {
  			        $('#dt1').dataTable();
  			    });
	</script>

    
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
          <a class="navbar-brand" href="index.php"><img src="images/logo30.png" alt=""> User Study Plan</a>
        </div> 
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="user.php"><i class="icon-user icon-white"></i> User</a></li>
			  <li><a href="studyPlan.php"><i class="icon-lock icon-white"></i> Study Plan</a></li>
			  <li><a href="logout.php"><i class="icon-lock icon-white"></i> Logout</a></li>

            </ul>
          </div><!--/.nav-collapse -->
        </div>
    </div>
      	<div class="container">
      	    <h4><strong>Study Plan Table</strong></h4>
      		<div class="row">
                  <?php
                      if($rows1>0){
                      ?>
                          <?php
                          $count= 0;
                          while ($rowTS = mysqli_fetch_array($result1)) {
                              $count++;
                              ?>
                              <div class="col-sm-3 col-lg-3">
      				            <div id="hosting-table">
						            <div class="table_style4"> 
							            <div class="column">
								            <ul>
                                                <li><strong>Select Your Plan</strong></li>
                                                <li class="header_row">
                                                    <h1><?php echo "".$rowTS['subject_name'] ?></h1>
                                                </li>
                                                <li>Class (Per Week): <?php echo "".$rowTS['class_per_week'] ?></li>
                                                <li>Solve Class (Per Week): <?php echo "".$rowTS['solve_class_per_week'] ?></li> 
                                                <li>Class:  <?php echo "".$rowTS['Class'] ?>th</li> 
                                                <li>Subscription Fee: <?php echo "".$rowTS['subscription_fee'] ?></li>
                                                <li> <?php echo "".$rowTS['Syllabus'] ?></li>
                                                <li class="footer_row"><a class="hosting-button"  href="payment.php?plan_id=<?php echo "".$rowTS['id'] ?>">ADD TO CART</a></li>
								            </ul>
							            </div><!--/ column-->
						            </div><!--/ Table Style-->
					            </div><!--/ Hosting Table-->	
      			                </div><!-- /span3 -->	
                          <?php
                          }
                          }
                          else
                          {
                          ?>
                            <div class="col-sm-3 col-lg-3">
      				<div id="hosting-table">
						<div class="table_style4"> 
							<div class="column">
								<ul>
				                  	<li><strong>Select Your Plan</strong></li>
									<li class="header_row">
										<h1>Nothing To Show</h1>
									</li>
									<li>Nothing To Show <a class="tt" href="#">(?)<span class="tooltip"><span class="triangle-obtuse">Contrary to popular belief. It has roots in a classical Latin</span></span></a></li>
									<li>Nothing To Show</li> 
									<li>Nothing To Show <a class="tt" href="#">(?)<span class="tooltip"><span class="triangle-obtuse">Do your layouts deserve better than Lorem Ipsum?</span></span></a></li> 
									<li>Nothing To Show</li>
				                    <li>Nothing To Show <a class="tt" href="#">(?)<span class="tooltip"><span class="triangle-obtuse">Apply as an art than director Do your</span></span></a></li>
				                    <li>Nothing To Show</li>
									<li class="footer_row"><a href="#" class="hosting-button">Add To Cart</a></li>
								</ul>
							</div><!--/ column-->
						</div><!--/ Table Style-->
					</div><!--/ Hosting Table-->	
      			</div><!-- /span3 -->	
                              <?php }
                              ?>
                          </table>
      		</div><!-- /row -->
      	</div><!-- /container -->
      	<br>
	<!-- FOOTER -->	
	<div id="footerwrap">
      	<footer class="clearfix"></footer>
      	<div class="container">
      		<div class="row">
      			<div class="col-sm-12 col-lg-12">
      			<p><img src="images/logo.png"" alt=""></p>
      			<p>Blocks Dashboard Theme - Crafted With Love - Copyright 2013</p>
      			</div>

      		</div><!-- /row -->
      	</div><!-- /container -->		
	</div><!-- /footerwrap -->

</body></html>