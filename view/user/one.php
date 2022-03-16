<?php if (!empty($users)): ?>
    <h2> <?= $user->_login; ?> </h2>
    <h3> <?= $user->_name;?> </h3>
    <h3> <?= $user->_firstname;?> </h3>
    <h3> <?= $user->_password;?> </h3>
    <h3> <?= $user->_email;?> </h3>
    <h3> <?= $user->_bank;?> </h3>
    <h3> <?= $user->_activity;?> </h3>
    <h3> <?= $user->_age;?> </h3>
    <h3> <?= $user->_birthday;?> </h3>
    <h3> <?= $user->_point;?> </h3>
<?php endif; ?>
