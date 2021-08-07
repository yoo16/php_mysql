<!DOCTYPE html>
<html lang="ja">

<?php include('app/views/components/head.php') ?>

<body>
    <main id="login" class="d-flex justify-content-center">
        <div class="w-50 mt-3 p-5 bg-light">
            <form action="" method="post">
                <h3 class="h3 mb-3 fw-normal">管理者ログイン</h3>
                <div class="form-floating">
                    <input type="text" name="login_name" class="form-control" id="input">
                    <label for="input">ユーザ名</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password">
                    <label for="password">パスワード</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary">ログイン</button>
            </form>
            <p class="text-danger mt-2"><?= @$error_message ?></p>
        </div>
    </main>
</body>

</html>