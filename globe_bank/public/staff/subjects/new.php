<?php require_once('../../../private/init.php');  ?>


<?php

    //Find how many rows are in our database
    $subject_set = find_all_subjects($db);

    //Need to add 1 since we are creating new row
    $subject_count = mysqli_num_rows($subject_set) + 1;
    mysqli_free_result($subject_set);

    //subject position will default to subject count which should be the new value
    $subject = [];
    $subject['position'] = $subject_count;


//    //Example of error testing
//    $test = isset($_GET['test']) ? $_GET['test'] : '';
//
//    if ($test == '404') {
//        error_404();
//    } elseif ($test == '500') {
//        error_500();
//    } elseif ($test == 'redirect') {
//        redirect_to(wwwRoot('/staff/subjects/index.php'));
//    }

if (is_post_request()) {
    //Handle form values sent by new.php
    $subject = [];
    $subject['menu_name'] = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
    $subject['visible'] = isset($_POST['visible']) ? $_POST['visible'] : '';
    $subject['position'] = isset($_POST['position']) ? $_POST['position'] : '';

    //Use this function to create new subject
    $result = insert_subject($subject);

    if ($result === true) {
        $new_id = mysqli_insert_id($db);

        //Create Session message
        $message = 'Subject Created Successfully!';
        $_SESSION['message'] = $message;

        redirect_to(wwwRoot('/staff/subjects/show.php?id=' . $new_id));
    } else {
        $errors = $result;
    }
}
?>

<?php $page_title = 'Create Subject';  ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back_link" href="<?php echo wwwRoot('/staff/subjects/index.php');  ?>">&laquo; Back to list</a>

    <div class="subject new">
        <h1>Create Subject</h1>
        <?php echo display_errors($errors);  ?>
        <form action="new.php" method="post">
            <dl>
                <dt>Menu Name</dt>
                <dd><input type="text" name="menu_name" value=""></dd>
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
                    <input type="checkbox" name="visible" value="1"> <!-- set checkbox and if checked will return value to 1 and will ignore the one input above this one -->
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Create Subject">
            </div>
        </form>
    </div>
</div>

<?php require_once(SHARED_PATH . '/staff_footer.php');  ?>