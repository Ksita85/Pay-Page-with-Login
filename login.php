<?php 
    include_once 'header.php';
    include_once 'footer.php';
    include_once './session_helper.php';
?>
<body class="bg-dark">

<div class="container">
    <br>
    <h2 class="mt-4 text-light">Please Login</h2>
    <div class="">
        

        <form id='form-login' class= "bg-light form-group mb-4" method="post" action="/controllers/Users.php">
        <?php flash('login') ?>
        <input type="hidden" name="type" value="login">
            <input class="mt-1" type="text" name="name/email"  
            placeholder="Username/Email..."><br>
            <input class="mt-3 mb-3" type="password" name="usersPwd" 
            placeholder="Password..."> <br>
            <button id="boton"class="mt-3" type="submit" name="submit">Log In</button>
        </form>
        <div >
            <a class="text-light" href="./reset-password.php">Forgotten Password?</a><br>
            <a class="text-light" href="./signup.php">Sign up</a></div>
        </div>
    </div>
</div>