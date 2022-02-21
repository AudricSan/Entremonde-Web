<?php if (!empty($users)): ?>
    <ul>
    <?php foreach($users as $user): ?>
        <li>
            <?= $user->_name;?>
            <?= $user->_firstname;?>
            <?= $user->_login;?>
            <?= $user->_password;?>
            <?= $user->_email;?>
            <?= $user->_bank;?>
            <?= $user->_activity;?>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>
