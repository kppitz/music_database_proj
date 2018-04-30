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
    <h6 class="col-sm-4"><a class="link" href="playlists.php"> Return to Search</a></h6>
    <hr class="my-3">
  </div>
  </body>
  </html>

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

$user = "";

if(!empty($_GET['username']))
{
  $user = $_GET['username'];

  $pl_query = "SELECT Playlist.Playlist_name FROM Playlist WHERE Playlist.User_name = '$user'";

  $pl_result = $conn->query($pl_query);

  if ($pl_result->num_rows > 0)
  {
    while($row = $pl_result->fetch_assoc())
    {
        $plname = $row["Playlist_name"];
        echo "<div class='col-lg-6'>
          <h5>" .$plname. "</h5>
          <br>
          </div>";
        $s_query = "SELECT Add_Song.Song_name, Add_Song.Artist_name, Add_Song.Album_name
        FROM Add_Song
        WHERE Add_Song.Playlist_name = '$plname'";

        $s_result = $conn->query($s_query);

        if($s_result->num_rows > 0)
        {
          while($row = $s_result->fetch_assoc())
          {
            echo "<div class='col-lg-6'>
              Song: " . $row["Song_name"]. " | Artist: " . $row["Artist_name"]. " | Album: " . $row["Album_name"].
              "<br> </div>";
          }
          echo "<br>";
        }
    }
  }
  else
  {
    echo "<h5>0 results</h5>";
  }
  if (!mysqli_query($conn, $pl_query))
  {
    echo "Error: " . $pl_query . "<br>" . mysqli_error($conn);
  }
}


mysqli_close($conn);
?>
