<?php
    // Initialize the session
    session_start();
    
    // Check if the user is logged in, if not then redirect them to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: register.php");
        exit;
    }
    define('DB_SERVER', 'sql302.epizy.com');
    define('DB_USERNAME', 'epiz_30397816');
    define('DB_PASSWORD', 'CJtbkzaAozue');
    define('DB_NAME', 'epiz_30397816_Users');
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    $is_onit = (isset($_POST['onit']) ? 'Onit' : '');
    $sql="UPDATE users SET onit=('$is_onit') WHERE id = " . $_SESSION['id'];
    if (mysqli_query($conn, $sql)) {
        echo "Let's gan radge";
        header("location: index.php");
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      
      mysqli_close($conn);
?>