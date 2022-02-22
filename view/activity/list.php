<?php if (!empty($activities)): ?>
    <ul>
    <?php foreach($activities as $activity): ?>
        <li>
            <?= $activity->_name;?>
            <?= $activity->_firstname;?>
            <?= $activity->_login;?>
            <?= $activity->_password;?>
            <?= $activity->_email;?>
            <?= $activity->_bank;?>
            <?= $activity->_activity;?>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>
