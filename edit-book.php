<?php
    // import your header file
    include_once './layout/header.php';

    // create a Mysql instance for your mysql connection and queries
    $mysqlInstance = new Mysql();

    // execute get all authors for select options
    $authorsList = $mysqlInstance->getAllAuthors();

    // execute get a single book by id
    $bookDetails = $mysqlInstance->getSingleBook($_GET['id']);
?>

<!-- books list section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-6">

                <!-- book form -->
                <form action="functions/request.php" method="post">
                    <input type="hidden" name="action" value="edit-book">
                    <input type="hidden" name="id" value="<?= $bookDetails['id'] ?>">

                    <div class="mb-3">
                        <label for="book-name" class="form-label">Name</label>
                        <!-- you can assign a value to an in put by puting value on value attribute -->
                        <input type="text" class="form-control" id="book-name" name="book-name" value="<?= $bookDetails['name'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="authorId" class="form-label">Author</label>
                        <select class="form-select" id="authorId"  name="authorId">
                            
                            <!-- always add a default option for select field -->
                            <option selected>Select Author</option>

                            <!-- create a list of authors options for select, the option value should
                            contain authors id since that is the required field on your books table -->
                            <?php foreach($authorsList as $key => $value): ?>
                                <option value="<?= $value['id'] ?>" <?= $value['id'] == $bookDetails['authorId'] ? 'selected' : '' ?>><?= $value['name'] ?></option>
                            <?php endforeach;?>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="text" class="form-control" id="quantity" name="quantity" value="<?= $bookDetails['quantity'] ?>">
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
                <!-- end book form -->
                
            </div>
        </div>
    </div>
</section>
<!-- end of book list section -->

<?php
    include_once './layout/footer.php';
?>
