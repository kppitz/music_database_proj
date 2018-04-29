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

$condition1="";
$condition2="";
$condition3="";
$condition4="";
$song=trim($_GET['song_name']);
$artist=trim($_GET['artist_name']);
$album=trim($_GET['album_name']);
$genre=trim($_GET['genre']);

if(isset($_GET['song_name']))
   $condition1=" AND Song.Song_name=$song";
if(isset($_GET['artist_name']))
   $condition2=" AND Song.Artist_name=$artist";
if(isset($_GET['album_name']))
   $condition3=" AND Song.Album_name=$album";
if(isset($_GET['genre']))
  $condition4=" AND Album.Genre=$genre";

$sql = "SELECT Song.Song_name, Song.Artist_name, Song.Album_name
        FROM Song, Album
        WHERE Song.Album_name = Album.Album_name AND Song.Artist_name = Album.Artist_name $condition1 $condition2 $condition3 $condition4";

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
