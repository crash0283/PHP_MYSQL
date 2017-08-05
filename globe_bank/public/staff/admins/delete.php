<?php
require_once('../../../private/init.php');

$id = $_GET['id'];

if (!isset($id)) {
    redirect_to(wwwRoot('/staff/admins/index.php'));
}

if(is_post_request()) {
    delete_admin($id);
    $message = 'Admin Deleted Successfully!';
    $_SESSION['message'] = $message;

    redirect_to(wwwRoot('/staff/admins/index.php'));

} else {
    $admin = find_admin_by_id($id);
}

$page_title = 'Delete Admin';
include(SHARED_PATH . '/staff_header.php');

?>

<div id="content">
    <a class="back-link" href="<?php echo wwwRoot('/staff/admins/index.php');  ?>">&laquo; Back to List</a>
    <div class="admin delete">
        <h1>Delete Admin</h1>
        <p>Are you sure you want to delete this admin?</p>
        <h3 class="item"><?php echo h($admin['username']);  ?></h3>

        <form action="<?php echo wwwRoot('/staff/admins/delete.php?id=' . h(u($admin['id'])));  ?>" method="post">
            <div id="operations">
                <input type="submit" name="commit" value="Delete Admin">
            </div>
        </form>
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php');  ?>
