<?php

    //     $servername = "localhost";
    //     $username = "root";
    //     $password = "root";
    //     $database = "booklist";
        
    //     $conn = new mysqli($servername, $username, $password, $database);


    //     // if ($action == 'create-user') {
         
        
    //     //     $username = $_POST['username'];
    //     //     $password = $_POST['password'];
    //     //     $email =  $_POST['email'];
    //     //     $address = $_POST['address'];
    //     //     $age = $_POST['age'];
    //     //     $sex = $_POST['sex'];
    //     //     $celno = $_POST['celno'];
    //     //     $userId = 1;
            
            
            
    //     //     $mysqlInstance->createUser ($username, $password, $email, $address, $age, $sex, $celno, $userId);

    //     // }

    //     // function connect() {
    //     //     $servername = "localhost";
    //     //     $username = "root";
    //     //     $password = "root";
    //     //     $database = "booklist";
    
    //     //     $conn = new mysqli($servername, $username, $password, $database);
            
    //     //     if ($conn -> connect_errno) {
    //     //         echo "Failed to connect to MySQL: " . $conn -> connect_error;
    //     //     }
    
    //     //     return $conn;
    //     // }

    //     // function createUser($username, $password, $email, $address, $age, $sex, $celno, $userId) {

    //     //     $createUserQuery = "
    //     //         insert into users (name, password, email) values ('".$username."', '".$password."', '".$email."');
    //     //     ";
    //     //     // print_r ($createUserQuery);
    //     //     // exit;
    //     //     $result = $this->connect()->query($createUserQuery);
    //     //     $createUserDetailsQuery = "
    //     //         insert into userdetails (address, age, sex, celno) values ('".$address."', '".$age."', '".$sex."', '".$celno."');
    //     //     ";
    //     //     // print_r ($createUserDetailsQuery);
    //     //     // exit;
    //     //     $result = $this->connect()->query($createUserDetailsQuery);

    //     // }

    //     $sql = "insert into userdetails (userId) values ('userId')";

    //     if ($conn->query($sql) === TRUE) {
    //         $last_id = $conn->insert_id;

    //         print_r ($last_id);
    //         exit;
    //     }


    // $_REQUEST;

    // print_r($_REQUEST);
// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "booklist";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// $sql = "INSERT INTO userdetails (address, age, sex, celno, userId)
// VALUES ('tag', '32', '09199919191', 1)";

// if ($conn->query($sql) === TRUE) {
//   $last_id = $conn->insert_id;
//   echo "New record created successfully. Last inserted ID is: " . $last_id;
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();


//     $search = $_POST['search'];

//     $servername = "localhost";
//     $username = "root";
//     $password = "root";
//     $database = "booklist";

//     $conn = new mysqli($servername, $username, $password, $database);

//     if ($conn->connect_error){
// 	    die("Connection failed: ". $conn->connect_error);
//     }

// $sql = "select * from name where name like '%$search%'";

// $result = $conn->query($sql);
// print_r ($search);
// exit;
// if ($result){
// while($row = $result->fetch_assoc() ){
// 	echo $row["id"]."  ".$row["name"]."  ".$row["password"]." ".$row["email"]."<br>";
// }
// } else {
// 	echo "0 records";
// }

// $conn->close();

//     // $search = [];
//     //     while ($row = $result->fetch_assoc()) {
//     //         $search = $row;
//     //     };

//     //     return $search;

$ninjaRank = isset($_POST['ninja-rank']) ? $_POST ['ninja-rank'] : '';

// rank 1 - 5 : display ninja white
// rank 6-10 : display ninja purple
// rank 6-7 : display ninja blue
// rank 0 : display ninja no rank
// rank above 10 : display ninja black
// rank 11-13: display ninja brown
// print_r ($ninjaRank);


if ($ninjaRank >= 7 && $ninjaRank <= 8) {
    echo "ninja blue";
} elseif ($ninjaRank <= 5 && $ninjaRank > 0) {
    echo ('ninja white');
} elseif ($ninjaRank >= 6 && $ninjaRank <= 10) {
    echo ('ninja purple');
} elseif ($ninjaRank == 0) {
    echo ('ninja no rank');  
} elseif ($ninjaRank >=11 && $ninjaRank <= 13) {
    echo ('ninja brown');
} else {
    echo ('ninja out of rank range');
}

?>







<body>

<form action="/sample-request.php" method="POST">
NINJA RANK <input type="text" name= "ninja-rank" ><br>
<input type ="submit">
</form>

</body>
</html>