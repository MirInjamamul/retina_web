<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){

        include 'DatabaseConfig.php';

        $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

        $d1 = $_POST['d1'];
        $d2 = $_POST['d2'];
        $d3 = $_POST['d3'];
        $d4 = $_POST['d4'];
        $d5 = $_POST['d5'];
        $d6 = $_POST['d6'];
        $d7 = $_POST['d7'];
        $d8 = $_POST['d8'];
        $d9 = $_POST['d9'];
        $d10 = $_POST['d10'];
        $d11 = $_POST['d11'];
        $d12 = $_POST['d12'];
        $d13 = $_POST['d13'];
        $d14 = $_POST['d14'];
        $d15 = $_POST['d15'];
        $d16 = $_POST['d16'];

        $CheckSQL = "SELECT * FROM MusicianLoginTable WHERE name='$name'";
        
        $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
        
        if(isset($check)){

            echo 'Email Already Exist';

        }
        else{ 
            $Sql_Query = "INSERT INTO MusicianLoginTable (name,fname,mname,bg,nid,present,permanent,profession,reality,position,instrument,experience,organization,phone,familymobile,relation) 
                        values ('$d1','$d2','$d3','$d4','$d5','$d6','$d7','$d8','$d9','$d10','$d11','$d12','$d13','$d14','$d15','$d16')";

        if(mysqli_query($con,$Sql_Query))
        {
            echo 'Registration Successfully';
        }
        else
        {
            echo 'Something went wrong';
        }
        }
    }
    mysqli_close($con);
?>