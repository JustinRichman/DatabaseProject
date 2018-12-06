<html>
  <head>
    <title>Welcome to Lyrical Masterminds!</title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body background = "back.png">
    <center><b>Your selected username/email is: </b> <?php echo $_POST["email"]; ?><br></center>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ptest";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);}

      $email = $_POST["email"];
      $psw = $_POST["psw"];

      $INemail = mysqli_real_escape_string($conn, $_POST['email']);
      $INpsw = mysqli_real_escape_string($conn, $_POST['psw']);

      $sql = "INSERT INTO user (email, psw) VALUES ('$INemail', '$INpsw')";
      if(mysqli_query($conn, $sql)){
        echo "<center>Records added successfully.</center>";
      } else{
        echo "<center>ERROR: Could not able to execute $sql.</center> " . mysqli_error($conn);
      }

      $conn->close();
    ?>
    <center><a href="signuplogin.php" style="color:black" class="next">Next &raquo;</a><center><br/>
      You will be returned to to the sign up/login page.
  </body>
</html>
