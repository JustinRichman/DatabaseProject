<html>
 <body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ptest";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
unset($_SESSION["email"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
unset($_SESSION["id"]);
header("Location: signuplogin.php");
 ?>
</body>

</html>
