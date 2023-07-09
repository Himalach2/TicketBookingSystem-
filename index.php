<!DOCTYPE html>
<html>
<head>
  <title>Movie Ticketing Site</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <script src="script.js"></script>
</head>
<body>
  <header>
    <div class="container">
      <h1>Movie Ticketing Site</h1>
      <nav>
        <ul>
          <li><a href="./index.php">Home</a></li>
          <li><a href="./movies.php">Movie Listings</a></li>
          <li><a href="./add_movie.php">Add Movie</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="container">
    <main>
      <?php include 'content.php'; ?>
    </main>
  </div>

  <footer>
    <div class="container">
      <p>&copy; 2023 Movie Ticketing Site. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
