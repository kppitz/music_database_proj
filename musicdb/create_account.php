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
$email = $_GET['email'];
$fname = $_GET['f_name'];
$lname = $_GET['l_name'];

$check = "SELECT User_Account.User_name FROM User_Account WHERE User_Account.User_name = '$user' OR User_Account.Email = '$email'";
$check_res = $conn->query($check);

if($check_res->num_rows == 0)
{
  echo "Account doesn't exist!";
}
else
{
  $sql = "UPDATE User_Account
  SET User_name = '$user', Email = '$email', Last_name = '$lname', First_name = '$fname'
  WHERE User_name = '$user' OR Email = '$email'";
  echo "Account updated successfully!";
}

mysqli_close($conn);
?>
