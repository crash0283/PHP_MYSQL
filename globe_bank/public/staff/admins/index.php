<?php
require_once ('../../../private/init.php');
?>
<?php require_login(); ?>
<?php
$admin_set = find_all_admins();

$page_title = "Users";
include(SHARED_PATH .'/staff_header.php');

?>

    <div id="content">
        <div class="users listing">
            <h1>Users</h1>
            <div class="actions">
                <a class="action" href="<?php echo wwwRoot('/staff/admins/new.php');  ?>">Create New Admin</a>
            </div>
        </div>

        <table class="list">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Username</th>
            </tr>
            <?php
            while ($admin = mysqli_fetch_assoc($admin_set)) {?>
                <tr>
                    <td><?php echo h($admin['id']); ?></td>
                    <td><?php echo h($admin['first_name']); ?></td>
                    <td><?php echo h($admin['last_name']); ?></td>
                    <td><?php echo h($admin['email']); ?></td>
                    <td><?php echo h($admin['username']);  ?></td>
                    <td><a class="action" href="<?php echo wwwRoot('/staff/admins/show.php?id=' . h(u($admin['id'])));  ?>">View</a></td>
                    <td><a class="action" href="<?php echo wwwRoot('/staff/admins/edit.php?id=' . h(u($admin['id'])));  ?>">Edit</a></td>
                    <td><a class="action" href="<?php echo wwwRoot('/staff/admins/delete.php?id=' . h(u($admin['id']))); ?>">Delete</a></td>
                </tr>
            <?php } ?>

        </table>
        <?php
        mysqli_free_result($admin_set);
        ?>
    </div>



<?php  include(SHARED_PATH . '/staff_footer.php');?>