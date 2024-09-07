<?php
include('nav.php'); 
include('conn.php'); 

session_start();

if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    
    $old = mysqli_real_escape_string($conn, $_REQUEST['OPassword']);
    $new = mysqli_real_escape_string($conn, $_REQUEST['NPassword']);
    $con = mysqli_real_escape_string($conn, $_REQUEST['CPassword']);
    
    $info = "SELECT password FROM bankdetail WHERE username = '$username'";
    $result = mysqli_query($conn, $info);
    
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];
        
        if($old == $hashed_password){
            if($new === $con) {
                $up = "UPDATE bankdetail SET password = '$con' WHERE username = '$username'";
                if(mysqli_query($conn, $up)) {
                    header('Location: http://localhost/php_p/micro/userinfo.php');
                } else {
                    echo "Error updating password: " . mysqli_error($conn);
                }
            } else {
                echo "New and Confirm passwords do not match";
            }
        } else {
            echo "Incorrect Old Password";
        }
    } else {
        echo "User not found or database error";
    }
} else {
    echo "Session not active or username not set";
}

mysqli_close($conn);
?>
