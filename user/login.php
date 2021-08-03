<?php
require_once 'config.php';
require_once 'connect.php';

session_start();

function auth($pdo, $email, $password)
{
    // $sql = "SELECT * FROM users WHERE email = '{$email}'";
    // $user = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam('email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }
}

function check($posts)
{
    foreach ($posts as $column => $post) {
        $posts[$column] = htmlspecialchars($post, ENT_QUOTES, 'UTF-8');
    }
    return $posts;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $posts = check($_POST);
    $user = auth($pdo, $posts['email'], $posts['password']);
    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: my_page.php');
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>サインインページ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style>
        input[type="text"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>

<body>
    <main class="d-flex justify-content-center">
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