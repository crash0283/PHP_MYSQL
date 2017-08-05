<?php
require_once('../../../private/init.php');

$id = isset($_GET['id']) ? $_GET['id'] : 1;

$admin = find_admin_by_id($id);

?>

<?php include(SHARED_PATH . '/staff_header.php');  ?>

    <div id="content">
        <a href="<?php echo wwwRoot('/staff/admins/index.php');  ?>">&laquo; Back to List</a>
        <div class="page show">
            <h1>Admin: <?php echo h($admin['username']);  ?></h1>
            <!--        Add div and url parm preview-->
            <div class="attributes">
                <dl>
                    <dt>First Name</dt>
                    <dd><?php echo h($admin['first_name']);  ?></dd>
                </dl>
                <dl>
                    <dt>Last Name</dt>
                    <dd><?php echo h($admin['last_name']);  ?></dd>
                </dl>
                <dl>
                    <dt>Email</dt>
                    <dd><?php echo h($admin['email']);  ?></dd>
                </dl>
                <dl>
                    <dt>Username</dt>
                    <dd><?php echo h($admin['username']);  ?></dd>
                </dl>
            </div>
        </div>
    </div>




<?php include(PRIVATE_PATH . '/shared/staff_footer.php');  ?>