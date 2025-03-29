<?php
//初期設定読み込み
require_once('../app.php');

// ユーザセッションの取得
// TODO: Tweet投稿一覧を取得
$tweets = [];
?>

<!DOCTYPE html>
<html lang="ja">

<!-- コンポーネント -->
<?php include '../components/head.php' ?>

<body>

    <div class="flex">

        <header class="w-1/5 p-3 border-r min-h-screen">

            <?php include '../components/nav.php' ?>

        </header>

        <main class="w-4/5 pt-3">
            <div class="row">
                <?php include '../components/tweet_form.php' ?>
            </div>

            <!-- TODO: Tweetリスト -->
            <? if ($tweets) : ?>
                <div class="row">
                    <!-- TODO: Tweetの繰り返し表示 -->
                </div>
            <? endif ?>
        </main>
    </div>

</body>

</html>