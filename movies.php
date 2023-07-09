<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_ticketing";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: ");
}

// Fetch movies from the database
$sql = "SELECT * FROM movies";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>id</th>";
    echo "<th>name</th>";
    echo "<th>author</th>";
    echo "<th>price</th>";
    echo "</tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["author"]."</td>";
        echo "<td>".$row["price"]."</td>";
        echo "<td><a href='buy_ticket.php?id=".$row["id"]."'>Buy Ticket</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No movies found.</p>";
}

$conn->close();
?>
