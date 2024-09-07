<?php
include('conn.php');

$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
$mb = intval($_REQUEST['mobileno']);
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$pass = mysqli_real_escape_string($conn, $_REQUEST['password']);
$user = mysqli_real_escape_string($conn, $_REQUEST['username']);

$insert = "INSERT INTO bankdetail (`name`, `mobileno`, `email`, `username`, `password`) 
VALUES ('$name', '$mb', '$email', '$user', '$pass')";

if (!mysqli_query($conn, $insert)) {
    echo "record not inserted";
} else {
    header('Location: http://localhost/php_p/micro/');
    exit();
}
mysqli_close($conn);
?>
