<?php include "header.php" ?>
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
$id = $_GET['view'];
$info = "SELECT * FROM orders WHERE id='$id'";
$infoquery = $conn->query($info);

if ($infoquery->num_rows > 0) {
    // output data of each row
    while ($row = $infoquery->fetch_assoc()) {
        $cheeses = unserialize($row['cheeses']);
        $toppings = unserialize($row['toppings']);
        echo "
          <div class='text-center'>
            <h1>View ID:$id</h1>
            <label for='firstname'><h3>First Name:</h3></label>
            <p id='firstname'>$row[firstname]</p>
            <label for='lastname'><h3>Last Name:</h3></label>
            <p id='lastname'>$row[lastname]</p>
            <label for='email'><h3>Email:</h3></label>
            <p id='email'>$row[email]</p>
            <label for='crust'><h3>Crust:</h3></label>
            <p id='crust'>$$row[crust]</p>
            <label for='cheeses'><h3>Cheeses:</h3></label>";
        foreach ($cheeses as $label => $value) {
            echo "<p>$label: $$value</p>";
        }
        echo "</p>
            <label for='toppings'><h3>Toppings:</h3></label>";
        foreach ($toppings as $label => $value) {
            echo "<p>$label: $$value</p>";
        }
        echo "
        <label for='price'><h3>Price:</h3></label>
            <p id='price'>Total: $$row[price]</p>
            <div class='container text-center mt-5'>
              <a href='cart.php' class='btn btn-secondary mt-2'>Back</a>
            </div>
          </div>";
    }
}
?>
<?php include "footer.php" ?>