<?php
    require_once('../../../private/init.php');
?>

<?php
    $page_title = 'Edit Page';
    include(SHARED_PATH . '/staff_header.php');

    //Get ID
    $id = $_GET['id'];

    if (!isset($_GET['id'])) {
        redirect_to(wwwRoot('/staff/pages/index.php'));
    }


    if (is_post_request()) {
        $page['menu_name'] = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
        $page['position'] = isset($_POST['position']) ? $_POST['position'] : '';
        $page['visible'] = isset($_POST['visible']) ? $_POST['visible'] : '';
        $page['id'] = $id;

        update_page($page);


    } else {
        $page = find_pages_by_id($id,$db);

        $page_set = find_all_pages($db);
        $page_count = mysqli_num_rows($page_set);
        mysqli_free_result($page_set);

    }

?>

<div id="content">
    <a class="back_link" href="<?php echo wwwRoot('/staff/pages/index.php');  ?>">&laquo; Back to menu</a>
    <div class="page new">
        <h1>Edit <?php echo $page['menu_name'];  ?></h1>
        <form action="<?php echo wwwRoot('/staff/pages/edit.php?id=' . $id);  ?>" method="post">
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
            <div id="operations">
                <input type="submit" value="Edit Subject">
            </div>
        </form>
    </div>
</div>

<?php require_once(SHARED_PATH . '/staff_footer.php');  ?>

