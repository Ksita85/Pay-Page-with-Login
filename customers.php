<?php
include('header.php');
include('lib/pdo_db.php');
include('config/db.php');
include('models/Customer.php');
include 'footer.php';
session_start();
if (!isset($_SESSION['usersUid'])){
    header('Location: login.php');
    }

//Instantiate Customer
$customer = new Customer();

//Get Customer
$customers = $customer->getCustomers();
// print_r($customers);
?>
<title>Customers View</title>
<body class="bg-dark">
    <div class="container mt-4 mb-2">
        <div class="btn-group" role="group">
            <a href="customers.php" class="btn btn-sm btn-secondary"> Customers</a>
            <a href="transactions.php" class="btn btn-sm btn-light"> Transactions</a>
        </div>
        <hr>
        <div style="border-radius: 7px;" class="bg-light p-4">
                <h2 class="">Customers</h2>
                <br>
                <table id="dataTable" class= "table table-sm table-striped table-hover">
                    <thead>
                        <tr class="bg-dark text-light">
                            <th>Customer ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($customers as $c): ?>
                            <tr>
                                <td><?php echo $c->id; ?> </td>
                                <td><?php echo $c->first_name; ?> <?php echo $c->last_name; ?> </td>
                                <td><?php echo $c->email; ?> </td>
                                <td><?php echo $c->created_at; ?> </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <br>
                <p><a class="text-dark" href="index.php"><strong>Go to Pay Page </strong></a></p>   
            </div>
    </div>
    <a class="mt-4 mx-4" href="logout.php"><span><i class="btn btn-danger fa-solid fa-arrow-right-from-bracket"></i></span></a>
</body>
</html>
