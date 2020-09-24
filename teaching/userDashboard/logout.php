<?php
session_start();
session_destroy();
header("location:/teaching/index.php");
?>