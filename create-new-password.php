<?php
error_reporting();
    if (empty($_GET['selector']) || empty($_GET
    ['validator'])){
        echo 'Could not validate your request!';
    }else{
        $selector = $_GET['selector'];
        $validator = $_GET['validator'];

        if(ctype_xdigit($selector) && ctype_xdigit($validator)) { ?>

            <?php
                include_once 'header.php';
                include_once 'footer.php';
                include_once './session_helper.php';
            ?>

            <body  class="bg-dark">
            <div class="mt-3 container">
                <h2 class="mt-4 text-light">Create new password</h2 class="mt-4 text-light">
               <div>
                <form class="bg-light signup" method="POST" action="/controllers/ResetPasswords.php">
                    <?php flash('newPwd')?>
                        <input type="hidden" name="type" value="reset" />
                        <input type="hidden" name="selector" value="<?php echo $selector ?>" />
                        <input type="hidden" name="validator" value="<?php echo $validator ?>" />
                        <input class="mt-3" type="password" name="pwd" 
                        placeholder="Enter a new password..."><br>
                        <input class="mt-3" type="password" name="pwd-repeat" 
                        placeholder="Repeat new password..."> <br>
                        <button id="boton" class= " mt-3" type="submit" name="submit">Set New Password</button>
                    </form>
               </div> 
               
            </div>
<?php
        }else{
            echo 'Could not validate your request!';
        }
    }
?>