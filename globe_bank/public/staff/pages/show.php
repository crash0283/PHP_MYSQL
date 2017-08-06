<?php
require_once('../../../private/init.php');
require_login();

$id = isset($_GET['id']) ? $_GET['id'] : 1;

$page = find_pages_by_id($id,$db);

?>

<?php include(SHARED_PATH . '/staff_header.php');  ?>

<div id="content">
    <a href="<?php echo wwwRoot('/staff/pages/index.php');  ?>">&laquo; Back to List</a>
    <div class="page show">
        <h1>Page: <?php echo h($page['menu_name']);  ?></h1>
<!--        Add div and url parm preview-->
        <div class="actions">
            <a class="action" href="<?php echo wwwRoot("/index.php?id=" . $id . "&preview=true");  ?>" target="_blank">Preview</a>
        </div>
        <?php $subject = find_subject_by_id($page['subject_id'],$db);  ?>
        <div class="attributes">
            <dl>
                <dt>Subject</dt>
                <dd><?php echo h($subject['menu_name']);  ?></dd>
            </dl>
            <dl>
                <dt>Menu Name</dt>
                <dd><?php echo h($page['menu_name']);  ?></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd><?php echo h($page['position']);  ?></dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd><?php echo h($page['visible']);  ?></dd>
            </dl>
            <dl>
                <dt>Content</dt>
                <dd><?php echo h($page['content']);  ?></dd>
            </dl>
        </div>
    </div>
</div>




<?php include(PRIVATE_PATH . '/shared/staff_footer.php');  ?>



