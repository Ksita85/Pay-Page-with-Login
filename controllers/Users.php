<?php
require_once '../models/User.php';
require_once '../session_helper.php';

class Users {
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User;
    }

    public function register(){
        //Process Form

        //Sanitize POST data
        //$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($_POST['submit'])){
            
            //Init data
            $data = [
                'usersName' => htmlspecialchars($_POST['usersName']),
                'usersEmail' => htmlspecialchars($_POST['usersEmail']),
                'usersUid' => htmlspecialchars($_POST['usersUid']),
                'usersPwd' => htmlspecialchars($_POST['usersPwd']),
                'pwdRepeat' => htmlspecialchars($_POST['pwdRepeat'])
            ];
            //Validate inputs
            if(empty ($data)){
                flash("register", "Please fill out all inputs");
                redirect('/signup.php');
            }
            if(!preg_match("/^[a-zA-Z0-9]*$/", $data['usersUid'])){
                flash("register", "Invalid username");
                redirect('/signup.php');
            }
            if(!filter_var($data['usersEmail'], FILTER_VALIDATE_EMAIL)){
                flash("register", "Invalid Email");
                redirect('/signup.php');
            }
            if(strlen($data['usersPwd']) < 6){
                flash("register", "Invalid password");
                redirect('/signup.php');
            }else if($data['usersPwd'] !== $data['pwdRepeat']){
                flash("register", "Passwords don't match");
                redirect('/signup.php');            
            }
            //User with the same email or username already exists
            if($this->userModel->findUserByEmailOrUsername($data['usersEmail'], $data['usersName'])){
                flash("register", "Username or email already taken");
                redirect('/signup.php'); 
            }
            //Passed all validation checks
            //now going to hash password
            $data['usersPwd'] = password_hash($data['usersPwd'], PASSWORD_DEFAULT);

            //Register User
            if($this->userModel->register($data)){
                redirect('/login.php');
            }else{
                die("Something went wrong");
            }
        }else{
            flash("register", "oops Something went wrong..");
        }
    }
    public function login(){
        //Sanitize post data
        //$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //init data
        $data =[
            'name/email' => htmlspecialchars($_POST['name/email']),
            'usersPwd' => htmlspecialchars($_POST['usersPwd'])
        ];
        
        if(empty($data['name/email']) || empty($data['usersPwd'])){
            flash("login", "Please fill out all inputs");
            header("location: /login.php");
            exit();
        }
        //Check for user email
        if($this->userModel->findUserByEmailOrUsername($data['name/email'], $data['name/email'])){
            //User found
            $loggedInUser = $this->userModel->login($data['name/email'], $data['usersPwd']);
            if($loggedInUser){
                //Create session
                $this->createUserSession($loggedInUser);
            }else{
                flash("login", "Password Incorrect");
                redirect('/login.php');
            }
        }else{
            flash("login", "No user found");
            redirect('/login.php');
        }
    }
    
    public function createUserSession($user){
        $_SESSION['usersUid'] = $user->usersUid;
        $_SESSION['usersName'] = $user->usersName;
        $_SESSION['usersEmail'] = $user->usersEmail;
        redirect('/index.php');
    }

    public function logout(){
        unset($_SESSION['usersUid']);
        unset($_SESSION['usersName']);
        unset($_SESSION['usersEmail']);
        session_destroy();
        redirect('/index.php');
    }

}

$init = new Users;
//Ensure that user is sending a POST request

if($_SERVER['REQUEST_METHOD'] =='POST'){
    switch($_POST['type']){
        case 'register':
            $init->register();
            break;
        case 'login':
            $init->login();
            break;
        default:
        redirect('/index.php');
    }
}else{
    switch ($_GET['q']){
        case 'logout':
            $init->logout();
            break;
        default:
        redirect('/index.php');
    }
}