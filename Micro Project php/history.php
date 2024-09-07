<?php
include('nav.php');
include('conn.php');

session_start();

if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $fetch = "SELECT datetime, statement, deposit, withdraw FROM balance WHERE username = ?";
    if($stmt = mysqli_prepare($conn, $fetch)) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if(mysqli_num_rows($result) > 0) {
            echo "<div class='container p-4 d-flex justify-contain-center'>";
            echo "<div class='col border rounded p-3'>";
            echo "<h1>Transaction history</h1><br><br>";
      
            echo "<table class='table table-striped table-hover'>";
            echo "<tr>";
            echo "<th>DATETIME</th>";
            echo "<th>STATEMENT</th>";
            echo "<th>DEPOSIT AMOUNT</th>";
            echo "<th>WITHDRAW AMOUNT</th>";
            echo "</tr>";

            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['datetime'] . "</td>";
                echo "<td>" . $row['statement'] . "</td>";
                echo "<td>" . $row['deposit'] . "</td>";
                echo "<td>" . $row['withdraw'] . "</td>";
                echo "</tr>";
            }
            echo "</div>";
            echo "</div>";
            echo "</table>";
        } else {
            echo "No records found";
        }
    } else {
        echo "Error in preparing statement: " . mysqli_error($conn);
    }
} else {
    header("Location: http://localhost/php_p/micro/index.php");
    exit();
}

mysqli_close($conn);
?>

