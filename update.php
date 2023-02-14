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
$id = $_GET['update'];
$info = "SELECT firstname, lastname, email, price FROM orders WHERE id='$id'";
$infoquery = $conn->query($info);



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $firstname = $_REQUEST['firstname'];
  $lastname = $_REQUEST['lastname'];
  $email = $_REQUEST['email'];
  $cheeses = $_POST['cheeses'];
  $toppings = $_POST['toppings'];
  $crust = $_POST['crust'];

  $cheeses1 = 0;
  if (!empty($cheeses)) {
    foreach ($cheeses as $cheese) {
      $cheeses1 += floatval($cheese);
    }
  }

  $toppings1 = 0;
  if (!empty($toppings)) {
    foreach ($toppings as $topping) {
      $toppings1 += floatval($topping);
    }
  }

  $crust1 = floatval($_POST['crust']);

  $price = $_POST['price'] = $crust1 + $cheeses1 + $toppings1;
  $cheeses = serialize($cheeses);
  $toppings = serialize($toppings);
  $update = "UPDATE orders SET firstname='$firstname', lastname='$lastname', email='$email', crust='$crust', cheeses='$cheeses', toppings='$toppings', price='$price' WHERE id=$id";

  if ($conn->query($update) === TRUE) {
  } else {
    echo "Error updating record: " . $conn->error;
  }
  header("Location: index.php");
}

if ($infoquery->num_rows > 0) {
  // output data of each row

  while ($row = $infoquery->fetch_assoc()) {
    echo "
    <div class='text-center'>
      <h1>Update for ID:$id</h1>
      <form method='post'>
        <label for='firstname'>First Name:</label><br>
        <input type='text' name='firstname' id='firstname' value='$row[firstname]' required><br>
        <label for='lastname'>Last Name:</label><br>
        <input type='text' name='lastname' id='lastname' value='$row[lastname]' required><br>
        <label for='email'>Email:</label><br>
        <input type='text' name='email' id='email' value='$row[email]' required><br>
        <div class='form-group'>
            <h3>Crust</h3>
            <input type='radio' name='crust' value='6.99' required>Thin Crust<br>
            <input type='radio' name='crust' value='7.99' required>Thick Crust<br>
            <input type='radio' name='crust' value='4.99' required>Cauliflower Crust<br>
            <input type='radio' name='crust' value='5.99' required>Gluten-Free Crust<br>
            <input type='radio' name='crust' value='9.99' required>Deep Dish Crust<br>
        </div>
        <div class='form-group'>
            <h3>Cheese</h3>
            <input type='checkbox' name='cheeses[Mozarella]' value='0.99'>Mozarella<br>
            <input type='checkbox' name='cheeses[Parmesan]' value='0.99'>Parmesan<br>
            <input type='checkbox' name='cheeses[Cheddar]' value='0.99'>Cheddar<br>
            <input type='checkbox' name='cheeses[Provolone]' value='0.99'>Provolone<br>
            <input type='checkbox' name='cheeses[Goat]' value='0.99'>Goat<br>
            <input type='checkbox' name='cheeses[Gouda]' value='0.99'>Gouda<br>
            <input type='checkbox' name='cheeses[Ricotta]' value='0.99'>Ricotta<br>
            <input type='checkbox' name='cheeses[Gruyere]' value='0.99'>Gruyere<br>
        </div>
        <div class='form-group'>
            <h3>Toppings</h3>
            <input type='checkbox' name='toppings[Pepperoni]' value='0.99'>Pepperoni<br>
            <input type='checkbox' name='toppings[Sausage]' value='0.99'>Sausage<br>
            <input type='checkbox' name='toppings[Bacon]' value='0.99'>Bacon<br>
            <input type='checkbox' name='toppings[Ham]' value='0.99'>Ham<br>
            <input type='checkbox' name='toppings[Bell Peppers]' value='0.99'>Bell Peppers<br>
            <input type='checkbox' name='toppings[Mushrooms]' value='0.99'>Mushrooms<br>
            <input type='checkbox' name='toppings[Jalepenos]' value='0.99'>Jalepenos<br>
            <input type='checkbox' name='toppings[Pineapple]' value='0.99'>Pineapple<br>
        </div>
        <button type='submit' name='update'>Submit</button>
      </form>
      <div class = 'container text-center mt-5'>
        <a href = 'index.php' class='btn btn-secondary mt-2'>Back</a>
      </div>
    </div>";
  }
}
?>
<?php include "footer.php" ?>