<?php
require_once('app.php');

$auth_user = User::authUser();
if (!$auth_user) {
    header('Location: login/');
    exit;
}

$tweet = new Tweet();
$tweet->get();
?>

<!DOCTYPE html>
<html lang="ja">

<?php include('components/head.php') ?>

<body>
    <div class="container-fluid">

        <div class="row">
            <header class="col-md-3">
                <?php include('components/nav.php') ?>
            </header>

            <main class="col-md-9">
                <h2 class="mt-3">ホーム</h2>

                <div class="row">
                    <form action="./tweet/add.php" method="post">
                        <textarea name="message" class="form-control" placeholder="いまどうしてる？"></textarea>
                        <div class="mt-3 mb-3 text-center">
                            <button class="btn btn-primary rounded-pill w-25">つぶやく</button>
                        </div>
                    </form>
                </div>

                <?php foreach($tweet->values as $value): ?>
                <?php include('components/tweet.php') ?>
                <?php endforeach ?>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="js/default.js"></script>
</body>

</html>