<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

</head>

<body>

  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <button class="navbar-toggler navbar-toggler-right" type="button"
      data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!--<a class="navbar-brand" href="#">Navbar</a>-->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="../musicdb.php">Home<span class="sr-only">
          </span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="account.php">Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="search.php">Search Music</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Playlists<span class="sr-only">(current)
          </span></a>
        </li>
     </ul>
    </div>
  </nav>

  <div class="Jumbotron">
    <h1 class="col-lg-6 display-4"> Playlist Results</h1>
    <hr class="my-3">
    <h6 class="col-sm-4"><a class="link" href="playlists.php"> Return to Playlist Search</a></h6>
    <hr class="my-3">
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
    integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
    crossorigin="anonymous"></script>
  </body>
  </html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "musicdbproject";

$s_query = "";

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

$plname = $_GET['pl_name'];
$user = $_GET['user_name'];

$s_query = "SELECT Add_Song.Song_name, Add_Song.Artist_name, Add_Song.Album_name
            FROM Add_Song
            WHERE Add_Song.Playlist_name='$plname' AND Add_Song.User_name='$user'";

$s_result = $conn->query($s_query);

$add_query = "SELECT COUNT(Add_Song.Song_name)
              FROM Add_Song
              WHERE Add_Song.Playlist_name = '$plname' AND Add_Song.User_name = '$user'";

$add_result = $conn->query($add_query);
$add_rows = $add_result->fetch_assoc();

if($s_result->num_rows > 0)
{
  echo "<h5>" .$plname. "</h5>
        <table class='table table-hover'>
        <thead>
          <tr>
          <th scope='col'>Song</th>
          <th scope='col'>Artist</th>
          <th scope='col'>Album</th>
          <th>Number of Songs: " .$add_rows['COUNT(Add_Song.Song_name)']. "</th>
          </tr>
        </thead>";
    while($row = $s_result->fetch_assoc())
    {
        $song_name = $row["Song_name"];
        $artist_name = $row["Artist_name"];
        $album_name = $row["Album_name"];

        echo"<tr>
              <td>" . $row["Song_name"]. "</td>
              <td>" . $row["Artist_name"]. "</td>
              <td>" . $row["Album_name"]. "</td>";
              if($user == 'BlueMan')
              {
                echo "<td><form action='add_to_playlist.php'>
                        <input type='hidden' name='song_name' value='$song_name'>
                        <button type='submit' class='btn-outline-primary btn-sm'>
                      Add to Playlist</button></form></td>
                      <td><form method='get' action='remove_song.php'>
                        <input type='hidden' name='song_name' value='$song_name'>
                        <input type='hidden' name='plname' value='$plname'>
                        <button type='submit' class='btn-outline-danger btn-sm'>
                      Remove From Playlist</button></form></td>";
              }
              echo "</tr>";
    }
  }
  else
  {
    echo "<h5>Playlist is empty.</h5>";
  }

  if (!mysqli_query($conn, $s_query))
  {
    echo "Error: " . $s_query . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);
?>
