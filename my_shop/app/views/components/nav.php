<header class="navbar navbar-expand bg-light">
    <nav class="container-fluid flex-wrap">
        <div class="navbar-collapse">
            <ul class="navbar-nav flex-row flex-wrap">
                <li class="nav-item col-md-auto">
                    <a class="nav-link text-dark" href="my_page.php">ホーム</a>
                </li>
                <li class="nav-item col-md-auto">
                    <a class="nav-link text-dark" href="edit.php">ユーザ情報</a>
                </li>
                <li class="nav-item col-md-auto">
                    <a class="nav-link text-dark" href="user_item.php">購入履歴</a>
                </li>
            </ul>
            <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
                <li class="nav-item col-md-auto">
                    <a class="nav-link text-dark" href="user_item.php"><?= $user['name'] ?></a>
                </li>
                <li class="nav-item col-md-auto">
                    <a class="btn btn-primary" href="logout.php">Sign Out</a>
                </li>
            </ul>
        </div>
    </nav>
</header>