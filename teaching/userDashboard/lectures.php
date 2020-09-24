<?php
	session_start();
	$db = mysqli_connect("localhost","retinakh_retina","retinakh_retina","retinakh_retina");

	
$name = $_SESSION['username'];
$query = "SELECT * FROM user_info WHERE username = '$name'";
$result = mysqli_query($db,$query);
$rowTS = mysqli_fetch_array($result);
$user_id = $rowTS['id'];
$plan_count = 0;

// query for Show Video

$query1 = "SELECT subscribe_plan_id FROM subscription WHERE user_id = '$user_id' AND verified = '1'";
$result1 = mysqli_query($db,$query);
$rows1 = mysqli_num_rows($result1);

	$sql = "SELECT id FROM subscription WHERE user_id = '$user_id' and verified = '1'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count >= 1) {
         $plan_count = $count;
      }else {
		header("location: activationWarning.php");
      }

?>

<!doctype html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>BLOCKS - Bootstrap Dashboard Theme</title>
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
          <a class="navbar-brand" href="index.html"><img src="images/logo30.png" alt=""> BLOCKS Dashboard</a>
        </div> 
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
			<li class="active"><a href="user.php"><i class="icon-user icon-white"></i> User</a></li>
			  <li><a href="lectures.php"><i class="icon-lock icon-white"></i> Lectures</a></li>
			  <li><a href="studyPlan.php"><i class="icon-lock icon-white"></i> Study Plan</a></li>
			  <li><a href="logout.php"><i class="icon-lock icon-white"></i> Logout</a></li>

            </ul>
          </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container">
      <!-- CONTENT -->
	<div class="row">
		<div class="col-sm-12 col-lg-12">
			<h4><strong>Study Plan : 1</strong></h4>
			  <table class="display">
			  <thead>
	            <tr>
                  <th>SERIAL</th>
                  <th>CHAPTER NO</th> 
	              <th>CHAPTER NAME</th>
	              <th>CLASS NO</th>
	              <th>TYPE</th>
	            </tr>
	          </thead>
	          <tbody>
	            
	          </tbody>
	         </table><!--/END First Table -->
			 <br>
             <!--SECOND Table -->
             
             <h4><strong>Study Plan 2</strong></h4>
			  <table class="display">
	          <thead>
	            <tr>
                  <th>SERIAL</th>
                  <th>CHAPTER NO</th> 
	              <th>CHAPTER NAME</th>
	              <th>CLASS NO</th>
	              <th>TYPE</th>
	            </tr>
	          </thead>
	          <tbody>
	            
	          </tbody>
	         </table><!--/END First Table -->
			 <br>
             <!--SECOND Table -->
             
             <h4><strong>Study Plan 3 : ICT</strong></h4>
			  <table class="display">
	          <thead>
	            <tr>
                  <th>SERIAL</th>
                  <th>CHAPTER NO</th> 
	              <th>CHAPTER NAME</th>
	              <th>CLASS NO</th>
	              <th>TYPE</th>
	            </tr>
	          </thead>
	          <tbody>
	              <tr class="odd">
	              <td>1</td>
	              <td>5</td>
	              <td>Programming Language</td>
	              <td class="center"> 1</td>
	              <td class="center"><a href="chapter5class1ict.php">Available</a></td>
	            </tr>
	            <tr class="even">
	              <td>2</td>
	              <td>5</td>
	              <td>Programming Language</td>
	              <td class="center"> 2</td>
	              <td class="center"><a href="chapter5class2ict.php">Available</a></td>
	            </tr>
	            <tr class="odd">
	              <td>3</td>
	              <td>5</td>
	              <td>Programming Language</td>
	              <td class="center"> 3</td>
	              <td class="center">Unvailable</td>
	            </tr>
                <tr class="even">
	              <td>4</td>
	              <td>5</td>
	              <td>Programming Language</td>
	              <td class="center"> 4</td>
	              <td class="center">Unvailable</td>
	            </tr>
	          </tbody>
	         </table><!--/END First Table -->
			 <br>
             <!--SECOND Table -->
             
             <h4><strong>Study Plan 4 : PHYSICS</strong></h4>
			  <table class="display">
	          <thead>
	            <tr>
                  <th>SERIAL</th>
                  <th>CHAPTER NO</th> 
	              <th>CHAPTER NAME</th>
	              <th>CLASS NO</th>
	              <th>TYPE</th>
	            </tr>
	          </thead>
	          <tbody>
	            <tr class="odd">
	              <td>1</td>
	              <td>6</td>
	              <td>Gravitation and Gravity</td>
	              <td class="center"> 1</td>
	              <td class="center"><a href="chapter6paper1class1physics.php">Available</a></td>
	            </tr>
	            <tr class="even">
	              <td>2</td>
	              <td>6</td>
	              <td>Gravitation and Gravity</td>
	              <td class="center"> 2</td>
	              <td class="center"><a href="chapter6paper1class2physics.php">Available</a></td>
	            </tr>
	            <tr class="odd">
	              <td>3</td>
	              <td>6</td>
	              <td>Gravitation and Gravity</td>
	              <td class="center"> 3</td>
	              <td class="center">Unvailable</td>
	            </tr>
                <tr class="even">
	              <td>4</td>
	              <td>6</td>
	              <td>Gravitation and Gravity</td>
	              <td class="center"> 4</td>
	              <td class="center">Unvailable</td>
	            </tr>
	          </tbody>
	         </table><!--/END First Table -->
			 <br>
             <!--SECOND Table -->
             
             <h4><strong>Study Plan 5</strong></h4>
			  <table class="display">
	          <thead>
	            <tr>
                  <th>SERIAL</th>
                  <th>CHAPTER NO</th> 
	              <th>CHAPTER NAME</th>
	              <th>CLASS NO</th>
	              <th>TYPE</th>
	            </tr>
	          </thead>
	          <tbody>
	            
	          </tbody>
	         </table><!--/END First Table -->
			 <br>
             <!--SECOND Table -->
             
             <h4><strong>Study Plan 6</strong></h4>
			  <table class="display">
			  <thead>
	            <tr>
                  <th>SERIAL</th>
                  <th>CHAPTER NO</th> 
	              <th>CHAPTER NAME</th>
	              <th>CLASS NO</th>
	              <th>TYPE</th>
	            </tr>
	          </thead>
	          <tbody>
	            
	          </tbody>
	         </table><!--/END First Table -->
			 <br>
			 <!--SECOND Table -->	
		</div><!--/span12 -->
      </div><!-- /row -->
     </div> <!-- /container -->
    	<br>	
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