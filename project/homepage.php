<html>
  <head>
    <title>Welcome to Lyrical Masterminds!</title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body background = "back.png">
    <form action="homepage.php" method="post">
    <button type="submit" style="height:60px; width:100px">Home</button></form>
    <form action="logout.php" method="post">
    <button type="submit" style="height:60px; width:100px">Logout</button>
    <p align="right"> user: <?php
    session_start();
    echo $_SESSION['email'];?></p></form>
    <u><center><h2>Welcome please select your next step!</h2></center></u>
    <form action="createplay.php" method="post">
      <center><button name="createplaylistbutton" id="cplaylistbutton" type="submit" class="customButton">
        Create Playlist
      </button></center>
    </form>
    <form action="browseplay.php" method="post">
      <center><button name="browseplaylistbutton" id="bplaylistbutton" type="submit" class="customButton">
        Browse Playlists
      </button></center>
    </form>
    <form action="editplay.php" method="post">
      <center><button name="editplaylistbutton" id="eplaylistbutton" type="submit" class="customButton">
        Edit Playlist
      </button></center>
    </form>
    <form action="showallsongs.php" method="post">
      <center><button name="editplaylistbutton" id="eplaylistbutton" type="submit" class="customButton">
        View All Songs
      </button></center>
    </form>
    <br>
    <br>
    <br>
    <center><h4>Top Songs Added to Playlist</h4>
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

      $sql = "SELECT song.artist, song.stitle, song.sid, COUNT(song.sid) FROM song, playlisthassong GROUP BY song.sid LIMIT 5";
      $result = $conn->query($sql);
      $num = 1;
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo $num;
          echo ") Artist: " . $row['artist']. " - Song Title: " . $row['stitle']. "<br>";
          $num = $num + 1;
        }
      } else {
        echo "0 results";
      }
      ?>
    </center>
    <br>
    <center>
    <h6>Top 3 Rated Playlist</h6>
      <?php
    $sql = "SELECT review.rate, review.pid, AVG(review.rate), playlist.title, playlist.tags FROM review, playlist WHERE playlist.pid = review.pid GROUP BY review.pid ORDER BY AVG(review.rate) DESC LIMIT 3";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      $num = 1;
      while($row = $result->fetch_assoc()) {
        echo $num;
        echo ") Playlist: " . $row['title']. " - Tags: " . $row['tags']. "<br>";
        $num = $num + 1;
      }
    } else {
      echo "0 results";
    }
    ?>
  </center>
  <br>
    <br>
  </body>
</html>
