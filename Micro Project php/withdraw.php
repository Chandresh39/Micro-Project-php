<?php
include('nav.php');
include('conn.php');

session_start();

if(isset($_SESSION['username'], $_REQUEST['statement'], $_REQUEST['amount'])) {
    
    $username = mysqli_real_escape_string($conn, $_SESSION['username']);
    $statement = mysqli_real_escape_string($conn, $_REQUEST['statement']);
    $amount = intval($_REQUEST['amount']);

    $check_balance_query = "SELECT SUM(deposit) AS total_dep, SUM(withdraw) AS total_with FROM balance WHERE username = '$username'";
    $balance_result = mysqli_query($conn, $check_balance_query);
    if($balance_result && mysqli_num_rows($balance_result) > 0){
        $row =mysqli_fetch_assoc($balance_result);
    $closing_b = $row['total_dep'] - $row['total_with'];
       
        if($closing_b - $amount >= 0){
            $currentDate = date('Y-m-d H:i:s');
            $ins = "INSERT INTO balance (`username`, `statement`, `datetime`, `withdraw`) VALUES ('$username', '$statement', '$currentDate', '$amount')";

            if (mysqli_query($conn, $ins)) {
                header('Location: http://localhost/php_p/micro/userinfo.php');
                exit();
            } else {
                echo "Error: " . $ins . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Insufficient balance";
        }
    } else {
        echo "Error: Unable to fetch balance!";
    }
} else {
    echo "Error: Required fields not set!";
}

mysqli_close($conn);
?>
