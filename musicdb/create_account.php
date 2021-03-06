<!DOCTYPE html>
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

$email = $_GET['email'];
$fname = $_GET['f_name'];
$lname = $_GET['l_name'];

$check = "SELECT User_Account.User_name FROM User_Account WHERE User_Account.User_name = 'BlueMan'";
$check_res = $conn->query($check);

if(!empty($email) && !empty($fname) && !empty($lname))
{
  $sql = "UPDATE User_Account
  SET Email = '$email', Last_name = '$lname', First_name = '$fname'
  WHERE User_name = 'BlueMan'";

  if (!mysqli_query($conn, $sql))
  {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
else
{
  echo"<h4>Please fill in all fields!</h4>";
}

mysqli_close($conn);
?>

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

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="../musicdb.php">Home<span class="sr-only">
          </span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Account<span class="sr-only">(current)
          </span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="search.php">Search Music</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="playlists.php">Playlists</a>
        </li>
     </ul>
    </div>
  </nav>

  <div class="Jumbotron">
    <div class="col-lg-6">
    <h1 class="display-4">Account</h1>
    </div>
    <hr class="my-3">
  </div>

  <h5 class="col-lg-6 display-5">Change Account Settings</h5>
  <h6 class="col-lg-6 display-5">Account updated!</h6>
  <hr class="my-3">
  <form class="col-md-4" action="create_account.php" method="get">
    <div class="form-group">
      <label for="input_email">Email Address</label>
      <input type="email" class="form-control" id="input_email" placeholder=<?php echo $email; ?> name = "email">
    </div>
    <div class="form-group">
      <label for="f_name">First Name</label>
      <input type="text" class="form-control" id="f_name" placeholder=<?php echo $fname; ?> name = "f_name">
    </div>
    <div class="form-group">
      <label for="l_name">Last Name</label>
      <input type="text" class="form-control" id="l_name" placeholder=<?php echo $lname; ?> name = "l_name">
    </div>
  <button type="submit" class="btn btn-primary">Save Changes</button>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
    integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
    crossorigin="anonymous"></script>
  </body>

  </html>
