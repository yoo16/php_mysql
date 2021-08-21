<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item">
            <a href="?page=1" class="page-link"><span aria-hidden="true">&laquo;</span></a>
        </li>
        <?php foreach ($pages as $page) : ?>
            <li class="page-item <?= ($current_page == $page) ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $page ?>">
                    <?= $page ?>
                </a>
            </li>
        <?php endforeach ?>
        <li class="page-item">
            <a href="?page=<?= $total_page ?>" class="page-link">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>