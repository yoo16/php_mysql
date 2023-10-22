<?php
session_start();

//セッションデータ取得
if (!empty($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
if (!empty($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/default.css">
</head>

<body>
    <main id="login" class="d-flex justify-content-center">
        <div class="w-50 mt-3 p-5 bg-light">
            <form action="" method="post">
                <h3 class="h3 mb-3 fw-normal">Sign In</h3>
                <div class="form-floating">
                    <input type="text" name="email" class="form-control" id="input">
                    <label for="input">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password">
                    <label for="password">パスワード</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary">Sign In</button>
            </form>
        </div>
    </main>
</body>

</html>