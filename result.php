<?php

require 'db.php';


$rows1 = 0;
if(isset($_POST['Import'])){
    $target_roll=$_POST['roll_number'];


    $query = "SELECT * FROM result WHERE coaching_roll_number = $target_roll";
    $result1 = mysqli_query($con,$query) or die(mysql_error());
    $rows1 = mysqli_num_rows($result1);

    $query = "SELECT * FROM student_information WHERE coaching_roll_number = $target_roll";
    $result2 = mysqli_query($con,$query) or die(mysql_error());


}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Result</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Retina Medical and Dental Coaching Center">
    <meta name="description" content="Result">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="icon" type="image/ico" href="images/logo.jpg" />
</head>
<body>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center"><h1>Result</h1></div>
        <br>
        <div class="col-md-3 hidden-phone"></div>
        <div class="col-md-6" id="form-login">
            <form class="well" action="" method="post" name="upload_excel" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <div class="control-label">
                            <label>ID:</label>
                        </div>
                        <div class="controls form-group">
                            <input type="text" name="roll_number" id="file" class="input-large form-control" placeholder="Enter your id here">
                        </div>
                    </div>

                    <legend>Result Arena</legend>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" id="submit" name="Import" class="btn btn-success btn-flat btn-lg pull-right button-loading" data-loading-text="Loading...">Search</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="col-md-3 hidden-phone"></div>
    </div>

    <?php
    if($rows1>0){


    ?>
    <table class="table table-bordered">
        <thead>
        <?php
        while($rowTS = mysqli_fetch_array($result2)) {
            ?>
            <tr>
                <th> <label> Student Name :</label></th>
                <td colspan="5"><?php $summary = $rowTS['student_name']; echo $summary; ?></td>
            </tr>
            <tr>
                <th> <label> Coaching Roll Number :</label></th>
                <td colspan="5"><?php $summary = $rowTS['coaching_roll_number']; echo $summary; ?></td>
            </tr>
            <tr>
                <th> <label> Batch Name :</label></th>
                <td colspan="5"><?php $summary = $rowTS['batch_name']; echo $summary; ?></td>
            </tr>
        <?php

        }?>
        <tr>
            <th><center>Serial Number</center></th>
            <th><center>Coaching Roll Number</center></th>
            <th><center>Exam Name</center></th>
            <th><center>Positive Number</center></th>
            <th><center>Negative Number</center></th>

            <th><center>Position</center></th>
        </tr>
        </thead>
        <?php
        $count= 0;
        while ($rowTS = mysqli_fetch_array($result1)) {
            $count++;
            ?>
            <tr>
                <td><center><?php echo $count; ?></center></td>
                <td><center><?php $summary = $rowTS['coaching_roll_number']; echo $summary;?></center></td>
                <td><center><?php $summary = $rowTS['exam_name']; echo $summary;?></center></td>
                <td><center><?php $summary = $rowTS['positive_number']; echo $summary;?></center></td>
                <td><center><?php $summary = $rowTS['negative_number']; echo $summary;?></center></td>

                <td><center><?php $summary = $rowTS['position']; echo $summary; ?></center></td>
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
                <th><center>Serial Number</center></th>
                <th><center>Coaching Roll Number</center></th>
                <th><center>Exam Name</center></th>
                <th><center>Positive Number</center></th>
                <th><center>Negative Number</center></th>

                <th><center>Position</center></th>
            </tr>
            </thead>
            <tr>
                <td colspan="7" style="color: red"><center><?php echo "No result to show"; ?></center></td>
            </tr>
            <?php }
            ?>
        </table>


</div>
</body>
</html>