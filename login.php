<?php
    

    // import your header file

    // import your init file 
    require_once 'functions/init.php';

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "booklist";
        

    $mysqlInstance = new Mysql($servername, $username, $password, $database);
    // session_start(); 
    $loginEmail = isset($_POST['loginEmail']) ? $_POST['loginEmail'] : '';
    $loginPassword = isset ($_POST['loginPassword']) ? $_POST['loginPassword'] : '';

    // if (isset($loginEmail) && isset($loginPassword)) {
    //     $mysqlInstance->loginValidation ($loginEmail, $loginPassword);
    // } elseif (empty($loginEmail or empty($loginPassword))) {
    //     echo 'Invalid UserName or Password';
    // } else {
    //     echo 'Try Again';
    // }
    // $login = $mysqlInstance->loginValidation ($loginEmail, $loginPassword);
    // $loginEmail = $_POST['loginEmail'];
    // $loginPassword = $_POST['loginPassword'];
        

    if (!empty($loginEmail) && !empty($loginPassword)) {
        // function validate ($data) {
        //     $data = trim($data);
        //     $data = stripslashes($data);
        //     $data = htmlspecialchars ($data);
        //     return $data;
        // }

        // $loginEmail = validate ($_POST['loginEmail']);
        // $loginPassword = validate ($_POST['loginPassword']);

        // $loginEmail = $_POST['loginEmail'];
        // $loginPassword = $_POST['loginPassword'];
        
        // print_r ($loginEmail);

        // $loginEmail = isset($_POST['loginEmail']) ? $_POST['loginEmail'] : '';
        // $loginPassword = isset ($_POST['loginPassword']) ? $_POST['loginPassword'] : '';

        if (empty($loginEmail)) {
            header ("location: /login.php?error=Email is Required");
            exit;
        } elseif (empty($loginPassword)){
            header ("location: /login.php?error=Password is Required");
            exit;

        } else {
            $mysqlInstance->loginValidation ($loginEmail, $loginPassword);
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body data-bs-theme="dark">
    <div class="vh-100 d-flex justify-content-center">
        <form action="/login.php" class="align-self-center" method="POST">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="text" id="loginEmail" name="loginEmail"class="form-control" />
                <label class="form-label" for="loginEmail">Email address</label>
            </div>
        
            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="loginPassword" name="loginPassword"class="form-control" />
                <label class="form-label" for="loginPassword">Password</label>
            </div>
        
            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                   <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                        <label class="form-check-label" for="form2Example31">Remember me</label>
                    </div>
                </div>
            
        
                <div class="col">
                    <!-- Simple link -->
                    <a href="#!">Forgot password?</a>
                </div>
            </div>

            <div class="d-flex justify-content-around">
                
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary">Sign in</button>

                <a href="./registration.php" class="btn btn-primary">Register</a>
                
            </div>
            <!-- <div class="text-center">
                <p>Not a member? <a href="#!">Register</a></p>
                <p>or sign up with:</p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                </button>
        
                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-google"></i>
                </button>
        
                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
                </button>
        
                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-github"></i>
                </button>
            </div> -->
        </form>
    </div>




