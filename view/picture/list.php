<?php if (!empty($pictures)): ?>
    <ul>
    <?php foreach($pictures as $picture): ?>
        <li>
            <?= $picture->_id;?>
            <?= $picture->_name;?>
            <?= $picture->_description;?>
            <?= $picture->_statut;?>
            <?= $picture->_tags;?>
            <?= $picture->_link;?>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>
