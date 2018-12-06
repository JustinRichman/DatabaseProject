<html>
<head>
  <title>Lyrical Masterminds</title>
  <link rel="stylesheet" href="main.css">
</head>
<body background = "back.png">
  <p> </p>
  <form action="homepage.php" method="post">
  <button type="submit" style="height:60px; width:100px">Home</button></form>
  <form action="logout.php" method="post">
  <right><button type="submit" style="height:60px; width:100px">Logout</button>
    <p align="right"> user: <?php
    session_start();
    echo $_SESSION['email'];?></p></form>
 <p></p>
 <center><h2>Let's Get Started!</h2></center>
 <div class="container" style="float:center">
   <form action="artistsearch.php" method="post">
     <input type="text" placeholder="Enter Artist Name" name="artistname" required>
     <center><button type="submit">Search</button><center>
    </form>
 </div>
 <br>
 <br>
</body>
</html>
