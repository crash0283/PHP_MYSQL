<?php
require_once('../../../private/init.php');

$id = isset($_GET['id']) ? $_GET['id'] : 1;

switch ($id) {
    case 1:
        $page_title = 'Home';
        break;
    case 2:
        $page_title = 'Online Banking';
        break;
    case 3:
        $page_title = 'About Us';
        break;
    case 4:
        $page_title = 'Contact';
        break;
    default:
        $page_title = 'Title Not Found';
}

include(PRIVATE_PATH . '/shared/staff_header.php');

?>


<a href="<?php echo wwwRoot('/staff/pages/index.php');  ?>">&laquo; Back to List</a>

<div class="content">
    <div>
        <h3>ID: <?php echo h($id);  ?></h3>
    </div>
</div>




<?php include(PRIVATE_PATH . '/shared/staff_footer.php');  ?>



