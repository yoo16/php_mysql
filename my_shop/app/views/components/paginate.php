<?php if (!empty($pages)): ?>
<span class="p-1"><a href="?page=1">&lt;&lt;</a></span>
<?php foreach ($pages as $page) : ?>
    <span class="p-1">
        <?php if ($current_page == $page) : ?>
            <?= $page ?>
        <?php else : ?>
            <a href="?page=<?= $page ?>"><?= $page ?></a>
        <?php endif ?>
    </span>
<?php endforeach ?>
<span class="p-1"><a href="?page=<?= $total_page ?>">&gt;&gt;</a></span>
<?php endif ?>