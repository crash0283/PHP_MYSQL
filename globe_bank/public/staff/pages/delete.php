<?php
    require_once('../../../private/init.php');

    $id = $_GET['id'];

    if (!isset($id)) {
        redirect_to(wwwRoot('/staff/pages/index.php'));
    }

    if(is_post_request()) {
        delete_page($id);
        redirect_to(wwwRoot('/staff/pages/index.php'));

    } else {
        $page = find_pages_by_id($id,$db);
    }

    $page_title = 'Delete Page';
    include(SHARED_PATH . '/staff_header.php');

?>

<div id="content">
    <a class="back-link" href="<?php echo wwwRoot('/staff/pages/index.php');  ?>">&laquo; Back to List</a>
    <div class="page delete">
        <h1>Delete Page</h1>
        <p>Are you sure you want to delete this page?</p>
        <h3 class="item"><?php echo h($page['menu_name']);  ?></h3>

        <form action="<?php echo wwwRoot('/staff/pages/delete.php?id=' . h(u($page['id'])));  ?>" method="post">
            <div id="operations">
                <input type="submit" name="commit" value="Delete Page">
            </div>
        </form>
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php');  ?>
