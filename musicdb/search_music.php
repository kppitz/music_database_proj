<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "musicdbproject";

if (!isset($_GET['song_name'])
{
  $song = mysql_query("SELECT Song_name FROM Song");
}
else
{
  $song = $_GET['song_name'];
}

if (!isset($_GET['artist_name'])
{
  $artist = mysql_query("SELECT Artist_name FROM Song");
}
else
{
  $artist = $_GET['artist_name'];
}

if (!isset($_GET['album_name'])
{
  $album = mysql_query("SELECT Album_name FROM Album");
}
else
{
  $album = $_GET['album_name'];
}

if (!isset($_GET['genre'])
{
  $genre = mysql_query("SELECT Genre FROM Album");
}
else
{
  $genre = $_GET['genre'];
}

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT Song_name, Artist_name, Album_name
        FROM Song, Album
        WHERE Song.Song_name = '$song' AND Song.Artist_name = '$artist' AND
        Song.Album_name = '$album' AND Album.genre = '$genre' AND
        Song.Album_name = Album.Album_name AND Song.Artist_name = Album.Artist_name";

$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
}
else
{
    echo "0 results";
}

if (mysqli_query($conn, $sql))
{
    echo "New record created successfully";
}
else
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
