<?php
    require_once('../../../private/init.php');
    require_login();
?>

<?php

    //Get ID
    $id = $_GET['id'];

    if (!isset($_GET['id'])) {
        redirect_to(wwwRoot('/staff/pages/index.php'));
    }


    if (is_post_request()) {
        $page['subject_id'] = isset($_POST['subject_id']) ? $_POST['subject_id'] : '';
        $page['menu_name'] = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
        $page['position'] = isset($_POST['position']) ? $_POST['position'] : '';
        $page['visible'] = isset($_POST['visible']) ? $_POST['visible'] : '';
        $page['id'] = $id;
        $page['content'] = isset($_POST['content']) ? $_POST['content'] : '';

        $result = update_page($page);

        if ($result === true) {
            $message = 'Page Updated Successfully!';
            $_SESSION['message'] = $message;

            redirect_to(wwwRoot('/staff/pages/show.php?id=' . $id));
        } else {
            $errors = $result;
        }


    } else {
        $page = find_pages_by_id($id,$db);
    }

    $page_set = find_all_pages($db);
    $page_count = mysqli_num_rows($page_set);
    mysqli_free_result($page_set);

    $page_title = 'Edit Page';
    include(SHARED_PATH . '/staff_header.php');

?>

<div id="content">
    <a class="back_link" href="<?php echo wwwRoot('/staff/pages/index.php');  ?>">&laquo; Back to menu</a>
    <div class="page new">
        <h1>Edit Page</h1>
        <?php echo display_errors($errors); ?>
        <form action="<?php echo wwwRoot('/staff/pages/edit.php?id=' . $id);  ?>" method="post">
            <dl>
                <dt>Subject</dt>
                <dd>
                    <select name="subject_id" id="">
                        <?php
                            $subject_set = find_all_subjects($db);
                            while ($subject = mysqli_fetch_assoc($subject_set)) {
                                echo "<option value=\"" . h($subject['id']) ."\"";
                                if ($page['subject_id'] == $subject['id']) {
                                    echo "selected";
                                }
                                echo ">" . h($subject['menu_name']) . "</option>";

                            }
                        mysqli_free_result($subject_set);
                        ?>
                    </select>
                </dd>
            </dl>
            <dl>
                <dt>Menu Name</dt>
                <dd><input type="text" name="menu_name" value="<?php echo $page['menu_name']; ?>"></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd>
                    <select name="position" id="">
                        <?php
                            for ($i=1; $i<=$page_count; $i++) {
                                echo "<option value='{$i}'";
                                if ($page['position'] == $i) {
                                    echo "selected";
                                }
                                echo ">{$i}</option>";
                            }
                        ?>
                    </select>
                </dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd><input type="hidden" name="visible" value="0"></dd>
                <dd><input type="checkbox" name="visible" value="1"<?php if($page['visible'] == '1') echo 'checked';  ?>></dd>
            </dl>
            <dl>
                <dt>Content</dt>
                <dd><textarea name="content" id="" cols="80" rows="10"><?php echo $page['content'];  ?></textarea></dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Edit Subject">
            </div>
        </form>
    </div>
</div>

<?php require_once(SHARED_PATH . '/staff_footer.php');  ?>

