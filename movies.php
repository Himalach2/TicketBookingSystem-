<?php
include 'connection.php';
$sql = "SELECT * FROM `movies`";
$res = mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html>
<head>
  <title>Movie Listing</title>
  <link rel="stylesheet" href="movielisting.css">
</head>
<body>
  <h1>Movie Listing</h1>
  <?php
  while($row = mysqli_fetch_assoc($res)){
    echo "
  <div class='movie'>
    <img src='upload_img/".$row['image']."'width='300px'>
    <h2>".$row['movie_name']."</h2>
    <p>Release Date:".$row['release_date']."</p>
    <p>Genre: ".$row['genre']."</p>
    <p>Description:".$row['description']."</p>
    <p>Showtimes: 12:00 PM, 3:00 PM, 6:00 PM</p>
    <button type='button'>Buy Tickets</button>
  </div>
  ";
  }
  ?>
</body>
</html>
