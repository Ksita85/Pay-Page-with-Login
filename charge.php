<?php
include('vendor/autoload.php');
include('config/db.php');
include('lib/pdo_db.php');
include('models/Customer.php');
include('models/Transaction.php');

\Stripe\Stripe::setApiKey('sk_test_51L08EDEYm9YjNCrgagco9OS1cS3xojqTDYLQlDlUjXi0S90rwswVP72EQsEQbaiq6hQg8yHVB1UE8dOxpLXSUTPn00IzxwUYDV');

//Sanitize POST array
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$token = $POST['stripeToken'];
// print_r($POST);

//Create Customer in stripe
$customer = \Stripe\Customer::create(array(
    "email" => $email,
    "source" => $token
));

//Charge customer
$charge = \Stripe\Charge::create(array(
    "amount" =>  5000,
    "currency" => "usd",
    "description" => "Intro to react Course",
    "customer" => $customer->id
));
// print_r($charge);

// //Customer Data
$customerData = [
    'id' => $charge->customer,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email
];
// print_r($customerData);

//instantiate customer
$customer = new Customer();

//Add customer to DB
$customer->addCustomer($customerData);

//Transaction Data
$transactionData = [
    'id' => $charge->id,
    'customer_id' => $charge->customer,
    'product' => $charge->description,
    'amount' => $charge->amount,
    'currency' => $charge->currency,
    'status' => $charge->status
];
// print_r($customerData);

//instantiate customer
$transaction = new Transaction();

//Add transaction to DB
$transaction->addTransaction($transactionData);

//Redirect to success
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);


?>


