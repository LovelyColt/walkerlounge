<?php
    session_start();
    mysql_connect("sql302.epizy.com", "epiz_30397816", "CJtbkzaAozue");
    mysql_select_db("epiz_30397816_Users");
?>
<html>
<head>
  <title>Who's Onit?</title>
  <link rel="stylesheet" type="text/css" href="whosonit.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="icon" href="http://walkerlounge.com/whosonit.ico">
</head>

<body>
    <div id="logout">
        <a href="/logout.php" class="btn btn-default" style="float:right;">Logout</a>
    </div>
    <a href="/index.php" class="btn btn-default" style="float:left;">Home</a>
    <div class="jumbotron text-center">
        <h1>Whos Onit In</h1>
        <h1 id="timer"></h1>
    </div>  
    <div style="text-align: center;">
        <table>
        <tr style="padding:15px;">
            <th style="padding:15px;">Name</th>
            <th style="padding:15px;">Onit</th>
        </tr>

        <?php

            $result = mysql_query("SELECT username, onit FROM users");

            if (mysql_num_rows($result)) {
                while ($row = mysql_fetch_assoc($result)) {
                    echo
                        "<tr>
                            <td>{$row['username']}</td>
                            <td>{$row['onit']}</td>
                        </tr>";
                }
            }
        ?>
    </table>
    </div>
    <br><br>
    <?php
        $sql = "SELECT onit FROM users IF ('Onit', '1', '0') WHERE id = " . $_SESSION['id'];
        if ($sql != "1"){
    ?>
        <div style="text-align: center;">
            <form action="insert.php" method="post">
                <input type="checkbox" name="onit" value="Onit" <?php echo (isset($_GET['onit']) ? 'checked="checked"' : '')?> />
                <label for="onit">Will You Be Onit?</label>
                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
            </form>
        </div>
    <?php
        }
    ?>

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


</body>

</html>