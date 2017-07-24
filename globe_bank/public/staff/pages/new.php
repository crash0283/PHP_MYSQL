<?php
    require_once('../../../private/init.php');
?>

<?php
    $page_title = 'Create Page';
    include(SHARED_PATH . '/staff_header.php');

    //Initialize variables to empty string
    $menu_name = '';
    $position = '';
    $visible = '';

    //Single Page Form Processing
    if (is_post_request()) {
        $menu_name = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
        $position = isset($_POST['position']) ? $_POST['position'] : '';
        $visible = isset($_POST['visible']) ? $_POST['visible'] : '';

        echo 'Menu Name: '. $menu_name . '<br>';
        echo 'Position: ' . $position . '<br>';
        echo 'Visible: ' . $visible . '<br>';
    }
?>

<div id="content">
    <a class="back_link" href="<?php echo wwwRoot('/staff/pages/index.php');  ?>">&laquo; Back to menu</a>
    <div class="page new">
        <h1>Create Page</h1>
        <form action="<?php echo wwwRoot('/staff/pages/new.php');  ?>" method="post">
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
                <dd><input type="hidden" name="visible" value="0"></dd>
                <dd><input type="checkbox" name="visible" value="1"></dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Create Subject">
            </div>
        </form>
    </div>
</div>

<?php require_once(SHARED_PATH . '/staff_footer.php');  ?>