
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- sending data in form via http request post (create), get (visible, fetch), put (edit), delete (delete) -->
    <form action="http://book-list.test/save.php" method="post">
        <div>
            <label for="name">name</label>
            <!-- type: [text, number, name, password, hidden, color, date] -->
            <input type="name" name="name" id="name">
        </div>
        <div>
            <label for="email">email</label>
            <!-- type: [text, number, email, password, hidden, color, date] -->
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="password">password</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <button type="submit">
                submit
            </button>
            <button type="button">
                cancel
            </button>
        </div>
    </form>
</body>
</html>