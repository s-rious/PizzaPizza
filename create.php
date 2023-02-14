<!-- Header -->
<?php include "header.php" ?>

<?php
if (isset($_POST['create'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
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
    $cheeses = serialize($cheeses);
    $toppings = serialize($toppings);

    $crust1 = floatval($_POST['crust']);
    $price = $_POST['price'] = $crust1 + $cheeses1 + $toppings1;

    $query = "INSERT INTO orders(firstname,lastname,email,crust,cheeses,toppings,price) VALUES('{$fname}','{$lname}','{$email}','{$crust}','{$cheeses}','{$toppings}','{$price}')";
    $add_student = mysqli_query($conn, $query);

    header("Location: cart.php");
}
?>

<h1 class="text-center">New Order</h1>
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" name="firstname" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" name="lastname" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <h3>Crust</h3>
            <input type="radio" name="crust" value="6.99" required>Thin Crust<br>
            <input type="radio" name="crust" value="7.99" required>Thick Crust<br>
            <input type="radio" name="crust" value="4.99" required>Cauliflower Crust<br>
            <input type="radio" name="crust" value="5.99" required>Gluten-Free Crust<br>
            <input type="radio" name="crust" value="9.99" required>Deep Dish Crust<br>
        </div>
        <br>
        <div class="form-group">
            <h3>Cheese</h3>
            <input type="checkbox" name="cheeses[Mozarella]" value="0.99">Mozarella<br>
            <input type="checkbox" name="cheeses[Parmesan]" value="0.99">Parmesan<br>
            <input type="checkbox" name="cheeses[Cheddar]" value="0.99">Cheddar<br>
            <input type="checkbox" name="cheeses[Provolone]" value="0.99">Provolone<br>
            <input type="checkbox" name="cheeses[Goat]" value="0.99">Goat<br>
            <input type="checkbox" name="cheeses[Gouda]" value="0.99">Gouda<br>
            <input type="checkbox" name="cheeses[Ricotta]" value="0.99">Ricotta<br>
            <input type="checkbox" name="cheeses[Gruyere]" value="0.99">Gruyere<br>
        </div>
        <div class="form-group">
            <h3>Toppings</h3>
            <input type="checkbox" name="toppings[Pepperoni]" value="0.99">Pepperoni<br>
            <input type="checkbox" name="toppings[Sausage]" value="0.99">Sausage<br>
            <input type="checkbox" name="toppings[Bacon]" value="0.99">Bacon<br>
            <input type="checkbox" name="toppings[Ham]" value="0.99">Ham<br>
            <input type="checkbox" name="toppings[Bell Peppers]" value="0.99">Bell Peppers<br>
            <input type="checkbox" name="toppings[Mushrooms]" value="0.99">Mushrooms<br>
            <input type="checkbox" name="toppings[Jalepenos]" value="0.99">Jalepenos<br>
            <input type="checkbox" name="toppings[Pineapple]" value="0.99">Pineapple<br>
        </div>
        <div class="form-group">
            <input type="submit" name="create" class="btn btn-secondary mt-2" value="Submit">
        </div>
    </form>
</div>

<div class="container text-center mt-5">
    <a href="/" class="btn btn-secondary mt-2"> Back </a>
</div>
<?php include "footer.php" ?>
