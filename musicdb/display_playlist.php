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


$pl_result = $conn->query($pl_query);

if ($pl_result->num_rows > 0)
{
    while($row = $pl_result->fetch_assoc())
    {
        $s_query = "SELECT Add_Song.Song_name, Add_Song.Artist_name, Add_Song.Album_name
        FROM Add_Song
<<<<<<< HEAD
        WHERE Add_Song.Playlist_name = $row["Playlist_name"]";
=======
>>>>>>> 00f04d5c3b4d6ec64b49fe50e679cf25228ea00d
        $s_result = $conn->query($s_query);

        if($s_result->num_rows > 0)
        {
          while($row = $s_result->fetch_assoc())
          {
          }
        }
    }
}
else
{
    echo "0 results";
}

{
}

mysqli_close($conn);
?>
