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
    <h1 class="col-lg-6 display-4">Music Results</h1>
    <hr class="my-3">
      <h6 class="col-sm-4"><a class="link" href="search.php"> Return to Search</a></h6>
    </div>
    <hr class="my-3">

</body>
</html>

<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "musicdbproject";

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

$sql="";

if(!empty($_GET['song_name'])||!empty($_GET['artist_name'])||!empty($_GET['album_name'])
    ||!empty($_GET['genre']))
{
  if(!empty($_GET['song_name']))
  {
    $song=$_GET['song_name'];
    $sql = "SELECT Song.Song_name, Song.Artist_name, Song.Album_name
            FROM Song
            WHERE Song.Song_name = '$song'";
  }
  else if (!empty($_GET['artist_name']))
  {
    $artist=$_GET['artist_name'];
    $sql = "SELECT Song.Song_name, Song.Artist_name, Song.Album_name
            FROM Song
            WHERE Song.Artist_name = '$artist'";
  }
  else if (!empty($_GET['album_name']))
  {
    $album=($_GET['album_name']);
    $sql = "SELECT Song.Song_name, Song.Artist_name, Song.Album_name
            FROM Song
            WHERE Song.Album_name = '$album'";
  }
  else if (!empty($_GET['genre']))
  {
    $genre=($_GET['genre']);
    $sql = "SELECT Song.Song_name, Song.Artist_name, Song.Album_name
            FROM Song, Album
            WHERE Song.Album_name = Album.Album_name AND Album.genre = '$genre'";
  }

  $result = $conn->query($sql);

  if ($result->num_rows > 0)
  {
      echo "<table class='table table-hover'>
                <thead>
                  <tr>
                  <th scope='col'>Song</th>
                  <th scope='col'>Artist</th>
                  <th scope='col'>Album</th>
                  <th></th>
                  </tr>
                </thead>";
      while($row = $result->fetch_assoc())
      {
          $song_name = $row["Song_name"];
          $artist_name = $row["Artist_name"];
          $album_name = $row["Album_name"];

          echo"<form action='add_to_playlist.php'>
                <tr>
                  <td>" . $row["Song_name"]. "</td>
                  <td>" . $row["Artist_name"]. "</td>
                  <td>" . $row["Album_name"]. "</td>
                  <td>
                  <input type='hidden' name='song_name' value='$song_name'>
                  <button type='submit' class='btn-outline-primary btn-sm'>
                  Add to Playlist</button></td>
                  </tr>
                </form>";
      }
    }
    else
    {
        echo "<h5>0 Results found. Please go back and change your search.</h5>";
    }
if (!mysqli_query($conn, $sql))
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
else
{
    echo "<h5>No Search parameters entered. Please go back and change your search.</h5>";
}

mysqli_close($conn);
?>
