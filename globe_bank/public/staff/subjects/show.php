<?php
require_once('../../../private/init.php');

//Get ID
$id = isset($_GET['id']) ? $_GET['id'] : 1;
//$id = $_GET['id'] ?? 1;  PHP 7

//Use function to return subject array
$subject = find_subject_by_id($id,$db);

//switch ($id) {
//    case 1:
//        $page_title = 'About Globe Bank';
//        break;
//    case 2:
//        $page_title = 'Consumer';
//        break;
//    case 3:
//        $page_title = 'Small Business';
//        break;
//    case 4:
//        $page_title = 'Commercial';
//        break;
//    default:
//        $page_title = 'Title Not Found';
//}

include(PRIVATE_PATH . '/shared/staff_header.php');

?>

<a href="<?php echo wwwRoot('/staff/subjects/index.php');  ?>">&laquo; Back to List</a>

<div class="content">
    <div>
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
</div>




<?php include(PRIVATE_PATH . '/shared/staff_footer.php');  ?>

<!--<a href="show.php?name=--><?php //echo urlencode('John Doe');  ?><!--">Link</a><br>-->
<!--<a href="show.php?company=--><?php //echo urlencode('Widgets&More');  ?><!--">Link</a><br>-->
<!--<a href="show.php?query=--><?php //echo urlencode('!#*?');  ?><!--">Link</a><br>-->
