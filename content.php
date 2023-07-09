<?php
$siteName = "Movie Ticketing Site";
?>

<?php if ($_SERVER['REQUEST_URI'] == '/index.php') : ?>
  <h2>Welcome to <?php echo $siteName; ?>!</h2>
  <p>Experience the latest movies and book your tickets online.</p>
  <p>Don't miss out on the excitement. Browse our movie listings and secure your tickets now!</p>
<?php elseif ($_SERVER['REQUEST_URI'] == '/movies.php') : ?>
  <h2>Movie Listings</h2>
  <?php
  // Database connection
  $servername = "localhost";
  $username = "your_username";
  $password = "your_password";
  $dbname = "your_database_name";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // Fetch movies from the database
  $sql = "SELECT * FROM movies";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      echo "<table>";
      echo "<tr>";
      echo "<th>Title</th>";
      echo "<th>Showtimes</th>";
      echo "<th>Action</th>";
      echo "</tr>";
      while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>".$row["title"]."</td>";
          echo "<td>".$row["showtimes"]."</td>";
          echo "<td><a href='buy_ticket.php?id=".$row["id"]."'>Buy Ticket</a></td>";
          echo "</tr>";
      }
      echo "</table>";
  } else {
      echo "<p>No movies found.</p>";
  }

  $conn->close();
  ?>
<?php elseif ($_SERVER['REQUEST_URI'] == '/add_movie.php') : ?>
  <h2>Add Movie</h2>
  <form action="save_movie.php" method="post" onsubmit="return validateForm()">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required><br>

    <label for="showtimes">Showtimes:</label>
    <input type="text" id="showtimes" name="showtimes" required><br>

    <input type="submit" value="Add Movie">
  </form>
<?php endif; ?>
