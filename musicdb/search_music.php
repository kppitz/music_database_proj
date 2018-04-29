<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "musicdbproject";

if (!empty($_GET['song_name']))
{
  $song = $_GET['song_name'];
}
else
{
  $song = 'SELECT Song_name FROM Song';
}

if (!empty($_GET['artist_name']))
{
  $artist = $_GET['artist_name'];
}
else
{
  $artist = 'SELECT DISTINCT Artist_name FROM SONG';
}

if (!empty($_GET['album_name']))
{
  $album = $_GET['album_name'];
}
else
{
  $album = 'SELECT Album_name FROM Album';
}

if (!empty($_GET['genre']))
{
  $genre = $_GET['genre'];
}
else
{
  $genre = 'SELECT Genre FROM Album';
}

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT Song.Song_name, Song.Artist_name, Song.Album_name
        FROM Song, Album
        WHERE Song.Song_name = '$song' AND Song.Artist_name = '$artist' AND
        Song.Album_name = '$album' AND Album.Genre = '$genre' AND
        Song.Album_name = Album.Album_name AND Song.Artist_name = Album.Artist_name";

$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        echo "Song: " . $row["Song_name"]. " | Artist: " . $row["Artist_name"]. " | Album: " . $row["Album_name"]. "<br>";
    }
}
else
{
    echo "0 results";
}

if (mysqli_query($conn, $sql))
{
    echo "Query successful";
}
else
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
