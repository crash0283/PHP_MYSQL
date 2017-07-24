<?php require_once('../../../private/init.php');  ?>


<?php

//$test = isset($_GET['test']) ? $_GET['test'] : '';

if(!isset($_GET['id'])) {
    redirect_to(wwwRoot('/staff/subjects/index.php'));

}

//Initialize variables to empty string
$menu_name = '';
$position = '';
$visible = '';

//Set ID
$id = $_GET['id'];

//This allows for Single-Page Form Processing, otherwise we would have to process the form information on a new page
if (is_post_request()) {
    //Handle form values sent by new.php
    $menu_name = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
    $visible = isset($_POST['visible']) ? $_POST['visible'] : '';
    $position = isset($_POST['position']) ? $_POST['position'] : '';

    echo 'Menu Name: ' . $menu_name;
    echo '<br>';
    echo 'Visible: ' . $visible;
    echo '<br>';
    echo 'Position: ' . $position;
}

?>

<?php $page_title = 'Edit Subject';  ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">
        <a class="back_link" href="<?php echo wwwRoot('/staff/subjects/index.php');  ?>">&laquo; Back to list</a>

        <div class="subject edit">
            <h1>Edit Subject</h1>
            <form action="<?php echo wwwRoot('/staff/subjects/edit.php?id=' . h(u($id)));  ?>" method="post">
                <dl>
                    <dt>Menu Name</dt>
                    <dd><input type="text" name="menu_name" value="<?php echo $menu_name; ?>"></dd>
                </dl>
                <dl>
                    <dt>Position</dt>
                    <dd>
                        <select name="position" id="">
                            <option value="1">1</option>
                        </select>
                    </dd>
                </dl>
                <dl>
                    <dt>Visible</dt>
                    <dd>
                        <input type="hidden" name="visible" value="0">  <!-- set type to hidden and value to 0 -->
                        <input type="checkbox" name="visible" value="1"> <!-- set checkbox and if checked will return value to 1 and will ignore the one input above this one -->
                    </dd>
                </dl>
                <div id="operations">
                    <input type="submit" value="Edit Subject">
                </div>
            </form>
        </div>
    </div>

<?php require_once(SHARED_PATH . '/staff_footer.php');  ?>