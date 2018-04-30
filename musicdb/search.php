<? include 'search_music.php' ?>
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
        <li class="nav-item active">
          <a class="nav-link" href="#">Search Music<span class="sr-only">(current)
          </span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="playlists.php">Playlists</a>
        </li>
     </ul>
    </div>
  </nav>

  <div class="Jumbotron">
    <h1 class="col-lg-6 display-4">Search for Music</h1>
    <hr class="my-3">
    <h5 class="col-lg-6">Search for songs by name, artist, album, or genre </h5>
    <hr class="my-3">
  </div>

  <form class="col-lg-6" action="search_music.php" method="get">
      <div class="form-group">
        <label for="search_song">Song Name</label>
        <div class="form-inline">
        <input type="text" class="form-control" id="song_name" placeholder="Search"
              name = "song_name">
        <button type="submit" class="btn btn-primary">Search Song</button>
        </div>
      </div>

      <div class="form-group">
        <label for="search_song">Artist Name</label>
        <div class="form-inline">
        <input type="text" class="form-control" id="artist_name" placeholder="Search"
              name = "artist_name">
        <button type="submit" class="btn btn-primary">Search Artist</button>
        </div>
      </div>

      <div class="form-group">
        <label for="search_album">Album Title</label>
        <div class="form-inline">
        <input type="text" class="form-control" id="album_name" placeholder="Search"
        name = "album_name">
        <button type="submit" class="btn btn-primary">Search Album</button>
        </div>
      </div>

      <div class="form-group">
        <label for="search_genre">Music Genre</label>
        <div class="form-inline">
        <input type="text" class="form-control" id="genre" placeholder="Search" name = "genre">
        <button type="submit" class="btn btn-primary">Search Genre</button>
      </div>
    </div>
  </form>

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
