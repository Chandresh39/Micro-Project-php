<?php
include('nav.php'); 
include('conn.php'); 

session_start();

if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    
    $user = mysqli_real_escape_string($conn, $_REQUEST['username']);
    $pass = mysqli_real_escape_string($conn, $_REQUEST['password']);;
    
    $info = "SELECT username,password FROM bankdetail WHERE username = '$username'";
    $result = mysqli_query($conn, $info);
    
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $db_username = $row['username'];
        $db_password = $row['password'];
        
        if($user == $db_username && $pass == $db_password){
                $delete_acc = "DELETE FROM bankdetail WHERE username = '$username'";
                $delete = "DELETE FROM balance WHERE username = '$username'";
                if(mysqli_query($conn, $delete) && mysqli_query($conn, $delete_acc)) {
                    header('Location: http://localhost/php_p/micro/index.php');
                }else {
                    echo "Errror!";
                }
            }else{
                echo "enter vaild username or password";
            }
        }else{
            echo "Account not found";
        }
    }     
mysqli_close($conn);
?>
