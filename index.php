<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Movie Ticketing Site</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
  <script src="script.js"></script>
  <style>
    .boxes{
      display:grid;
      grid-template-columns:1fr 1fr 1fr;
      grid-template-rows:1fr 1fr 1fr;
      position:absolute;
      top:100%;
      left:50%;
      transform:translate(-50%,-50%);
      width:600px;
    }

    .cinema-boxx{
margin-right:10px
}
  </style>
</head>
<body style="background:url(images/main.jpg);background-size:cover">
  <header>
    <div class="container">
      <h1>Movie Ticketing Site</h1>
      <nav>
        <ul>
          <li><a href="./home.php">Home</a></li>
          <li><a href="./movies.php">Movie Listings</a></li>
          <li><a href="./add_movie.php">Add Movie</a></li>
          <button class="btnadd"><li><a href="./login.php">Login</a></li></button>
        </ul>
      </nav>
    </div>
  </header>
<div class="main-body">
  <div class="cinema-box">
    <img src="images/ramkahani.jpeg" width="100%" height="99.8%">
  </div>
  <div class="boxes">
     <?php
  $sql = "SELECT * FROM movies";
  $res = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_assoc($res)){
    echo"<div class='cinema-boxx'>
    <img src='images/".$row['image']."' width='100%' height='99.8%'>
  </div>";
  }
  ?>
  </div>

</div>
  <footer>
    <div class="Footer"> 
      <p>&copy; 2023 Movie Ticketing Site. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
