<?php
include('header.php');
include('lib/pdo_db.php');
include('config/db.php');
include('models/Transaction.php');
include 'footer.php';
session_start();
if (!isset($_SESSION['usersUid'])){
    header('Location: login.php');
}

//Instantiate Transaction
$transaction = new Transaction();

//Get Transaction
$transaction = $transaction->getTransaction();
// print_r($transaction);
?>
<title>Transactions View</title>
<body class="bg-dark">
    <div class="container mt-4 mb-2">
        <div class="btn-group" role="group">
                <a href="customers.php" class="btn btn-sm btn-light"> Customers</a>
                <a href="transactions.php" class="btn btn-sm btn-secondary"> Transactions</a>
        </div>
        <hr>
        <div style="border-radius: 7px;" class="bg-light p-4">
            <h2>Transactions</h2>
            <br>
            <table id="dataTable" class= "table table-sm table-striped table-hover">
                <thead>
                    <tr class="bg-dark text-light">
                        <th>Transaction ID</th>
                        <th>Customer ID</th>
                        <th>Product</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($transaction as $t): ?>
                        <tr>
                            <td><?php echo $t->id; ?> </td>
                            <td><?php echo $t->customer_id; ?> </td>
                            <td><?php echo $t->product;?> </td>
                            <td><?php echo sprintf('%.2f', $t->amount / 100); ?><?php echo ' '.strtoupper($t->currency); ?></td>
                            <td><?php echo $t->created_at; ?> </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br>
            <p><a class="text-dark" href="index.php"><strong>Go to Pay Page</strong></a></p>
        </div>   
    </div>
    <a class="mt-4 mx-4" href="logout.php"><span><i class="btn btn-danger fa-solid fa-arrow-right-from-bracket"></i></span></a>
</body>
</html>
