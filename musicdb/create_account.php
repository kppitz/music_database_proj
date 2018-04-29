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

$sql = "INSERT INTO User_Account (User_name, Join_date, Email, Last_name, First_name)
VALUES ('".$_GET['username']."','GETDATE()', '".$_GET['email']."', '".$_GET['f_name']."', '".$_GET['l_name']."')";

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
