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
      <h1 class="display-4">Removed from Playlist Successfully!</h1>
      <hr class="my-3">
        <h6 class="col-sm-4"><a class="link" href="search.php"> Return to Search</a></h6>
  </div>
  <hr class="my-3">

  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "musicdbproject";

  $song_name  = $_GET['song_name'];
  $plname = $_GET['plname'];

  $conn = new mysqli($servername, $username, $password, $dbname);
  if (!$conn)
  {
      die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "DELETE FROM Add_Song
          WHERE Add_Song.song_name = '$song_name' AND Add_Song.Playlist_name = '$plname'
          AND Add_Song.User_name = 'BlueMan'";


  if (!mysqli_query($conn, $sql))
  {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
   ?>
