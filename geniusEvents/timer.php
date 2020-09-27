<?php

?>
<html>
    <head>
    
    </head>
    <body>
    <p id="demo"></p>

        <script>
            // Set the date we're counting down to
            var oldDateObj = new Date().getTime();
            var newDateObj = new Date();
            newDateObj.setTime(oldDateObj + (30 * 60 * 1000));

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
            document.getElementById("demo").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
            }, 1000);
        </script>
    </body>
</html>