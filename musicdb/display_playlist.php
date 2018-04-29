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

$user = $_GET['username'];

$pl_query = "SELECT Playlist.Playlist_name FROM Playlist WHERE Playlist.Username = $user";

$pl_result = $conn->query($pl_query);

if ($pl_result->num_rows > 0)
{
    while($row = $pl_result->fetch_assoc())
    {
        echo $row["Playlist_name"]. "<br>";
        $s_query = "SELECT Add_Song.Song_name, Add_Song.Artist_name, Add_Song.Album_name
                    FROM Add_Song
                    WHERE Add_Song.Playlist_name = $row["Playlist_name"]";
        $s_result = $conn->query($s_query);

        if($s_result->num_rows > 0)
        {
          while($row = $s_result->fetch_assoc())
          {
            echo "Song: " . $row["Song_name"]. " | Artist: " . $row["Artist_name"]. " | Album: " . $row["Album_name"]. "<br>";
          }
        }
    }
}
else
{
    echo "0 results";
}


if (mysqli_query($conn, $sql))
{
    echo "Successful";
}
else
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
