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
        <li class="nav-item active">
          <a class="nav-link" href="#">Search Music<span class="sr-only">(current)
          </span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="playlists.php">Playlists</a>
        </li>
     </ul>
    </div>
  </nav>

  <div class="Jumbotron">
    <h1 class="col-lg-6 display-4">Add to Playlist</h1>
    <hr class="my-3">
      <h6 class="col-sm-4"><a class="link" href="search.php"> Return to Search</a></h6>
    </div>
    <hr class="my-3">

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

$song_name  = $_GET['song_name'];
$artist_name  = $_GET['artist_name'];
$album_name  = $_GET['album_name'];

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

$pl_query = "SELECT Playlist.Playlist_name
            FROM Playlist
            WHERE Playlist.User_name = 'BlueMan'";

$pl_result = $conn->query($pl_query);

if ($pl_result->num_rows > 0)
{
  echo "<table class='table table-hover'>
            <thead>
              <tr>
                <th scope='col'>Playlist</th>
                <th scope='col'></th>
              </tr>
            </thead>";

  while($row = $pl_result->fetch_assoc())
  {
    $plname = $row["Playlist_name"];

    echo "<tr><form method='get' action='add_song.php'><td>
            <input type='hidden' name='song_name' value='$song_name'>
            <input type='hidden' name='artist_name' value='$artist_name'>
            <input type='hidden' name='album_name' value='$album_name'>
            <input type='hidden' name='pl_name' value='$plname'>
            <button type='submit' class='btn-outline-primary btn-md'>"
            .$plname. "</button></td></form></tr>";
  }
}
else
{
  echo "<h5>Playlist is empty.</h5>";
}
if (!mysqli_query($conn, $pl_query))
{
  echo "Error: " . $pl_query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
 ?>
