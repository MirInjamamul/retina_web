<?php
    include_once 'database.php';
    session_start();
    if(!(isset($_SESSION['email'])))
    {
        header("location:login.php");
    }
    else
    {
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        include_once 'database.php';
    }

    // $time = mysqli_query($con,"SELECT exam_time FROM event_exam" );
    // $row = mysqli_fetch_array($time);
    // $exam_time = $row['exam_time'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome | Retina Online System</title>
    <link  rel="stylesheet" href="css/bootstrap.min.css"/>
    <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
    <link rel="stylesheet" href="css/welcome.css">
    <link  rel="stylesheet" href="css/font.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>

    <!-- <script type="text/javascript">
        function jsFunction(){

                var time = "<?php echo $exam_time ?>"; 

                // Set the date we're counting down to
                var oldDateObj = new Date().getTime();
                var newDateObj = new Date();
                newDateObj.setTime(oldDateObj + (time * 60 * 1000));

                // Update the count down every 1 second
                var x = setInterval(function() {

                // Get today's date and time
                var now = new Date().getTime();
                console.log(now);
                
                //Extra Test
                var oldDateObj = new Date().getTime();

                // Find the distance between now and the count down date
                //var distance = countDownDate - now;
                var distance = newDateObj - oldDateObj;


                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result in the element with id="demo"
                document.getElementById("exam_time").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";

                // If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("exam_time").innerHTML = "EXPIRED";
                }
                }, 1000);
           
            
    }
</script> -->

</head>
<body>
    <nav class="navbar navbar-default title1">
        <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        <a class="navbar-brand" href="#"><b>Retina Online Exam System</b></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-left">
            <li <?php if(@$_GET['q']==1) echo'class="active"'; ?> ><a href="welcome.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</span></a></li>
            <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>> <a href="welcome.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;History</a></li>
            <li <?php if(@$_GET['q']==3) echo'class="active"'; ?>> <a href="welcome.php?q=3"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Ranking</a></li>
            <li> <a href="#"><span id="exam_time" class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;Time Left : </a></li>
            
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <li <?php echo''; ?> > <a href="logout.php?q=welcome.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Log out</a></li>
        </ul>
        
            
           
       
        </div>
    </div>
    </nav>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(@$_GET['q']==1) 
                {
                    $result = mysqli_query($con,"SELECT * FROM event_exam ORDER BY date DESC") or die('Error Quiz table Not Table');
                    echo  '<div class="panel">
                                <div class="table-responsive">
                                    <table class="table table-striped title1">
                                        <tr>    
                                            <td><center><b>S.N.</b></center></td>
                                            <td><center><b>Topic</b></center></td>
                                            <td><center><b>Total question</b></center></td>
                                            <td><center><b>Marks</center></b></td>
                                            <td><center><b>Status</center></b></td>
                                            <td><center><b>Action</b></center></td>
                                        </tr>';
                    $c=1;
                    while($row = mysqli_fetch_array($result)) {
                        $title = $row['title'];
                        $total = $row['total'];
                        $sahi = $row['positive_number'];
                        $eid = $row['exam_id'];
                        $start = $row['started'];

                        if($start == 1){
                            $q12=mysqli_query($con,"SELECT score FROM history WHERE exam_id='$eid' AND email='$email'" )or die('Error98');
                            $rowcount=mysqli_num_rows($q12);	
                            if($rowcount == 0){
                                echo 
                                '<tr>
                                    <td><center>'.$c++.'</center></td>
                                    <td><center>'.$title.'</center></td>
                                    <td><center>'.$total.'</center></td>
                                    <td><center>'.$sahi*$total.'</center></td>
                                    <td><center>Exam is Running</center></td>
                                    <td><center><b><a href="welcome.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'" class="btn sub1" style="color:black;margin:0px;background:#1de9b6"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></center></td>
                                </tr>';
                            }else
                            {
                                echo 
                                    '<tr style="color:#99cc32">
                                        <td><center>'.$c++.'</center></td>
                                        <td><center>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></center></td>
                                        <td><center>'.$total.'</center></td><td><center>'.$sahi*$total.'</center></td>
                                        <td><center>Exam is Running</center></td>
                                        <td><center><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="color:black;margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b></center></td>
                                    </tr>';
                            }
                        }else{
                            echo 
                                '<tr>
                                    <td><center>'.$c++.'</center></td>
                                    <td><center>'.$title.'</center></td>
                                    <td><center>'.$total.'</center></td>
                                    <td><center>'.$sahi*$total.'</center></td>
                                    <td><center>Exam is Not Running</center></td>
                                    <td><center><b><a href="#" class="btn sub1" style="color:black;margin:0px;background:#1de9b6"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></center></td>
                                </tr>';
                        }
                    }
                    $c=0;
                    echo '</table></div></div>';
                }?>

                <?php
                    if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) 
                    {
                        $eid=@$_GET['eid'];
                        $sn=@$_GET['n'];
                        $total=@$_GET['t'];
                        
                        $time = mysqli_query($con,"SELECT * FROM exam_time WHERE exam_id='$eid' AND email='$email' " );

                        if(mysqli_num_rows($time)== 0){
                            //Set the countdown to 1200 seconds.
                            $_SESSION['countdown'] = 120;
                            //Store the timestamp of when the countdown began.
                            $_SESSION['time_started'] = time();
                            $_SESSION['time_end'] = abs($_SESSION['time_started']+$_SESSION['countdown']);
                            $now = time();

                            //Calculate how many seconds have passed since
                            //the countdown began.
                            //$timeSince = $now - $_SESSION['time_started'];
                            
                            //How many seconds are remaining?
                            $remainingSeconds = abs($_SESSION['time_end'] - $now);
                            
                            //Print out the countdown.
                            echo "There are $remainingSeconds seconds remaining.";

                            $q=mysqli_query($con,"INSERT exam_time VALUES('$eid','$email' ,'1')")or die('Error999');

                         }
                         else{
                            $now = time();

                            //Calculate how many seconds have passed since
                            //the countdown began.
                            //$timeSince = $now - $_SESSION['time_started'];
                            
                            //How many seconds are remaining?
                            $remainingSeconds = abs($_SESSION['time_end'] - $now);
                            
                            //Print out the countdown.
                            echo "There are $remainingSeconds seconds remaining.";
                            
                            //Check if the countdown has finished.
                            if($remainingSeconds < 1){
                            //Finished! Do something.
                            }
                        }     

                        
                        
                        //echo '<script type="text/javascript">jsFunction();</script>';

                        $q=mysqli_query($con,"SELECT * FROM questions WHERE exam_id='$eid' AND serial_no='$sn' " );
                        echo '<div class="panel" style="margin:5%">';
                        while($row=mysqli_fetch_array($q) )
                        {
                            $qns=$row['question'];
                            $qid=$row['question_id'];
                            echo '<b>Question &nbsp;'.$sn.'&nbsp;::<br /><br />'.$qns.'</b><br /><br />';
                        }
                        $q=mysqli_query($con,"SELECT * FROM exam_options WHERE question_id='$qid' " );
                        echo '<form action="update.php?q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST"  class="form-horizontal">
                        <br />';

                        while($row=mysqli_fetch_array($q) )
                        {
                            $option=$row['options'];
                            $optionid=$row['option_id'];
                            echo'<input type="radio" name="ans" value="'.$optionid.'">&nbsp;'.$option.'<br /><br />';
                        }
                        echo'<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button></form></div>';
                    }

                    if(@$_GET['q']== 'result' && @$_GET['eid']) 
                    {
                        $eid=@$_GET['eid'];
                        $q=mysqli_query($con,"SELECT * FROM history WHERE exam_id='$eid' AND email='$email' " )or die('Error157');
                        echo  '<div class="panel">
                        <center><h1 class="title" style="color:#660033">Result</h1><center><br />
                        <table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

                        while($row=mysqli_fetch_array($q) )
                        {
                            $s=$row['score'];
                            $w=$row['wrong_answer'];
                            $r=$row['right_answer'];
                            $qa=$row['level'];
                            echo '<tr style="color:#66CCFF">
                                    <td>Total Questions</td>
                                    <td>'.$qa.'</td>
                                </tr>
                                <tr style="color:#99cc32">
                                    <td>right Answer&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td>
                                    <td>'.$r.'</td>
                                </tr> 
                                <tr style="color:red">
                                    <td>Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td>
                                    <td>'.$w.'</td>
                                </tr>
                                <tr style="color:#66CCFF">
                                    <td>Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td>
                                    <td>'.$s.'</td>
                                </tr>';
                        }
                        $q=mysqli_query($con,"SELECT * FROM event_exam_rank WHERE  email='$email' " )or die('Error157');
                        while($row=mysqli_fetch_array($q) )
                        {
                            $s=$row['score'];
                            echo '<tr style="color:#990000">
                                        <td>Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td>
                                        <td>'.$s.'</td>
                                    </tr>';
                        }
                        echo '</table></div>';
                    }
                ?>

                <?php
                    if(@$_GET['q']== 2) 
                    {
                        $q=mysqli_query($con,"SELECT * FROM event_exam_history WHERE email='$email' ORDER BY date DESC " )or die('Error197');
                        echo  '<div class="panel title">
                        <table class="table table-striped title1" >
                            <tr style="color:black;">
                                <td><center><b>S.N.</b></center></td>
                                <td><center><b>Quiz</b></center></td>
                                <td><center><b>Question Solved</b></center></td>
                                <td><center><b>Right</b></center></td>
                                <td><center><b>Wrong<b></center></td>
                                <td><center><b>Score</b></center></td>';
                        $c=0;
                        while($row=mysqli_fetch_array($q) )
                        {
                        $eid=$row['exam_id'];
                        $s=$row['score'];
                        $w=$row['wrong_answer'];
                        $r=$row['right_answer'];
                        $qa=$row['level'];
                        $q23=mysqli_query($con,"SELECT title FROM event_exam WHERE  exam_id='$eid' " )or die('Error208');

                        while($row=mysqli_fetch_array($q23) )
                        {  
                            $title=$row['title'];  }
                            $c++;
                        echo '<tr>
                                <td><center>'.$c.'</center></td>
                                <td><center>'.$title.'</center></td>
                                <td><center>'.$qa.'</center></td><td><center>'.$r.'</center></td><td><center>'.$w.'</center></td><td><center>'.$s.'</center></td>
                                </tr>';
                        }
                        echo'</table>
                        </div>';
                    }

                    if(@$_GET['q']== 3) 
                    {
                        $q=mysqli_query($con,"SELECT * FROM event_exam_rank ORDER BY score DESC " )or die('Error223');
                        echo  '<div class="panel title">
                                    <div class="table-responsive">
                                        <table class="table table-striped title1" >
                                            <tr style="color:red">
                                                <td><center><b>Rank</b></center></td>
                                                <td><center><b>Name</b></center></td>
                                                <td><center><b>Email</b></center></td>
                                                <td><center><b>Score</b></center></td>
                                            </tr>';
                        $c=0;

                        while($row=mysqli_fetch_array($q) )
                        {
                            $e=$row['email'];
                            $s=$row['score'];
                            $q12=mysqli_query($con,"SELECT * FROM event_user WHERE email='$e' " )or die('Error231');
                            while($row=mysqli_fetch_array($q12) )
                            {
                                $name=$row['name'];
                            }
                            $c++;
                            echo '<tr>
                                        <td style="color:black"><center><b>'.$c.'</b></center></td>
                                        <td><center>'.$name.'</center></td>
                                        <td><center>'.$e.'</center></td>
                                        <td><center>'.$s.'</center></td>
                                  </tr>';
                        }
                        echo '</table></div></div>';
                    }
                ?>
</body>
</html>