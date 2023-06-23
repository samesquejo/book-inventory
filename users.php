<?php
    // import your header file
    include_once './layout/header.php';
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "booklist";
        

    $mysqlInstance = new Mysql($servername, $username, $password, $database);

    // $usersList = $mysqlInstance->getAllUsers();

    // $searchUser = $mysqlInstance->getAllUsersWithSearch ();

    // $usersList = $mysqlInstance->getAllUsersWithSearch($_GET['search']);
    
    // $search = $_GET ['search'];

    $search = isset($_GET['search']) ? $_GET ['search'] : ''   ;
    
    // print_r ($search);
    
    // $usersList = $mysqlInstance->getAllUsersWithSearch ($_GET['search']);
    // print_r ($search);
    // if (empty($search)) {
    //     $search = ' ';
    // }

    // if (isset($search) == true) {
    //     $search = ($_GET['search']) ? $_GET['search'] : '' ;
    //     echo '1';
    // } 
    // $search = ($_GET['search']) ? $_GET['search'] : '' ;
    // if (empty(num_rows)) {
    //     $usersList = $mysqlInstance->getAllUsers();
    // } else {
    //     $usersList = $mysqlInstance->getAllUsersWithSearch($_GET['search']);
    // }
   
    // if (isset($search)) {
    //     print_r ('yes');
    // } else {
    //     print_r ('no');
    // }
    // $searchUser = $mysqlInstance->searchUser($_GET['search']);
    
    // if (empty($search) == false ) {
    //     print_r ('yes');
    // } else{
    //     print_r ('no');
    // }
    //here
    // if (isset(($_GET['search'])) == FALSE ) {
    //     $usersList = $mysqlInstance->getAllUsers();
    // } else{
    //     $usersList = $mysqlInstance->getAllUsersWithSearch($_GET['search']);
    // }
    //here
    // $search = isset($_GET['search']) ? $_GET['search'] : '';
    $sortColumn = isset ($_POST['sortColumn']) ? $_POST['sortColumn'] : '';
    $sortType = isset ($_POST['sortType']) ? $_POST['sortType'] : '';
    $limit = isset ($_POST['limit']) ? $_POST['limit'] : '';
    $offset = isset ($_POST['offset']) ? $_POST['offset'] : '';
    $usersList = $mysqlInstance->getAllUsersWithSearch($search, $sortColumn, $sortType, $limit, $offset);
    // if($search->num_rows == '0'){
    //     $usersList = $mysqlInstance->getAllUsers();
    // }else{
    //     // echo 'no data matched';
    //     $usersList = $mysqlInstance->getAllUsersWithSearch($_GET['search']);
    // }
    
    // $usersList = $mysqlInstance->getAllUsersWithSearch($_GET['search']);
    
    // if ($search->) {
    //     $usersList = $mysqlInstance->getAllUsers();
    // } else {
    //     $usersList = $mysqlInstance->getAllUsersWithSearch($_GET['search']);
    // }
    

    // if ($arrangement == 'asc') {
    //     $usersList = $mysqlInstance->getAllUsersByAsc();
    // } else {
    //     $usersList = $mysqlInstance->getAllUsersByDesc();
    // }

    // Sort Toggle

    // $currentSort = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
    // print_r ($currentSort);
    
    // if ($currentSort == 'asc') {
    //     $usersList = $mysqlInstance->getAllUsersByAsc();
    // } else {
    //     $usersList = $mysqlInstance->getAllUsersByDesc();
    // }
    
        //  pagination without form
    // $page = isset($_GET['page']) ? $_GET['page'] : '';

    // if (isset(($_GET['page'])) == TRUE ) {
    //     $usersList = $mysqlInstance->getRow($page);
    // } else{
    //     $usersList = $mysqlInstance->getAllUsersWithSearch($_GET['search']);
    // }
    
?>


<section class="py-5">
    <div class="container">
        <div class="row mb-3">
            <div class="col-9">

            </div>

            <div class="col d-flex align-items-center">
                
                <form action="/users.php" method="get" class = "col-9 input-group">
                    <input type="text" class="form-control" placeholder="Search" name="search" >
                    <button type="submit" value="search" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                
                    
                    
                </form>
                <div class="col-6 px-2">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalForUsers">Add Users</button>

            </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Users List</h1>
            </div>

            <div class="col-2">
                <form action="/users.php" method="POST" >
                    <div class="col mb-3">
                        <select id="sortColumn" name="sortColumn" class="form-select">
                            <!-- <option selected>Select Column</option> -->
                            <option value="id">Id</option>
                            <option value="Name">Name</option>
                            <option value="email">Email</option>
                            <option value="address">Address</option>
                            <option value="age">Age</option>
                            <option value="sex">Gender</option>
                            <option value="number">Number</option>
                        </select>
                    </div>
                    <div class="col mb-3">
                        <select name="sortType" id="sortType"class="form-select">
                            <!-- <option selected>Select Sort Type</option> -->
                            <option value="asc">Ascending</option>
                            <option value="desc">Descending</option>
                        </select>
                    </div>
                    <!-- <div class="w-100 d-none d-md-block"></div> -->
                    <div class="col mb-3">
                        <input type="text" placeholder="Limit" name="limit"class="form-control">
                    </div>
                    <div class="col mb-3">
                        <input type="text" placeholder="Offset" name="offset" class="form-control">
                    </div>
                    <button input="submit" class="btn btn-primary col mb-3">
                        Set
                    </button>
                </form>
                
            </div>

            <!-- <div class="col-4">
                <div class="row">
                    <p class="col text-end">
                        Sort By :
                    </p>
                    <div class="col">
                        <select id="sort" name="sortColumn" class="form-select">
                            <option value="id">Id</option>
                            <option value="Name">Name</option>
                            <option value="email">Email</option>
                            <option value="address">Address</option>
                            <option value="age">Age</option>
                            <option value="sex">Gender</option>
                            <option value="number">Number</option>
                        </select>
                    </div>
                    <div class="col">
                        <a href="/users.php?sort=<?= $currentSort == 'asc' ? 'desc' : 'asc' ?>" class="btn btn-primary">
                            <i class="fa fa-sort"></i>
                        </a>
                        <!-- <form action="" method="get">
                            
                            <select id="arrangement" name="arrangement" class="form-select">
                                <option value="asc">Ascending</option>
                                <option value="desc">Descending</option>
                            </select>
                            <input type="hidden" class="form-control" name="arrangement">
                        </form>
                        
                    </div>
                </div>
                
            </div> -->
        </div>
        <!-- <div class="row">
            <div class="col-2 d-flex align-items-center">
                <div class="col-10 text-center">Rows Per Page :</div>
                <form action="/users.php" method="GET" class="col-2">
                    <input type="text" name="page" class="form-control">
                </form>
            </div>
            

        </div> -->
        <div class="row">
            <div class="col">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="col">ID</th>
                            <th class="col">Name</th>
                            <th class="col">Email</th>
                            <th class="col">Address</th>
                            <th class="col">Age</th>
                            <th class="col">Sex</th>
                            <th class="col">Number</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usersList as $key => $value): ?>
                            <tr>
                                <td><?= $value['id'] ?> </td>
                                <td><?= $value['username'] ?></td>
                                <td><?= $value['email'] ?></td>
                                <td><?= $value['address'] ?></td>
                                <td><?= $value['age'] ?> </td>
                                <td><?= $value['sex'] ?></td>
                                <td><?= $value['celno'] ?></td>
                                <td class="d-flex justify-content-end">
                                    <a href="/edit-user.php?id=<?= $value['id'] ?>" class="btn btn-warning me-2">Edit</a>
                                    <form action="functions/request.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                        <input type="hidden" name="action" value="delete-user">
                                        <button class="btn btn-danger me-2">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>

<div class="modal fade" id="modalForUsers">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalForUsers">Add Users</h1>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="functions/request.php" method="POST">
                    <input type="hidden" name="action" value="create-user">
                    <div class="mb-2">
                        <label for="username" class="col-form-label">Username</label>
                        <input type="text" id="username" name="username" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" name="address" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" id="age" name="age" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="sex" class="form-label">Sex</label>
                        <select id="sex" name="sex" class="form-select">
                            <option value="M">M</option>
                            <option value="F">F</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="celno" class="form-label">Number</label>
                        <input type="tel" id="celno" name="celno" placeholder="+63" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button> 
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

</div>

<?php
    include_once './layout/footer.php';

      
?>