<?php
    include_once './layout/header.php';
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "booklist";

    $mysqlInstance = new Mysql($servername, $username, $password, $database);
    $userInfo=$mysqlInstance-> getSingleUser ($_GET['id']);
    $userDetails=$mysqlInstance->getSingleUserDetails ($_GET['id']);

    // print_r ($userDetails);
    // exit;

?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <form action="functions/request.php" method="POST">
                    <input type="hidden" name="action" value="edit-user">
                    <!-- <input type="hidden" name="action" value="edit-user-details"> -->
                    <input type="hidden" name="id" value="<?= $userInfo['id']?>">
                    <input type="hidden" name="id" value="<?= $userDetails['id']?>">

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" value="<?= $userInfo['name'] ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" value="<?= $userInfo['email'] ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" name="address" value="<?= $userDetails['address'] ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" id="age" name="age" value="<?= $userDetails['age'] ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="sex" class="form-label">Gender</label>
                        <input type="text" id="sex" name="sex" value="<?= $userDetails['sex'] ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="celno" class="form-label">Number</label>
                        <input type="text" id="celno" name="celno" value="<?= $userDetails['celno'] ?>" class="form-control">
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</section>

<?php
    include_once './layout/footer.php';
?>
   