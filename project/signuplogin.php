<html>
 <head>
 <title>Lyrical Masterminds</title>
 <link rel="stylesheet" href="main.css">
 </head>
 <body background = "back.png">
 <?php
 echo '<p> </p>';
 echo '<h2><center>Welcome to the Lyrical Mastermind Playlist Page!</center></h2>';
 echo '<center>Please sign up or login and begin creating and browsing playlists made by you and others!</center>'
 ?>
 <div class="container">
   <div style="float:left">
     <form action="welcome.php" method="post">
       <label for="uname"><b>Email</b></label>
       <input type="text" placeholder="Enter Email" name="email" required>

       <label for="psw"><b>Password</b></label>
       <input type="password" placeholder="Enter Password" name="psw" required>
       <button name="mysubmitbutton" id="mysubmitbutton" type="submit" class="customButton">
         Sign Up
       </button>
       <br/>*Please Remember Your Password*<br/>
     </form>
   </div>
 </div>
  <div class="container">
   <div style="float:right">
     <form action="login.php" method="post">
       <label for="uname"><b>Email</b></label>
       <input type="text" placeholder="Enter Email" name="email" required>
       <label for="psw"><b>Password</b></label>
       <input type="password" placeholder="Enter Password" name="psw" required>
       <button type="submit">Login</button>
     </form>
   </div>
 </div>
 <br>
 <br>
 </body>

</html>
