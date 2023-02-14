<?php include "header.php" ?>
<div class="container">
    <h1 class="text-center">Cart</h1>
    <a href="create.php" class='btn btn-outline-dark mb-2'>
        <i class="bi bi-person-plus"></i>New Order
    </a>
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $query = "SELECT * FROM orders";
                $view_students = mysqli_query($conn, $query);
                $count = mysqli_query($conn, "SELECT price FROM orders");
                $total = 0;

                while ($row = mysqli_fetch_assoc($count)) {
                    $total += floatval($row['price']);
                }

                while ($row = mysqli_fetch_assoc($view_students)) {
                    $id = $row['id'];
                    $fname = $row['firstname'];
                    $lname = $row['lastname'];
                    $email = $row['email'];
                    $price = $row['price'];
                    echo "<tr>";
                    echo "<th scope = 'row'> {$id}</th>";
                    echo "<td> {$fname}</td>";
                    echo "<td> {$lname}</td>";
                    echo "<td> {$email}</td>";
                    echo "<td> \${$price}</td>";
                    echo "<td class = 'text-center'> <a href = 'view.php?view={$id}' class = 'btn btn-secondary'> <i class = 'bi bi-eye'></i> View</a> </td>";
                    echo "<td class = 'text-center'> <a href = 'update.php?update={$id}' class = 'btn btn-secondary'> <i class = 'bi bi-eye'></i>Update</a> </td>";
                    echo "<td class = 'text-center'> <a href = 'delete.php?delete={$id}' class = 'btn btn-secondary'> <i class = 'bi bi-eye'></i> Delete</a> </td>";
                    echo "</tr>";
                }
                ?>
            </tr>
        </tbody>
    </table>
    <p>Total: $
        <?php echo $total ?>
    </p>
    <a href="index.php" class="btn btn-outline-dark mb-2">Check Out</a>
</div>
<?php include "footer.php" ?>