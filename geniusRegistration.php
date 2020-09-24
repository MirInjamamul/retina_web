<?php
require('db.php');

//Entry Retina Genius
if(isset($_POST['geniusEntry'])){

    $name = $_POST['name'];
    $college_name = $_POST['college_name'];
    $mobile_number = $_POST['mobile_number'];
    $guardian_number = $_POST['guardian_number'];
    $ssc_gpa  = $_POST['ssc_gpa'];
    $test_gpa = $_POST['test_gpa'];
    $aim = $_POST['aim'];
    $flag = 0;

    $con->query("INSERT INTO retina_genius_2020 (name,college_name,mobile_number,guardian_number,ssc_gpa,test_gpa,aim,flag) VALUES('$name', '$college_name',
    '$mobile_number','$guardian_number','$ssc_gpa','$test_gpa','$aim','$flag')");
    
    echo '<script type="text/JavaScript">  
     alert("Your Registration is completed !!!"); 
     </script>' ;
}
?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags-->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Retina Genius">
    <meta name="author" content="Injamamul">
    <meta name="keywords" content="Retina Genius">

    <!-- Title Page-->
    <title>Retina Genius</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="geniusCss/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Retina Genius - Registration Info</h2>
                    <form method="POST" name="retinaGenius" action="">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="NAME" name="name" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="COLLEGE NAME" name="college_name" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Mobile Number" name="mobile_number" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Guardian Number" name="guardian_number" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="SSC GPA" name="ssc_gpa" Required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="HSC Test GPA (If Possible)" name="test_gpa">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="AIM" name="aim" required>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" name="geniusEntry" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
