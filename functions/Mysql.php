<?php

class Mysql {
    
    // function connect() {
    //     $servername = "localhost";
    //     $username = "root";
    //     $password = "root";
    //     $database = "booklist";

    //     $conn = new mysqli($servername, $username, $password, $database);
        
    //     if ($conn -> connect_errno) {
    //         echo "Failed to connect to MySQL: " . $conn -> connect_error;
    //     }

    //     return $conn;
    // }

    

    public $conn;
    
    public function __construct ($servername, $username, $password, $database) {

        $servername = "localhost";
        $username = "root";
        $password = "root";
        $database = "booklist";

        $this->conn = new mysqli ($servername, $username, $password, $database);

        
        
        if ($this->conn->connect_error) {
            die ("Connection Failed: " . $this->conn->connect_error);
        }
    }

    function getAllBooks() {
        
        $getBookListQuery = "select
            b.id,
            b.name bookName,
            a.name authorName,
            b.quantity qty,
            u.name username
            
            from books as b
            left join authors as a
            on b.authorId = a.id
            left join users as u
            on b.userId = u.id

            order by id asc

        ";
        
        $result = $this->conn->query($getBookListQuery);
        
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

        $result = $this->conn->query($getAllAuthorsQuery);

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

        $result = $this->conn->query($createBookQuery);

        if ($result) {
            // will redirect to the books page if the execution is success
            header('Location: /books.php');
        } else {
            print_r('Error: '.$this->conn);
        }
    }

    function getSingleBook ($id) {
        $getSingleBookQuery = "select * from books where id = ".$id.";";

        $result = $this->conn->query($getSingleBookQuery);


        $book = [];
        while ($row = $result->fetch_assoc()) {
            $book = $row;
        };

        return $book;
    }

    function editBook ($id, $bookName, $quantity, $authorId, $userId) {
        

        $editBookQuery = 'update books set name="'.$bookName.'", quantity='.$quantity.', authorId='.$authorId.', userId='.$userId.' where id='.$id.';';

        $result = $this->conn->query($editBookQuery);

        if ($result) {
            // will redirect to the books page if the execution is success
            header('Location: /books.php');
        } else {
            print_r('Error: '.$this->conn);
        }
    }

    function deleteBook ($id) {
        $deleteBookQuery = 'delete from books where id='.$id;

        $result = $this->conn->query($deleteBookQuery);

        if ($result) {
            // will redirect to the books page if the execution is success
            header('Location: /books.php');
        } else {
            print_r('Error: '.$this->conn);
        }
    }

    function createAuthor ($authorName) {
        $createAuthorQuery = "
            insert into authors (name) values ('".$authorName."')
        ";
        $result = $this->conn->query($createAuthorQuery);

        if ($result) {
            
            header('Location: /authors.php');
        } else {
            print_r('Error: '.$this->conn);
        }
        
    }

    function getSingleAuthor ($id) {
        $getSingleAuthorQuery = "select * from authors where id = ".$id.";";

        $result = $this->conn->query($getSingleAuthorQuery);

        $author = [];
        while ($row = $result->fetch_assoc()) {
            $author = $row;
        };

        return $author;
    }

    function editAuthor ($id, $authorName) {
        

        $editAuthorQuery = 'update authors set name="'.$authorName.'" where id='.$id.';';

        $result = $this->conn->query($editAuthorQuery);

        if ($result) {
            
            header('Location: /authors.php');
        } else {
            print_r('Error: '.$this->conn);
        }
    }

    function deleteAuthor ($id) {
        $deleteAuthorQuery = 'delete from authors where id='.$id;

        $result = $this->conn->query($deleteAuthorQuery);

        if ($result) {
            
            header('Location: /authors.php');
        } else {
            print_r('Error: '.$this->conn);
        }
    }

    function getAllUsers() {
        $getAllUsersQuery = "
            select 
            u.id, 
            u.name username,
            u.password password,
            u.email email, 
            d.address address,
            d.age age,
            d.sex sex,
            d.celno celno,
            d.userId userId
            

            from users as u 
            inner join userdetails as d
            on u.id = d.userId

            
        ";
        
        $result = $this->conn->query($getAllUsersQuery);
        
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        };

        return $users;
    }

    function createUser($username, $password, $email, $address, $age, $sex, $celno, $userId) {
        

        $createUserQuery = "
            insert into users (name, password, email) values ('".$username."', '".$password."', '".$email."');
        ";
        // print_r ($createUserQuery);
        // exit;
        $result = $this->conn->query($createUserQuery);
        
        $id = $this->conn->insert_id;
        
        

        $createUserDetailsQuery = "
            insert into userdetails (address, age, sex, celno, userId) values ('".$address."', '".$age."', '".$sex."', '".$celno."', '".$id."');
        ";
        
        // print_r ($createUserDetailsQuery);
        // exit;
        $result = $this->conn->query($createUserDetailsQuery);
        
        
        return $id;
        
        
        // print_r ($result);
        // exit;
        // $createUserIdQuery = 
        // " insert into userdetails (userId) values ('".$userId."');
        //   select last_insert_id() from users;";
        // $id = $this->conn->insert_id;
        // $id = $result->insert_id;

        // print_r ($id);
        // exit;
        // return $id;


        
        
        // $result = $this->conn->query($createUserIdQuery);
        
        
        // if ($this->conn->query($createUserDetailsQuery) === TRUE) {
        //     $userId=$this->conn->insert_id;
        // }
        // print_r ($userId);
        // exit;
        // if ($result) {
            
        //     header('Location: /users.php');
        // } else {
        //     print_r('Error: '.$this->conn);
        // }
    }

    // function getSingleUser ($id) {
    //     $getSingleUserQuery = "select * from users where id = ".$id.";";

    //     $result = $this->conn->query($getSingleUserQuery);
        

    //     // $getSingleUserDetailsQuery = "select * from userdetails where id = ".$id.";";

    //     // $result = $this->conn->query($getSingleUserDetailsQuery);
        
    //     $users = [];
    //     while ($row = $result->fetch_assoc()) {
    //         $users = $row;
    //     };

    //     return $users;
    // }

    function getSingleUser ($id) {
        $getSingleUserQuery = "select * from users where id = ".$id.";";
        // print_r ($getSingleUserQuery);
        // exit;
        $result = $this->conn->query($getSingleUserQuery);
        
        $user = [];
        while ($row = $result->fetch_assoc()) {
            $user = $row;
        };

        return $user;

    }

    function getSingleUserDetails ($id) {
        $getSingleUserDetailsQuery = "select * from userdetails where userId = ".$id.";";
        // print_r ($getSingleUserQuery);
        // exit;
        $result = $this->conn->query($getSingleUserDetailsQuery);

        $userdetails = [];
        while ($row = $result->fetch_assoc()) {
            $userdetails = $row;
        };

        return $userdetails;

    }
    

    function editUser ($id, $username, $password, $email, $address, $age, $sex, $celno) {
        

        $editUserQuery = 'update users set name="'.$username.'", password="'.$password.'", email="'.$email.'" where id='.$id.';';

        
        $result = $this->conn->query($editUserQuery);
        $editUserDetailsQuery = 'update userdetails set address="'.$address.'", age="'.$age.'", sex="'.$sex.'", celno="'.$celno.'" where userId='.$id.';';
        
        $result = $this->conn->query($editUserDetailsQuery);
        
        if ($result) {
            
            header('Location: /users.php');
        } else {
            print_r('Error: '.$this->conn);
        }
    }

    // function editUserDetails ($id, $address, $age, $sex, $celno) {
        

    //     $editUserDetailsQuery = 'update userdetails set address="'.$address.'", age="'.$age.'", sex="'.$sex.'", celno="'.$celno.'" where id='.$id.';';
    //     // print_r($editUserDetailsQuery);
    //     // exit;
    //     $result = $this->conn->query($editUserDetailsQuery);

    //     if ($result) {
            
    //         header('Location: /users.php');
    //     } else {
    //         print_r('Error: '.$this->conn);
    //     }
    // }

    function deleteUser ($id) {
        $deleteUserQuery = 'delete from users where id='.$id;

        $result = $this->conn->query($deleteUserQuery);

        if ($result) {
            
            header('Location: /users.php');
        } else {
            print_r('Error: '.$this->conn);
        }
    }

    function createNewUser ($username, $password, $email, $address, $age, $sex, $celno, $userId) {
        $createNewUserQuery = "
            insert into users (name, password, email) values ('".$username."', '".$password."', '".$email."');
        ";

        $result = $this->conn->query($createNewUserQuery);

        $id = $this->conn->insert_id;
        
        $createNewUserDetailsQuery = "
            insert into userdetails (address, age, sex, celno, userId) values ('".$address."', '".$age."', '".$sex."', '".$celno."', '".$id."');
        ";
        $result = $this->conn->query($createNewUserDetailsQuery);
        // print_r ($id);
        // exit;

        return $id;
        // if ($result) {
            
        //     header('Location: /login.php');
        // } else {
        //     print_r('Error: '.$this->conn);
        // }
    }

    // function getAllUsersWithSearch () {

    //     $getAllUsersWithSearchQuery  = "
    //         select 
    //         u.id, 
    //         u.name username,
    //         u.password password,
    //         u.email email, 
    //         d.address address,
    //         d.age age,
    //         d.sex sex,
    //         d.celno celno,
    //         d.userId userId
            

    //         from users as u 
    //         inner join userdetails as d
    //         on u.id = d.userId

            
    //     ";

    //     $result = $this->conn->query($getAllUsersWithSearchQuery);
        
    //     if ($result == $_GET['search']) {
            
    //         "select * from users where name like '%".$search."%'";


    //     } else {

    //         $users = [];
    //             while ($row = $result->fetch_assoc()) {
    //         $users[] = $row;
    //         };

    //         return $users;

    //     }

    // }

        

        
    //     $getAllUsersWithSearchQuery = "
    //         select * from users where name like '%.search.%';
    //     ";

    //     $result = $this->conn->query($getAllUsersWithSearchQuery);
        
    //     print_r($result);
    //     exit;
    //     // if ($result) {
            
    //     //     header('Location: /users.php');
    //     // } else {
    //     //     print_r('Error: '.$this->conn);
    //     // }
    // }

    function getAllUsersWithSearch ($search, $sortColumn, $sortType, $limit, $offset) {
        $searchUserQuery = "
             
            select u.id, u.name username, u.password password, u.email email, d.address address, d.age age, d.sex sex, d.celno celno, d.userid userId 
            
            from users as u inner join userdetails as d on u.id = d.userId 
            where name like '%$search%'

            
            
        ";

        if ($sortColumn != '' && $sortType != ''){
            $searchUserQuery .= " ORDER BY ".$sortColumn." ".$sortType." ";
        }

        if ($limit != '' && $offset != '') {
            $searchUserQuery .= " Limit ".$limit.", ".$offset." ";
        }

        
        
        // $searchUserQuery = "
            
        //     select 
        //     u.id, 
        //     u.name username,
        //     u.password password,
        //     u.email email, 
        //     d.address address,
        //     d.age age,
        //     d.sex sex,
        //     d.celno celno,
        //     d.userId userId
            

        //     from users as u 
        //     inner join userdetails as d
        //     on u.id = d.userId

        // ";

        // print_r ($searchUserQuery);
        // exit;
        $result = $this->conn->query($searchUserQuery);
        // if ($sortType != '' && $sortColumn != ''){
        //     $query .= $query." ORDER BY ".$sortColumn." ".$sortType." ";
        // }

        // if ($limit != '' && $offset != '') {
        //     $query = $query." Limit ".$limit." ".$offset." ";
        // }

        // print_r ($result);
        
        // if ($result->num_rows == 0) {
        //     // print_r ('no result');
        //     $usersList = 0;
        //     return $usersList;
        // } else {
        //     $userSearch = [];
        //         while ($row = $result->fetch_assoc()) {
        //     $userSearch [] = $row;
        // };
        
        
        // return $userSearch;
        // }
        $userSearch = [];
        while ($row = $result->fetch_assoc()) {
            $userSearch [] = $row;
        };
        
        
        return $userSearch;

        // if (empty($result)==0) {
        //     print_r ('no result');
        // }
        
        // print_r ($userSearch);
        // exit;

    }

    // function searchUser ($search) {
    //     if ($search == 'search') {
    //         function searchUser1 ($search)
    //     } 
    //     // else {
    //     //     $mysqlInstance->getAllUsers();
    //     // }
    // }

    // if ($search == 'search') {
    //     function searchUser1 ($search)
    // }
        
    // function getAllUsersByAsc() {
    //     $getAllUsersQuery = "
    //         select 
    //         u.id, 
    //         u.name username,
    //         u.password password,
    //         u.email email, 
    //         d.address address,
    //         d.age age,
    //         d.sex sex,
    //         d.celno celno,
    //         d.userId userId
            

    //         from users as u 
    //         inner join userdetails as d
    //         on u.id = d.userId
            
    //         order by id asc
    //     ";
        
    //     $result = $this->conn->query($getAllUsersQuery);
        
    //     $users = [];
    //     while ($row = $result->fetch_assoc()) {
    //         $users[] = $row;
    //     };

    //     return $users;
    // }

    // function getAllUsersByDesc() {
    //     $getAllUsersQuery = "
    //         select 
    //         u.id, 
    //         u.name username,
    //         u.password password,
    //         u.email email, 
    //         d.address address,
    //         d.age age,
    //         d.sex sex,
    //         d.celno celno,
    //         d.userId userId
            

    //         from users as u 
    //         inner join userdetails as d
    //         on u.id = d.userId
            
    //         order by id desc
    //     ";
        
    //     $result = $this->conn->query($getAllUsersQuery);
        
    //     $users = [];
    //     while ($row = $result->fetch_assoc()) {
    //         $users[] = $row;
    //     };

    //     return $users;
    // }

    // function getRow ($page) {
    //     $getRowQuery = "
    //         select 
    //         u.id, 
    //         u.name username,
    //         u.password password,
    //         u.email email, 
    //         d.address address,
    //         d.age age,
    //         d.sex sex,
    //         d.celno celno,
    //         d.userId userId
            

    //         from users as u 
    //         inner join userdetails as d
    //         on u.id = d.userId
            
    //         limit $page
    //     ";
    //     $result = $this->conn->query($getRowQuery);
    //     // print_r ($page);
    //     // exit;
    //     $usersRow = [];
    //     while ($row = $result->fetch_assoc()) {
    //         $usersRow[] = $row;
    //     };

    //     return $usersRow;
    // }

    function loginValidation ($loginEmail, $loginPassword) {
        $loginValidationQuery = "
            select * from users where email = '$loginEmail' and password = '$loginPassword'
        ";
        $result = $this->conn->query($loginValidationQuery);
        print_r ($result);
        // exit;
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc() ;
            if ($row['email']===$loginEmail && $row['password']===$loginPassword) {
                
                $_SESSION ['email'] = $row['email'];
                $_SESSION ['password'] = $row['password'];
                $_SESSION ['id'] = $row ['id'];
                header ('Location: /users.php');
                exit;
            } else {
                header ('Location: /login.php?error=Incorrect Credentials');
                exit;
            }
        } else {
            header ('Location: /login.php?error=Incorrect Credentials');
            exit;
        }
    }
        
}