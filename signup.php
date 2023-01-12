<?php
include 'header.php';
include 'footer.php';
include_once './session_helper.php';
error_reporting(0);
?>

<body  class="bg-dark">
<div class="container">
    <br>
    <h2 class="mt-4 text-light">Please Sign Up</h2>
    <div class="">
        
        <form id='' class="bg-light form-group signup" method="POST" action="/controllers/Users.php">
        <?php flash('register'); ?>
            <input type="hidden" name="type" value="register">
            <br>
            <input class="" type="text" name="usersName" placeholder="Full name..." value="<?php echo ($_POST['usersName']); ?>"><br>
            <br>
            <input class="" type="text" name="usersEmail" placeholder="Email..." value="<?php echo ($_POST['usersEmail']); ?>"> <br>
            <br>
            <input class="" type="text" name="usersUid" placeholder="Username..." value="<?php echo ($_POST['usersUid']); ?>"> <br>
            <br>
            <input class="" type="password" name="usersPwd" placeholder="Password..." value="<?php echo ($_POST['usersPwd']); ?>"> <br>
            <br>
            <input class="" type="password" name="pwdRepeat" placeholder="Repeat Password..." value="<?php echo ($_POST['pwdRepeat']); ?>"><br>
            <button id="boton" class="mt-3" type="submit" name="submit">Sign Up</button>
        </form>
        <div class="mb-4">
            <a class="text-light" href="./login.php">Already a Member? Log in</a>
        </div>
    </div>
</div>
</body>

