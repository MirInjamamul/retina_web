<?php
include('db.php');

$id=$_GET['edit_id'];
$sql="DELETE FROM upcoming_exam WHERE id='$id'";

if ($con->query($sql) === TRUE) {
    $con->close();
    header("Location: adminPanel.php");

} else {
    header("Location: index.php");
}
?>