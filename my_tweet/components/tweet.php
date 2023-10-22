<div class="row">
    <div class="tweet d-flex">

        <div class="profile-image">
            <img src="./images/user_icon/<?= User::userIcon($value['user_id']) ?>">
        </div>

        <div class="tweet-body">

            <div class="tweet-user">
                <span class="fw-bold"><?= $value['user_name']  ?></span>
                <span class="ms-1 text-secondary"><?= $value['created_at']  ?></span>
            </div>

            <div class="tweet-text mt-2 mb-2">
                <?= $value['message']  ?>
            </div>

            <nav class="tweet-nav mt-3 mb-3">
                <ul class="d-flex">
                    <li>
                        <a href="#"><img src="svg/bubble.svg"></a>
                    </li>
                    <li>
                        <a href="#"><img src="svg/heart.svg"></a>
                    </li>
                    <li>
                        <a href="#"><img src="svg/loop.svg"></a>
                    </li>
                    <li>
                        <a href="#"><img src="svg/trash.svg"></a>
                    </li>
                </ul>
            </nav>

        </div>

    </div>
</div>