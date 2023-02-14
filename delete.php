<?php
$host = 'localhost'; //server
$username = 'root';
$password = "";
$database = 'myorders'; //Database Name

// Create connection
$conn = new mysqli($host, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$id = $_GET['delete'];
$sql = "DELETE FROM orders WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
header("Location: cart.php");
$conn->close();
?>