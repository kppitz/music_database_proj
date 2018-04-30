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
    <h1 class="col-lg-6 display-4">Search for Music</h1>
    <hr class="my-3">
    <div class="col-lg-6 form-inline">
      <h4>Results</h4> <h6 class="col-sm-4"><a class="link" href="search.php"> Return to Search</a></h6>
    </div>
    <hr class="my-3">
  </div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "musicdbproject";

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

/*function add_song($song_name, $artist_name, $album_name)
{
  $sql = "INSERT INTO Add_Song(Username, Playlist_name, Song_name, Artist_name, Album_name);
          VALUES ('Me', 'Library', '$song_name', '$artist_name', '$album_name')";
}*/

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
            WHERE Song.Album_name = Album.Album_name, Album.genre = '$genre'";
  }



    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            $song_name = $row["Song_name"];
            $artist_name = $row["Artist_name"];
            $album_name = $row["Album_name"];

            echo"<form class='form-inline'>
                  <div class='col-sm-4'>
                  <h5>Song: " . $row["Song_name"]. " | Artist: " . $row["Artist_name"]. " | Album: " . $row["Album_name"]. "<br>
                  </h5>
                  </div>
                  <button type='button' action='add_song($song_name, $artist_name, $album_name)'
                    class='btn-outline-primary btn-sm'>Add to Playlist
                  </button>
                  </form>";
        }
    }
    else
    {
        echo "0 results";
    }

    if (!mysqli_query($conn, $sql))
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

mysqli_close($conn);
?>
