<?php
include('conn.php');

session_start();

$user = mysqli_real_escape_string($conn, $_REQUEST['username']);
$pass = mysqli_real_escape_string($conn, $_REQUEST['password']);

$select = "SELECT USERNAME, PASSWORD FROM bankdetail WHERE USERNAME = '$user'";
$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    if($row['PASSWORD'] === $pass) {
        $_SESSION['username'] = $user;
        header("Location: http://localhost/php_p/micro/userinfo.php");
        exit();
    } else {
        echo "Error! Invalid Password";
        header("Location: http://localhost/php_p/micro/index.php");
        exit();
    }
} else {
    echo "Error! Invalid Username";
    header("Location: http://localhost/php_p/micro/index.php");
    exit();
}

mysqli_close($conn);
?>
