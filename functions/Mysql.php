<?php

class Mysql {
    
    function connect() {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $database = "booklist";

        $conn = new mysqli($servername, $username, $password, $database);
        
        if ($conn -> connect_errno) {
            echo "Failed to connect to MySQL: " . $conn -> connect_error;
        }

        return $conn;
    }

    function getAllBooks() {
        
        $getBookListQuery = "select
            b.id,
            b.name bookName,
            a.name authorName,
            b.quantity qty,
            u.name username
            
            from books as b
            inner join authors as a
            on b.authorId = a.id
            inner join users as u
            on b.userId = u.id

            order by id asc
        ";

        $result = $this->connect()->query($getBookListQuery);

        $booklist = [];
        while ($row = $result->fetch_assoc()) {
            $booklist[] = $row;
        };

        return $booklist;
    }

    function getAllAuthors() {
        $getAllAuthorsQuery = "
            select * from authors;
        ";

        $result = $this->connect()->query($getAllAuthorsQuery);

        $authors = [];
        while ($row = $result->fetch_assoc()) {
            $authors[] = $row;
        };

        return $authors;
    }

    function createBook($bookName, $quantity, $authorId, $userId) {

        $createBookQuery = "
            insert into books (name, quantity, authorId, userId) values ('".$bookName."', ".$quantity.", ".$authorId.", ".$userId.");
        ";

        $result = $this->connect()->query($createBookQuery);

        if ($result) {
            // will redirect to the books page if the execution is success
            header('Location: /books.php');
        } else {
            print_r('Error: '.$this->connect());
        }
    }

    function getSingleBook ($id) {
        $getSingleBookQuery = "select * from books where id = ".$id.";";

        $result = $this->connect()->query($getSingleBookQuery);


        $book = [];
        while ($row = $result->fetch_assoc()) {
            $book = $row;
        };

        return $book;
    }

    function editBook ($id, $bookName, $quantity, $authorId, $userId) {
        

        $editBookQuery = 'update books set name="'.$bookName.'", quantity='.$quantity.', authorId='.$authorId.', userId='.$userId.' where id='.$id.';';

        $result = $this->connect()->query($editBookQuery);

        if ($result) {
            // will redirect to the books page if the execution is success
            header('Location: /books.php');
        } else {
            print_r('Error: '.$this->connect());
        }
    }

    function deleteBook ($id) {
        $deleteBookQuery = 'delete from books where id='.$id;

        $result = $this->connect()->query($deleteBookQuery);

        if ($result) {
            // will redirect to the books page if the execution is success
            header('Location: /books.php');
        } else {
            print_r('Error: '.$this->connect());
        }
    }
}