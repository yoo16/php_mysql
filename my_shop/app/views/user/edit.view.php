<!DOCTYPE html>
<html lang="ja">

<?php include('app/views/components/head.php') ?>

<body>
    <?php include('app/views/components/user_nav.php') ?>

    <div class="container">
        <h2 class="h2 mt-3">ユーザ情報</h2>

        <form action="update.php" method="post">
            <div class="mb-3">
                <label for="">氏名</label>
                <input type="text" class="form-control" 
                    name="name" value="<?= $user->value['name'] ?>">
                <p class="text-danger"><?= @$errors['name'] ?></p>
            </div>

            <div class="mb-3">
                <label for="">メールアドレス</label>
                <input type="text" class="form-control" 
                    name="email" value="<?= $user->value['email'] ?>">
                <p class="text-danger"><?= @$errors['email'] ?></p>
            </div>

            <div class="mb-3">
                <div>
                    <label for="">性別</label>
                </div>
                <div class="form-check form-check-inline">
                    <input id="gender_male" class="form-check-input" type="radio" 
                        name="gender" value="male" <?= Form::checked($user->value['gender'], 'male') ?>>
                    <label for="gender_male" class="form-check-label">男性</label>
                </div>

                <div class="form-check form-check-inline">
                    <input id="gender_female" class="form-check-input" type="radio" 
                        name="gender" value="female" <?= Form::checked($user->value['gender'], 'female') ?>>
                    <label for="gender_female" class="form-check-label">女性</label>
                </div>
            </div>

            <button class="btn btn-primary">更新</button>
            <a class="btn btn-outline-primary" href="index.php">戻る</a>
        </form>
    </div>
</body>

</html>