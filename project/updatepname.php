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
 <center><h2>Type Newly Desired Playlist Name</h2></center>
 <div class="container" style="float:center">
   <form action="newplayname.php" method="post">
     <input type="text" placeholder="Enter Playlist Name" name="new" required>
     <center><button type="submit">Submit</button></center>
   </form>
   <form action="editplay.php" method="post">
     <center><button type="submit">Cancel</button></center>
   </form>
 </div>
 <br>
 <br>
</body>
</html>
