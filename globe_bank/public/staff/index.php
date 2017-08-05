<?php
//Can't use constant variables for paths here because this is where they are defined
require_once('../../private/init.php')
?>
<?php
//Can set variables and import them as well to use in other files
$page_title = 'Staff Menu';
?>
<?php
//Bring in shared header data
require(SHARED_PATH . '/staff_header.php');
?>
    <div id="content">
        <div id="main-menu">
            <h2>Main Menu</h2>
            <ul>
                <li><a href="<?php echo wwwRoot('/staff/subjects/index.php'); ?>">Subjects</a>
                <li><a href="<?php echo wwwRoot('/staff/pages/index.php'); ?>">Pages</a></li>
                <li><a href="<?php echo wwwRoot('/staff/admins/index.php'); ?>">Admins</a></li>
            </ul>
        </div>
    </div>
<?php
//Bring in shared footer data
require(SHARED_PATH . '/staff_footer.php');
?>