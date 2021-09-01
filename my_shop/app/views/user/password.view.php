<div class="container">
    <div class="container">
        <h2 class="h2">パスワード</h2>
        <form action="update_password.php" method="post">
            <div class="form-floating">
                <input type="email" class="form-control" name="new_password">
                <label for="">新しいパスワード</label>
                <p class="text-danger"><?= @$errors['new_password'] ?></p>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" name="new_password_2">
                <label for="">新しいパスワード（確認用）</label>
                <p class="text-danger"><?= @$errors['new_password_2'] ?></p>
            </div>

            <button class="btn btn-primary">更新</button>
        </form>
    </div>
</div>