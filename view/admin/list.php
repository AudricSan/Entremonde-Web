<?php if (!empty($admins)): ?>
    <ul>
    <?php foreach($admins as $admin): ?>
        <li>
            <?= $admin->_login; ?>
            <?= $admin->_name; ?>
            <?= $admin->_fname; ?>
            <?= $admin->_mail; ?>
            <?= $admin->_pass; ?>
            <?= $admin->_role; ?>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>
