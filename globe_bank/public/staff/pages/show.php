<?php
require_once('../../../private/init.php');

$id = isset($_GET['id']) ? $_GET['id'] : 1;

$page = find_pages_by_id($id,$db);


//switch ($id) {
//    case 1:
//        $page_title = 'Home';
//        break;
//    case 2:
//        $page_title = 'Online Banking';
//        break;
//    case 3:
//        $page_title = 'About Us';
//        break;
//    case 4:
//        $page_title = 'Contact';
//        break;
//    default:
//        $page_title = 'Title Not Found';
//}

include(PRIVATE_PATH . '/shared/staff_header.php');

?>


<a href="<?php echo wwwRoot('/staff/pages/index.php');  ?>">&laquo; Back to List</a>

<div class="content">
    <div class="pages show">
        <h1>Subject: <?php echo h($page['menu_name']);  ?></h1>

        <div class="attributes">
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



