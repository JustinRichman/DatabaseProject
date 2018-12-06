<html>
 <head>
 <title>If logged in go to homepage.php if not go to hello.php</title>
 <link rel="stylesheet" href="main.css">
 </head>
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
//mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $psw = mysqli_real_escape_string($conn, $_POST['psw']);
   $sql = mysqli_query($conn, "SELECT * FROM user
       WHERE email = '$email' AND
       psw = '$psw'
       LIMIT 1");
   if(mysqli_num_rows($sql) == 1){
       $row = mysqli_fetch_array($sql);
       session_start();
       $_SESSION['email'] = $row['email'];
       $_SESSION['id'] = $row['id'];
       $_SESSION['logged'] = TRUE;
       header("Location: homepage.php"); // Modify to go to the page you would like
       exit;
   }else{
       header("Location: signuplogin.php");
       exit;
   }
//else{    //If the form button wasn't submitted go to the index page, or login page
  // header("Location: hello.php");
  // exit;
//}
 ?>
</body>

</html>
