<?php
include('nav.php');
include('conn.php');

session_start();

if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
$info = "SELECT name, mobileno, email FROM bankdetail WHERE username = '$username'";
    $result = mysqli_query($conn, $info);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $mobileno = $row['mobileno'];
        $email = $row['email'];

        $balance_query = "SELECT SUM(deposit) AS total_cre, SUM(withdraw) AS total_dep FROM balance WHERE username = '$username'";
        $balance = mysqli_query($conn, $balance_query);

        if($balance) {
            $balance_row = mysqli_fetch_assoc($balance);
            $balance = $balance_row['total_cre'] - $balance_row['total_dep'];
        } else {
            $balance = "Error fetching balance";
        }
    } else {
        $name = "User not found";
        $mobileno = "";
        $email = "";
        $balance = "";
    }
} else {
    $name = "Username not set";
    $mobileno = "";
    $email = "";
    $balance = "";
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BOB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container p-4 d-flex justify-contain-center col-5">
<div class="col border rounded p-3">
                <h1>User Details</h1>
            <form action="passdata.php" method="post">
               <div class="row m-3">
               <span class="input-group-text" id="inputGroup-sizing-default">Name :
               <p class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
               <?php echo $name; ?></p>
               </span>
                </div>

               <div class="row m-3">
               <span class="input-group-text" id="inputGroup-sizing-default">Username :
               <p class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                <?php echo $username; ?></p>
               </span>
                </div>

            <div class="row m-3">
               <span class="input-group-text" id="inputGroup-sizing-default">Mobile Number :
               <p class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                <?php echo $mobileno; ?></p>
               </span>
                </div>

               <div class="row m-3">
               <span class="input-group-text" id="inputGroup-sizing-default">E-mail  :
               <p class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                <?php echo $email; ?></p>
               </span>
                </div>

               <div class="row m-3">
               <span class="input-group-text" id="inputGroup-sizing-default">Balance :
               <p class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                <?php echo $balance; ?></p>
               </span>
                </div>
            </form> 
        </div>
    </div>

</body>
</html>
