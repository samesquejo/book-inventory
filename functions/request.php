<?php
    /**
     * THIS IS WHERE ALL REQUEST CATCHER SHOULD GO "CONTROLLERS"
     */
    require_once ('Mysql.php');
    $action = $_REQUEST['action'];

    $mysqlInstance = new Mysql();

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