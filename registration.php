<?php
    // import your header file
    require_once 'functions/init.php';

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "booklist";

    // create a Mysql instance for your mysql connection and queries
    $mysqlInstance = new Mysql ($servername, $username, $password, $database);

    
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
    <section>
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1>Sign Up</h1>
                        <form action="functions/request.php" method="POST">
                            <input type="hidden" name="action" value="create-new-user">
                            <div class="col-3 mb-2">
                                <label for="username" class="col-form-label">Username</label>
                                <input type="text" id="username" name="username" class="form-control">
                            </div>
                            <div class="col-3 mb-2">
                                <label for="password" class="col-form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>
                            <div class="col-3 mb-2">
                                <label for="email" class="col-form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                            <div class="col-3 mb-2">
                                <label for="address" class="col-form-label">Address</label>
                                <input type="text" id="address" name="address" class="form-control">
                            </div>
                            <div class="col-3 mb-2">
                                <label for="age" class="col-form-label">Age</label>
                                <input type="number" id="age" name="age" class="form-control">
                            </div>
                            <div class="col-3 mb-2">
                                <label for="sex" class="col-form-label">Gender</label>
                                <input type="text" id="sex" name="sex" class="form-control">
                            </div>
                            <div class="col-3 mb-2">
                                <label for="celno" class="col-form-label">Cellphone Number</label>
                                <input type="text" id="celno" name="celno" class="form-control">
                            </div>
                            <div class="text-start">
                                <a href="./login.php" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="container">
            <div class="d-flex flex-column align-items-center">
                <h2 class="text-start">Sign Up</h2>
                <div class="row row-cols-2">
                    <h5>User Info</h5>
                    <h5>User Details</h5>
                </div>
                <div class="row">
                    <div class="col mx-4">
                        
                        <div class="mb-2">
                            <label for="username" class="col-form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="password" class="col-form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="col mx-4">
                        
                        <div class="mb-2">
                            <label for="address" class="col-form-label">Address</label>
                            <input type="text" id="address" name="address" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="age" class="col-form-label">Age</label>
                            <input type="number" id="number" name="number" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="sex" class="col-form-label">Gender</label>
                            <input type="text" id="sex" name="sex" class="form-control">
                        </div>
                        <!-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                            Default checkbox
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                            Checked checkbox
                            </label>
                        </div> -->
                        <!-- <div class="mb-2">
                            <label for="celno" class="col-form-label">Phone Number</label>
                            <input type="celno" id="celno" name="celno" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </section>
</body>



<?php
    include_once './layout/footer.php';
?>
