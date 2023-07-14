<?php
include 'connection.php';

// Define an array to store validation errors
$errors = array();

if(isset($_POST['submit'])){
  // Retrieve form data
  $title = $_POST['title'];
  $name = $_POST['showtime'];
  $genre = $_POST['genre'];
  $date = $_POST['date'];
  $desc = $_POST['desc'];
  $image = $_FILES['image']['name'];
  $image_tmp_name = $_FILES['image']['tmp_name'];
  $image_folder = 'upload_img/'.$image;
  // Perform validation
  if(empty($title)){
    $errors['title'] = "Title is required";
  }
  if(empty($name)){
    $errors['showtime'] = "Showtime is required";
  }
  if(empty($genre)){
    $errors['genre'] = "Genre is required";
  }
  if(empty($date)){
    $errors['date'] = "Release date is required";
  }
  if(empty($desc)){
    $errors['desc'] = "Description is required";
  }
  
  // If there are no validation errors, proceed with inserting data
  if(empty($errors)){
    $sql = "INSERT INTO `movies` (`movie_name`,`genre`,`showtime`,`status`,`description`,`release_date`,`image`) VALUES ('$title','$genre','$name','vacant','$desc','$date','$image')";
    $res = mysqli_query($conn,$sql);
    
    if($res){
      move_uploaded_file($image_tmp_name,$image_folder);
      echo "Insertion Successful";
      header('location:movies.php');
    }
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
      <form action="" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title">
        <span class="error"><?php echo isset($errors['title']) ? $errors['title'] : ''; ?></span><br>
        <label for="genre">Genre:</label>
        <input type="text" name="genre" id="genre">
        <span class="error"><?php echo isset($errors['genre']) ? $errors['genre'] : ''; ?></span><br>
        <label for="showtimes">Showtimes:</label>
        <select name="showtime" id="time">
          <option value="">Select a showtime</option>
          <option name="time" for="time" value="7:00 Am">7:00 Am</option>
          <option name="time" for="time" value="10:00 Am">10:00 Am</option>
          <option name="time" for="time" value="1:00 Pm">1:00 Pm</option>
          <option name="time" for="time" value="4:00 Pm">4:00 Pm</option>
          <option name="time" for="time" value="7:00 Pm">7:00 Pm</option>
        </select>
        <span class="error"><?php echo isset($errors['showtime']) ? $errors['showtime'] : ''; ?></span><br>
        <textarea name="desc" id="desc" cols="60" rows="5">Type Description</textarea>
        <span class="error"><?php echo isset($errors['desc']) ? $errors['desc'] : ''; ?></span><br>
        <label for="poster">Add Poster</label>
        <input type="file" name="image"><br><br>
        <input id="date" type="date" name="date">
        <span class="error"><?php echo isset($errors['date']) ? $errors['date'] : ''; ?></span><br>
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
