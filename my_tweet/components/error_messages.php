<?php if (!empty($errors)) : ?>
    <ul class="mt-3">
        <?php foreach ($errors as $error) : ?>
            <li class="text-danger"><?= $error ?></li>
        <?php endforeach ?>
    </ul>
<?php endif ?>