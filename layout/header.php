<?php
    // import your init file 
    require_once 'functions/init.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body data-bs-theme="dark">

    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/books.php">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/authors.php">Authors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/users.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login.php"> Login </a>
                    </li>
                    
                </ul>
            </div>
            <!-- <div class="">
                
                <div class="input-group">
                    <button class="btn btn-primary input-group-text">
                        <i class="fas fa-search"></i>
                    </button>
                    <label for="search" class="form-label"></label>
                    <input type="search" id="search" class="form-control" value="search">
                </div>
                
            </div> -->
        </div>
    </nav>
    <!-- end of navigation bar -->