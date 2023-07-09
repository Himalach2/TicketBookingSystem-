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
      <form action="save_movie.php" method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title">
        <span class="error"><?php echo isset($errors['title']) ? $errors['title'] : ''; ?></span><br>
        
        <label for="showtimes">Showtimes:</label>
        <input type="text" id="showtimes" name="showtimes">
        <span class="error"><?php echo isset($errors['showtimes']) ? $errors['showtimes'] : ''; ?></span><br>

        <input type="submit" value="Add Movie">
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
