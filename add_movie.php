<?php
include 'connection.php';
if(isset($_POST['submit'])){
  $title = $_POST['title'];
  $name = $_POST['showtime'];
  $date = $_POST['date'];
  $desc = $_POST['desc'];
  $sql = "INSERT INTO `movies` (`movie_name`,`showtime`,`status`,`description`,`release_date`) VALUES ('$title','$name','vacant','$desc','$date')";
  $res = mysqli_query($conn,$sql);
  if($res){
    echo "Insertion Successful";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Movie</title>
  <link rel="stylesheet" type="text/css" href="movie.css">
  <script src="script.js"></script>
  <style>
    .error {
      color: red;
      font-size: 0.9em;
    }
  </style>
</head>
<body>
  <header>
    <div class="container">
      <h1>Movie Ticketing Site</h1>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="movies.php">Movie Listings</a></li>
          <li><a href="add_movie.php">Add Movie</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="container">
    <main>
      <h2>Add Movie</h2>
      <form action="" method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title">
        <span class="error"><?php echo isset($errors['title']) ? $errors['title'] : ''; ?></span><br>
        <label for="showtimes">Showtimes:</label>
        <select name="showtime" id="time">
        <option name="time" for="time" value="7:00 Am">7:00 Am</option>
        <option name="time" for="time" value="10:00 Am">10:00 Am</option>
        <option name="time" for="time" value="1:00 Pm">1:00 Pm</option>
        <option name="time" for="time" value="4:00 Pm">4:00 Pm</option>
        <option name="time" for="time" value="7:00 Pm">7:00 Pm</option>
        </select>
        <textarea name="desc" id="desc" cols="60" rows="5">Type Description</textarea>
        <input id="date" type="date" name="date">
        <input name="submit" type="submit" value="Add Movie">
      </form>
    </main>
  </div>

  <footer>
    <div class="container">
      <p>&copy; 2023 Movie Ticketing Site. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
