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

	$sql = "SELECT id FROM subscription WHERE user_id = '$user_id' and verified = '1' and subscribe_plan_id = '3'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count >= 1) {
         $plan_count = $count;
      }else {
		header("location: user.php");
      }

?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
.responsiveRapper {
	overflow:hidden;
	padding-bottom:56.25%;
	padding-top:30px;
	height:0;
	position:relative;
}
.responsiveRapper iframe,
.responsiveRapper object,
.responsiveRapper embed {
	top:0;
	left:0;
	width:100%;
	height:100%;
	position:absolute;
}
</style>
</head>
<body>
<div class="responsiveRapper">
	<iframe width="560" height="315" src="https://www.youtube.com/embed/9W2u49VjW5Y" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
</body>
</html>