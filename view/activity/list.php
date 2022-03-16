<?php if (!empty($activities)): ?>
    <ul>
    <?php foreach($activities as $activity): ?>
        <li>
            <?= $activity->_ID;?>
            <?= $activity->_Name;?>
            <?= $activity->_Description;?>
            <?= $activity->_Statut;?>
            <?= $activity->_Content;?>
            <?= $activity->_Type;?>
            <?= $activity->_Date;?>
            <?= $activity->_Price;?>   
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>
