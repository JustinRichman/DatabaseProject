<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet"
  href="main.css">
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

  $data = file_get_contents("http://api.musixmatch.com/ws/1.1/chart.tracks.get?chart_name=top&page=2&page_size=100&country=usa&apikey=2285ea6f1d77203990d85b8368f13164&&format=xml");
//http://api.musixmatch.com/ws/1.1/track.search?q_artist=".$name."&page_size=10&page=1&s_track_rating=desc&apikey=2285ea6f1d77203990d85b8368f13164&&format=xml"
  $soap = simplexml_load_string($data);

  //echo $soap->body->track_list->track[0]->track_name;
  $tart = $soap->body->track_list->track[0]->track_name;
  echo $tart;

  for($x = 0; $x < 100; $x++){
    $tname = $soap->body->track_list->track[$x]->track_name;
    echo $tart;
    $tart = $soap->body->track_list->track[$x]->artist_name;

    $sql = "INSERT INTO song (artist, stitle) VALUES ('$tart', '$tname')";
    if(mysqli_query($conn, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
  }
    $conn->close();
/*
  <form action="show.php" method="post">
  Name: <input type="text" name="song"><br>
  <input type="Ex. Artist - Song">
*/
  ?>




  </form>
  </body>
  </html>
