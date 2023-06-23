<?php
    // import your header file
    include_once './layout/header.php';

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "booklist";

    // create a Mysql instance for your mysql connection and queries
    $mysqlInstance = new Mysql($servername, $username, $password, $database);

    // execute get all books for table list
    $bookList = $mysqlInstance->getAllBooks();

    // execute get all authors for select options
    $authorsList = $mysqlInstance->getAllAuthors();

    // $deleteAuthor = 

?>

<!-- books list section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Author List</h1>
            </div>
            <div class="col text-end">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Author
                </button>
            </div>
            
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col">ID</th>
                            <th class="col" scope="col">Author Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($authorsList as $key => $value): ?>
                            <tr>
                                <td><?= $value['id']?></td>
                                <td><?= $value['name']?></td>
                                <td class="d-flex justify-content-end">
                                    <a href="/edit-author.php?id=<?= $value['id'] ?>" class="btn btn-warning me-2">
                                        Edit
                                    </a>
                                    <form action="functions/request.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                        <input type="hidden" name="action" value="delete-author">
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
<!-- end of book list section -->

<div class="modal fade" id="exampleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModal">
                    Add Author
                </h1>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="functions/request.php" method="POST">
                    <input type="hidden" name="action" value="create-author">
                    <div class="mb-5">
                        <label for="author-name" class="col-form-label">Author Name</label>
                        <input type="text" id="author-name" name="author-name" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button> 
                    </div>
                    <!-- <div class="class mb-5">
                        <label for="sampleLabel" class="col-form-label">Sample Label</label>
                        <input type="text" id="sampleLabel" name="sampleLabel" class="form-control">
                    </div>
                    <div class="class mb-5">
                        <label for="sampleDropdown" class="col-form-label">Sample Dropdown</label>
                        <select id="sampleDropdown" name="sampleDropdown" class="form-control">
                            <option value="dropdown1">Dropdown1</option>
                            <option value="dropdown2">Dropdown2</option>
                        </select>
                    </div>
                    <div class="class mb-5">
                        <label for="sampleTextArea" class="col-form-label">Sample Label</label>
                        <textarea id="sampleTextArea" name="sampleTextArea" rows="4" cols = "50" class="form-control">
                        </textarea>
                    </div>
                    <div class="class mb-5">
                        <label for="sampleOptGroup" class="col-form-label">Sample Opt Group</label>
                        <select name="sampleOptGroup" id="sampleOptGroup" class="form-control">
                            <optgroup label="Group 1">
                                <option value="Group 1a">Group 1a</option>
                                <option value="Group 1b">Group 1b</option>
                            </optgroup>
                            <optgroup label="Group 2">
                                <option value="Group 2a">Group 2a</option>
                                <option value="Group 2b">Group 2b</option>
                            </optgroup> 
                        </select>
                    </div> -->
                </form>
                
            </div>
                            
        </div>
    </div>                            
</div>


<?php
    include_once './layout/footer.php';
?>