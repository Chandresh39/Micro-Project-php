<?php
include('nav.php');
include('conn.php');

session_start();

if(isset($_REQUEST['statement'], $_REQUEST['amount'])) {
    
    $statement = mysqli_real_escape_string($conn, $_REQUEST['statement']);
    $amount = intval($_REQUEST['amount']);

    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        $currentDate = date('Y-m-d H:i:s');

        $ins = "INSERT INTO balance (`username`, `statement`,  `datetime`, `deposit`) VALUES 
        ('$username', '$statement', '$currentDate', '$amount')";

        if (mysqli_query($conn, $ins)) {
            header('Location: http://localhost/php_p/micro/userinfo.php');
            exit();
        } else {
            echo "Error: " . $ins . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error: Username not set in session!";
    }
} else {
    echo "Error: Required fields not set!";
}

mysqli_close($conn);
?>
