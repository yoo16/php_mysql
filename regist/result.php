<?php
session_start();
if (isset($_SESSION['posts'])) {
    unset($_SESSION['posts']);
} else {
    header('Location: input.php');
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
    <!-- Bootstrap のインストール（CDN） -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="h2">会員登録</h2>
        <div>登録が完了しました。</div>
    </div>
</body>

</html>