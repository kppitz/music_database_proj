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
$pl_query = "";
$s_query = "";
$plname = "";

if(!empty($_GET['username']))
{
  $user = $_GET['username'];

  $pl_query = "SELECT Playlist.Playlist_name
              FROM Playlist
              WHERE Playlist.User_name = '$user'";

  $pl_result = $conn->query($pl_query);

  if ($pl_result->num_rows > 0)
  {
    echo "<table class='table table-hover'>
              <thead>
                <tr>
                  <th scope='col'>Playlist</th>
                  <th scope='col'>User</th>
                </tr>
              </thead>";

    while($row = $pl_result->fetch_assoc())
    {
      $plname = $row["Playlist_name"];

        echo "<tr>
              <td><form method='get' action='display_pl_songs.php'>
                <input type='hidden' name='pl_name' value='$plname'>
                <input type='hidden' name='user_name' value='$user'>
                <button type='submit' class='btn btn-outline-primary'>".$plname."
                </button></form></td>
              <td>".$user."</td>";
        if($user == 'BlueMan')
        {
          echo "
                <td><form method='get' action='remove_pl.php'>
                  <input type='hidden' name='plname' value='$plname'>
                  <button type='submit' class='btn-outline-danger btn-sm'>
                  Remove Playlist</button></form></td>";
        }
        echo "</tr>";
    }
  }
  else
  {
    echo "<h5>Username does not exist. Please go back to change your search.</h5>";
  }
  if (!mysqli_query($conn, $pl_query))
  {
    echo "Error: " . $pl_query . "<br>" . mysqli_error($conn);
  }
}
else
{
  echo "<h5>No username entered. Please go back to change your search.</h5>";
}


mysqli_close($conn);
?>
