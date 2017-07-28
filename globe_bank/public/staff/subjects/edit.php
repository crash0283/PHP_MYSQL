<?php require_once('../../../private/init.php');  ?>


<?php

//Set ID
$id = $_GET['id'];


//$test = isset($_GET['test']) ? $_GET['test'] : '';


if(!isset($_GET['id'])) {
    redirect_to(wwwRoot('/staff/subjects/index.php'));

}

////Initialize variables to empty string
//$menu_name = '';
//$position = '';
//$visible = '';

//This allows for Single-Page Form Processing, otherwise we would have to process the form information on a new page
if (is_post_request()) {

    $subject = [];
    $subject['menu_name'] = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
    $subject['visible'] = isset($_POST['visible']) ? $_POST['visible'] : '';
    $subject['position'] = isset($_POST['position']) ? $_POST['position'] : '';
    $subject['id'] = $id;


    //update record
    $result = update_subject($subject);
    if ($result === true) {
        redirect_to(wwwRoot('/staff/subjects/index.php'));
    } else {
        $errors = $result;

        //Used to debug
        //var_dump($errors);
    }

} else {
    $subject = find_subject_by_id($id,$db);  //returns an array
}

//Find how many rows are in our database
$subject_set = find_all_subjects($db);
$subject_count = mysqli_num_rows($subject_set);
mysqli_free_result($subject_set);

?>

<?php $page_title = 'Edit Subject';  ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">
        <a class="back_link" href="<?php echo wwwRoot('/staff/subjects/index.php');  ?>">&laquo; Back to list</a>

        <div class="subject edit">
            <h1>Edit Subject</h1>
            <?php echo display_errors($errors);  //adding function to display all errors ?>
            <form action="<?php echo wwwRoot('/staff/subjects/edit.php?id=' . h(u($id)));  ?>" method="post">
                <dl>
                    <dt>Menu Name</dt>
                    <dd><input type="text" name="menu_name" value="<?php echo h($subject['menu_name']); ?>"></dd>
                </dl>
                <dl>
                    <dt>Position</dt>
                    <dd>
                        <select name="position" id="">
                            <?php
                                for ($i=1; $i<=$subject_count; $i++ ) {
                                    echo "<option value='{$i}'";
                                    if ($subject['position'] == $i) {
                                        echo 'selected';
                                    }
                                    echo ">{$i}</option>";
                                }

                            ?>
                        </select>
                    </dd>
                </dl>
                <dl>
                    <dt>Visible</dt>
                    <dd>
                        <input type="hidden" name="visible" value="0">  <!-- set type to hidden and value to 0 -->
                        <input type="checkbox" name="visible" value="1"<?php if($subject['visible'] == '1') echo 'checked';  ?>> <!-- set checkbox and if checked will return value to 1 and will ignore the one input above this one -->
                    </dd>
                </dl>
                <div id="operations">
                    <input type="submit" value="Edit Subject">
                </div>
            </form>
        </div>
    </div>

<?php require_once(SHARED_PATH . '/staff_footer.php');  ?>