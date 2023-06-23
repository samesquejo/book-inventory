<?php
    /**
     * THIS IS WHERE ALL REQUEST CATCHER SHOULD GO "CONTROLLERS"
     */
    
    require_once ('Mysql.php');
    $action = $_REQUEST['action'];

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "booklist";
    
    

    $mysqlInstance = new Mysql($servername, $username, $password, $database);
    
    
    if ($action == 'create-book') {
        // build create book form 
        $bookName = $_POST['book-name'];
        $quantity = (int) $_POST['quantity'];
        $authorId = (int) $_POST['authorId'];
        $userId = 1; // TODO should be the ID of the user who is in session

        $mysqlInstance->createBook($bookName, $quantity, $authorId, $userId);
    }

    if ($action == 'edit-book') {
        // build create book form 
        $id = $_POST['id'];
        $bookName = $_POST['book-name'];
        $quantity = (int) $_POST['quantity'];
        $authorId = (int) $_POST['authorId'];
        $userId = 1; // TODO should be the ID of the user who is in session

        $mysqlInstance->editBook($id, $bookName, $quantity, $authorId, $userId);
    }

    if ($action == 'delete-book') {
        $id = $_POST['id'];

        $mysqlInstance->deleteBook($id);
    }

    if ($action == 'create-author') {

        $authorName = $_POST['author-name'];
        
        $mysqlInstance->createAuthor($authorName);
        
    }

    if ($action == 'edit-author') {
        
        $id = $_POST['id'];
        $authorName = $_POST['author-name'];

        $mysqlInstance->editAuthor($id, $authorName);
    }

    if ($action == 'delete-author') {
        $id = $_POST['id'];
        $mysqlInstance->deleteAuthor($id);
    }

    if ($action == 'create-user') {
         
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email =  $_POST['email'];
        $address = $_POST['address'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $celno = $_POST['celno'];
        $userId = '';

        // print_r ($userId);
        // exit;
        
        
        
        // $mysqlInstance->createUser ($username, $password, $email, $address, $age, $sex, $celno, $userId);

        $resultCreate = $mysqlInstance->createUser($username, $password, $email, $address, $age, $sex, $celno, $userId);

        $userId = $resultCreate;

        // print_r ($userId);
        // exit;
        
        header('Location: /users.php');

        
    }

    if ($action == 'edit-user') {
        
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $celno = $_POST['celno'];
        

        

        $mysqlInstance->editUser($id, $username, $password, $email, $address, $age, $sex, $celno);

        // print_r ($action);
        // exit;

        
    }

    if ($action == 'create-new-user'){

        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $celno = $_POST['celno'];
        $userId = 1;
        

        $resultCreate = $mysqlInstance->createNewUser($username, $password, $email, $address, $age, $sex, $celno, $userId);

        $userId = $resultCreate;

        // print_r ($userId);
        // exit;
        
        header('Location: /login.php');
    }

    // if ($action == 'edit-user-details') {
        
    //     $id = $_POST['id'];
    //     $address = $_POST['address'];
    //     $age = $_POST['age'];
    //     $sex = $_POST['sex'];
    //     $celno = $_POST['celno'];

    //     $mysqlInstance->editUserDetails($id, $address, $age, $sex, $celno);
    // }

    if ($action == 'delete-user') {
        $id = $_POST['id'];
        $mysqlInstance->deleteUser ($id);
    }