<?php
//server with default setting (user 'root' with no password)
$host = 'localhost'; //server
$username = 'root';
$password = "";
$database = 'myOrders'; //Database Name

//establishing connection
$conn = mysqli_connect($host,$username,$password,$database);

//Create Database
/*
$sql = "CREATE TABLE orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    price FLOAT(6),
    crust FLOAT(10),
    crust_name VARCHAR(30),
    cheeses TEXT,
    toppings TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table orders created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }
*/

//for displaying an error msg in case the connection is not established
if(!$conn){
    die("Connection failed: " .mysqli_connect_error());
}
?>