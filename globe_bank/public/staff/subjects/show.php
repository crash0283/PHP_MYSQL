<?php
require_once('../../../private/init.php');
require_login();

//Get ID
$id = isset($_GET['id']) ? $_GET['id'] : 1;
//$id = $_GET['id'] ?? 1;  PHP 7

//Use function to return subject array
$subject = find_subject_by_id($id,$db);

?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>
<div id="content">
    <a href="<?php echo wwwRoot('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>
    <div class="subjects show">
            <h1>Subject: <?php echo h($subject['menu_name']);  ?></h1>

            <div class="attributes">
                <dl>
                    <dt>Menu Name</dt>
                    <dd><?php echo h($subject['menu_name']); ?></dd>
                </dl>
                <dl>
                    <dt>Position</dt>
                    <dd><?php echo h($subject['position']); ?></dd>
                </dl>
                <dl>
                    <dt>Visible</dt>
                    <dd><?php echo h($subject['visible']); ?></dd>
                </dl>
            </div>
        </div>
</div>




<?php include(PRIVATE_PATH . '/shared/staff_footer.php');  ?>

<!--<a href="show.php?name=--><?php //echo urlencode('John Doe');  ?><!--">Link</a><br>-->
<!--<a href="show.php?company=--><?php //echo urlencode('Widgets&More');  ?><!--">Link</a><br>-->
<!--<a href="show.php?query=--><?php //echo urlencode('!#*?');  ?><!--">Link</a><br>-->
