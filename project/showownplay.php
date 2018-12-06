<html>
<head>
  <title>Lyrical Masterminds</title>
  <link rel="stylesheet" href="main.css">
</head>
<body background = "back.png">
  <form action="homepage.php" method="post">
  <button type="submit" style="height:60px; width:100px">Home</button></form>
  <form action="logout.php" method="post">
  <right><button type="submit" style="height:60px; width:100px">Logout</button>
    <p align="right"> user: <?php
    session_start();
    echo $_SESSION['email'];?></p></form>
 <p></p>
 <center><h2>Playlist Songs Results</h2>
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

       $sql = "SELECT title, tags FROM playlist WHERE pid = '" . $_SESSION['pid'] . "'";
       $result = $conn->query($sql);
       if($result->num_rows > 0){
         while($row = $result->fetch_assoc()){
                 echo "<h6><center>Title: " . $row['title']. " - Tags/Genre: " . $row['tags']. "</center></h6>";

        }}
        else{
          echo "0";
        }

       $sql = "SELECT song.artist, playlisthassong.sid, song.stitle FROM playlisthassong, song WHERE playlisthassong.pid = '" . $_SESSION['pid'] . "' AND playlisthassong.sid = song.sid";

       $result = $conn->query($sql);

       if($result->num_rows > 0){
         while($row = $result->fetch_assoc()){
                 echo "<center>ID: " . $row['sid']. " - Artist: " . $row['artist']. " - Song Title: " . $row['stitle']. "</center><br>";

        }}
        else{
          echo "0 Songs";
        }?>
        <div class="container" style="float:center">
          <form action="deletesong.php" method="post">
            <input type="text" placeholder="Enter Song ID (i.e.: 1)" name="sid" required>
            <center><button type="submit">Delete</button></center>
          </form>
          <form action="artistsearchform.php" method="post">
            <center><button type="submit">Add Song</button></center>
          </form>
          <form action="updatepname.php" method="post">
            <center><button type="submit">Change Name</button></center>
          </form>
        </div>
            <br>
            <br>
</body>
</html>
