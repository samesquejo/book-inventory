<?php
    // import your header file
    include_once './layout/header.php';

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "booklist";

    // create a Mysql instance for your mysql connection and queries
    $mysqlInstance = new Mysql ($servername, $username, $password, $database);

    // execute get all books for table list
    $bookList = $mysqlInstance->getAllBooks();
    
    // execute get all authors for select options
    $authorsList = $mysqlInstance->getAllAuthors();
?>

<!-- books list section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>Book List</h1>
            </div>
            <div class="col-6 text-end">

                <!-- create book button -->
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#bookFormModal">
                    Add Book
                </button>
                <!-- end create book button -->

            </div>
        </div>
        <div class="row">
            <div class="col">
                <!-- books table list -->
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col" scope="col">ID</th>
                            <th class="col" scope="col">Name</th>
                            <th class="col" scope="col">Author</th>
                            <th class="col" scope="col">Qty</th>
                            <th class="col" scope="col">User</th>
                            <th class="col-2" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($bookList as $key => $value): ?>
                            <tr>
                                <td><?= $value['id'] ?></td>
                                <td><?= $value['bookName'] ?></td>
                                <td><?= $value['authorName'] ?></td>
                                <td><?= $value['qty'] ?></td>
                                <td><?= $value['username'] ?></td>
                                <td class="d-flex justify-content-end">
                                    <a href="/edit-book.php?id=<?= $value['id'] ?>" class="btn btn-warning me-2">
                                        Edit
                                    </a>
                                    <form action="functions/request.php" method="post">
                                        <input type="hidden" name="id" value="<?= $value['id'] ?> ">
                                        <input type="hidden" name="action" value="delete-book">
                                        <button class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- end books table list-->
            </div>
        </div>
    </div>
</section>
<!-- end of book list section -->

<!-- book form modal -->
<div class="modal fade" id="bookFormModal" tabindex="-1" aria-labelledby="bookFormModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="bookFormModalLabel">Add Book</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <!-- book form -->
                <form action="functions/request.php" method="POST">
                    <input type="hidden" name="action" value="create-book">
                    <div class="mb-3">
                        <label for="book-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="book-name" name="book-name">
                    </div>
                    <div class="mb-3">
                        <label for="authorId" class="form-label">Author</label>
                        <select class="form-select" id="authorId"  name="authorId">
                            
                            <!-- always add a default option for select field -->
                            <option selected>Select Author</option>

                            <!-- create a list of authors options for select, the option value should
                            contain authors id since that is the required field on your books table -->
                            <?php foreach($authorsList as $key => $value): ?>
                                <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                            <?php endforeach;?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="text" class="form-control" id="quantity" name="quantity">
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <!-- end book form -->

            </div>

        </div>
    </div>
</div>
<!-- end book form modal -->

<?php
    include_once './layout/footer.php';
?>
