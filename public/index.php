<?php
include('../model/autoload.php');

include('../model/Class/Admin.php');
include('../model/DAO/AdminDAO.php');
include('../controller/AdminController.php');

include('../model/Class/User.php');
include('../model/DAO/UserDAO.php');
include('../controller/UserController.php');

include('../model/Class/Activity.php');
include('../model/DAO/ActivityDAO.php');
include('../controller/ActivityController.php');

include('../model/Class/Picture.php');
include('../model/DAO/PictureDAO.php');
include('../controller/PictureController.php');

include('../model/Class/Role.php');
require('../model/DAO/RoleDAO.php');
require('../controller/RoleController.php');

include('../model/Class/Statut.php');
require('../model/DAO/StatutDAO.php');
require('../controller/StatutController.php');

include('../model/Class/Type.php');
require('../model/DAO/TypeDAO.php');
require('../controller/TypeController.php');

include('../model/Class/Tag.php');
require('../model/DAO/TagDAO.php');
require('../controller/TagController.php');

include("include/header.php"); ?>

        <!-- Intro -->
        <section id="accroche">
            <p>stages, anniv</p>
            <h1>Osez la grande aventure</h1>
            <div class="button" href="#"><span>C'est par ici</span></div>
        </section>

        <!--Section stages-->
        <section id="sectionstage">
            <?php gethome(); ?>
        </section>
</body>

<?php include("include/footer.php"); ?>

<script src="video.js"></script>
</html>