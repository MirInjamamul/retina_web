<?php 
session_start();
?>
<html>
<body>
<h2 align="center">Welcome : <?php echo($_SESSION['username']); ?></h2>
</body>
</html>