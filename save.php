<?php
    // receive, setup http request
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    // database process
    $registerQuery = "insert into users (name, email, password) values ('".$name."','".$email."','".$password."')";

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "booklist";

    $conn = new mysqli($servername, $username, $password, $database);

    // $array['connect_errno']
    // $object->connect_errno

    if ($conn->connect_errno) {
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
    }

    $result = $conn->query($registerQuery);
    if ($result) {
        print_r('success added to database');
    }