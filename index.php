<?php
include('header.php');
include('footer.php');
session_start();
if (!isset($_SESSION['usersUid'])){
  header('Location: login.php');
  }
?>
<title>Pay Page</title>
<body class="bg-dark">
  <div class="container">

    <h4 class="text-light mt-4"><span><i class="fa-solid fa-user text-success"></i><?php echo ' '.$_SESSION['usersUid'];?></h4></span> 
    <!-- <h2 class="text-light mt-4 mb-4">Proceed to pay</h2> -->
    <form  class= "bg-light form-group mt-4 index" action="./charge.php" method="post" id="payment-form">

      <h3 class="my-4 text-center">PHP login system Course [$50]</h3>
      <input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name">
      <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Last Name">
      <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address">
        <div id="card-element" class="form-control">
          <!-- a Stripe Element will be inserted here. -->
        </div>
        <!-- Used to display form errors -->
        <div id="card-errors" role="alert"></div>

      <button id="boton">Submit Payment</button>
    </form>
  </div>
  <a class="mt-4 mx-4" href="logout.php"><span><i class="btn btn-danger fa-solid fa-arrow-right-from-bracket"></i></span></a>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="./js/charge.js"></script>
</body>
</html>
