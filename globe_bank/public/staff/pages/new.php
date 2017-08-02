<?php
    require_once('../../../private/init.php');
?>

<?php
    $page_title = 'Create Page';
    include(SHARED_PATH . '/staff_header.php');

    $page_set = find_all_pages($db);
    $page_count = mysqli_num_rows($page_set) + 1;
    mysqli_free_result($page_set);

    $page = [];
    $page['position'] = $page_count;

    //Single Page Form Processing
    if (is_post_request()) {
        $page = [];
        $page['menu_name'] = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
        $page['position'] = isset($_POST['position']) ? $_POST['position'] : '';
        $page['visible'] = isset($_POST['visible']) ? $_POST['visible'] : '';
        $page['content'] = isset($_POST['content']) ? $_POST['content'] : '';

        $result = insert_page($page);

        if ($result === true) {
            $new_id = mysqli_insert_id($db);
            redirect_to(wwwRoot('/staff/pages/show.php?id=' . $new_id));
        } else {
            $errors = $result;
        }

    }
?>

<div id="content">
    <a class="back_link" href="<?php echo wwwRoot('/staff/pages/index.php');  ?>">&laquo; Back to menu</a>
    <div class="page new">
        <h1>Create Page</h1>
        <?php echo display_errors($errors);  ?>
        <form action="<?php echo wwwRoot('/staff/pages/new.php');  ?>" method="post">
            <dl>
                <dt>Menu Name</dt>
                <dd><input type="text" name="menu_name" value=""></dd>
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
                <dd><input type="checkbox" name="visible" value="1"></dd>
            </dl>
            <dl>
                <dt>Content</dt>
                <dd><textarea name="content" id="" cols="80" rows="10"></textarea></dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Create Subject">
            </div>
        </form>
    </div>
</div>

<?php require_once(SHARED_PATH . '/staff_footer.php');  ?>
