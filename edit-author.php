<?php
    include_once './layout/header.php';
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "booklist";

    $mysqlInstance = new Mysql($servername, $username, $password, $database);

    // $authorsList = $mysqlInstance->getAllAuthors();

    $authorDetails = $mysqlInstance->getSingleAuthor ($_GET['id']);
?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <form action="functions/request.php" method="POST">
                    <input type="hidden" name="action" value="edit-author">
                    <input type="hidden" name="id" value="<?= $authorDetails['id']?>">

                    <div class="mb-3">
                        <label for="author-name" class="form-label">Author Name</label>
                        <input type="text" id="author-name" name="author-name" value="<?= $authorDetails['name'] ?>" class="form-control">
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
   