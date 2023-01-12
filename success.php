<?php
include('header.php');

 if(!empty($_GET['tid'] && !empty($_GET['product']))) {
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

    $tid = $GET['tid'];
    $product = $GET['product'];
  } else {
    header('Location: index.php');
  }
?>
<title>Success</title>
<body class="bg-dark">
    <div class="container mt-4">
        <h2 class="mt-4 text-light">Thank You for purchasing <?php echo $product; ?></h2>
        <hr>
      <div style="padding:40px; border-radius: 7px;" class= "bg-light">
        <p>Your transaction ID is: <?php echo $tid; ?></p>
        <p>Check your email for more info</p>
        <p><a id="boton" href="index.php" class="btn btn-primary mt-2">Index</a></p>
      </div>
    </div>
</body>
</html>