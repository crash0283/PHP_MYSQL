<?php
    require_once('../../../private/init.php');
    require_login();

    if (!isset($_GET['id'])) {
        redirect_to(wwwRoot('/staff/subjects/index.php'));
    }

    $id = $_GET['id'];



    if (is_post_request()) {
        //use function
        delete_subject($id);
        $message = 'Subject Deleted Successfully!';
        $_SESSION['message'] = $message;

        redirect_to(wwwRoot('/staff/subjects/index.php'));

    } else {
        $subject = find_subject_by_id($id,$db);
    }

    $page_title = 'Delete Subject';
    include(SHARED_PATH . '/staff_header.php');

?>

<div id="content">
    <a class="back-link" href="<?php echo wwwRoot('/staff/subjects/index.php');  ?>">&laquo; Back to List</a>
    <div class="subject delete">
        <h1>Delete Subjects</h1>
        <p>Are you sure you want to delete this subject?</p>
        <h3 class="item"><?php echo h($subject['menu_name']);  ?></h3>

        <form action="<?php echo wwwRoot('/staff/subjects/delete.php?id=' . h(u($subject['id'])));  ?>" method="post">
            <div id="operations">
                <input type="submit" name="commit" value="Delete Subject">
            </div>
        </form>
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
