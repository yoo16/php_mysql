<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="?page=1">&laquo;</a></li>
        <li class="page-item"><a class="page-link" href="?page=<?= $page_prev ?>">Prev</a></li>
        <?php foreach ($pages as $page) : ?>
            <?php if ($current_page == $page) : ?>
                <li class="page-item active"><a class="page-link" href="?page=<?= $page ?>"><?= $page ?></a></li>
            <?php else : ?>
                <li class="page-item"><a class="page-link" href="?page=<?= $page ?>"><?= $page ?></a></li>
            <?php endif ?>
        <?php endforeach ?>
        <li class="page-item"><a class="page-link" href="?page=<?= $page_next ?>">Next</a></li>
        <li class="page-item"><a class="page-link" href="?page=<?= $page_count ?>">&raquo;</a></li>
    </ul>
</nav>