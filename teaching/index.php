<?php
session_start();

// initializing variables
$fullname = "";
$username = "";
$email = "";
$phone_no = "";
$password = "";

// connect to the database
$db = mysqli_connect("localhost","retinakh_retina","retinakh_retina","retinakh_retina");
// REGISTER USER
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // receive all input values from the form
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $phone_no = mysqli_real_escape_string($db, $_POST['phone_no']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $re_password = mysqli_real_escape_string($db, $_POST['re_password']);

  $sql = "SELECT * FROM user_info WHERE username = '$username'";
  $result = mysqli_query($db,$sql);
  $count = mysqli_num_rows($result);

  if($fullname == "" || $username == "" || $phone_no == "" || $password == ""){
    $message = "Fill Up All Box";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  else if($password != $re_password){
    $message = "Passowrd not match";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  else if($count > 0){
    $message = "Username Already Taken";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }else{
    $query = "INSERT INTO user_info (fullname, username, phone_number, password)
    VALUES('$fullname','$username', '$phone_no', '$password')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    //$_SESSION['success'] = "You are now logged in";
    header('location: login.php');
  }

  	
}
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="fullname" id="name" placeholder="Your FullName"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="name" placeholder="Your UserName"/>
                            </div>
			    <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="phone_no" id="name" placeholder="Your Phone Number"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password"/>
                            </div> 
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="re_password" id="pass" placeholder="Re-enter Password"/>
                            </div>                                                       
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>