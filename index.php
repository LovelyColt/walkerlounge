<?php
    // Initialize the session
    session_start();

    // Check if the user is logged in, if not then redirect them to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: register.php");
        exit;
    }

?>

<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <title>Who's Onit?</title>
        <link rel="icon" href="http://walkerlounge.com/whosonit.ico">
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <p style="float:left">Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?></p>
        <div id="logout">
            <a href="logout.php" class="btn btn-default" style="float:right;">Logout</a>
        </div>
        <h1 style="text-align: center; font-size:75px;">Who's Onit?</h1>
        <h1 id="timer" style="text-align: center; font-size:100px; font-family: 'Courier New', Courier, monospace;"></h1>
        <script>
            // Set the date we're counting down to
            var countDownDate = new Date("Dec 4, 2021 19:00:00").getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("timer").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("timer").innerHTML = "EXPIRED";
            }
            }, 1000);
        </script>
        <br><br>
        <div class="col text-center">
            <a href="/WhosOnit/" class="btn btn-primary" style="text-align:center">See Who's Onit</a>
        </div>
        <br><br>
        <div class="col text-center">
            <a href="/Lengerz/" class="btn btn-primary" style="text-align:center">Top 5 Walker Lounge Lengerz</a>
        </div>
        <br><br>
        <div class="col text-center">
            <a href="/Napoleon/" class="btn btn-primary" style="text-align:center">Napoleon On A Quad</a>
        </div>
    </body>
</html>
