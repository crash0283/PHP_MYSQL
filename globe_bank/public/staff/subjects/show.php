<?php
require_once('../../../private/init.php');

//Get ID
$id = isset($_GET['id']) ? $_GET['id'] : 1;

switch ($id) {
    case 1:
        $page_title = 'About Globe Bank';
        break;
    case 2:
        $page_title = 'Consumer';
        break;
    case 3:
        $page_title = 'Small Business';
        break;
    case 4:
        $page_title = 'Commercial';
        break;
    default:
        $page_title = 'Title Not Found';
}

include(PRIVATE_PATH . '/shared/staff_header.php');
//$id = $_GET['id'] ?? 1;  PHP 7

?>

<a href="<?php echo wwwRoot('/staff/subjects/index.php');  ?>">&laquo; Back to List</a>

<div class="content">
    <div>
        <h3>ID: <?php echo h($id);  ?></h3>
    </div>
</div>




<?php include(PRIVATE_PATH . '/shared/staff_footer.php');  ?>

<!--<a href="show.php?name=--><?php //echo urlencode('John Doe');  ?><!--">Link</a><br>-->
<!--<a href="show.php?company=--><?php //echo urlencode('Widgets&More');  ?><!--">Link</a><br>-->
<!--<a href="show.php?query=--><?php //echo urlencode('!#*?');  ?><!--">Link</a><br>-->
