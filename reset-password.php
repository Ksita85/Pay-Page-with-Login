<?php
include_once 'header.php';
include_once 'session_helper.php';
include_once 'footer.php';
?>
<body  class="bg-dark">
<div class="mt-3 container">
    <h2 class="mt-4 text-light">Reset Password</h2>
    <div>
    
        <form class= "bg-light form-group mb-4 signup" method="post" action="/controllers/ResetPasswords.php">
        <?php flash('reset'); ?>
        <input class="form-control" type="hidden" name="type" value="send">
            <input class="form-control" type="text" name="usersEmail"  
            placeholder="Email...">
            <button id= "boton" class="mt-3" type="submit" name="submit">Send Email</button>
        </form>
        <div >
            <a class="text-light" href="login.php">Login</a><br>
            <a class="text-light" href="signup.php">Signup</a>
        </div>
        </div>
    </div>
    </div>