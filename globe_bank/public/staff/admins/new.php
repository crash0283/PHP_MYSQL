<?php
require_once ('../../../private/init.php');
require_login();
?>

<?php

    if (is_post_request()) {

        $admin = [];
        $admin['first_name'] = isset($_POST['first_name']) ? $_POST['first_name'] : '';
        $admin['last_name'] = isset($_POST['last_name']) ? $_POST['last_name'] : '';
        $admin['email'] = isset($_POST['email']) ? $_POST['email'] : '';
        $admin['username'] = isset($_POST['username']) ? $_POST['username'] : '';
        $admin['password'] = isset($_POST['password']) ? $_POST['password'] : '';
        $admin['confirm_password'] = $_POST['confirm_password'] ?? '';


        $result = insert_admin($admin);

        if ($result === true) {
            $new_id = mysqli_insert_id($db);

            $message = 'Admin Created Successfully!';
            $_SESSION['message'] = $message;

            redirect_to(wwwRoot('/staff/admins/show.php?id=' . $new_id));
        } else {
            $errors = $result;
        }


    } else {
        $admin = [];
        $admin['first_name'] = '';
        $admin['last_name'] = '';
        $admin['email'] = '';
        $admin['username'] = '';
        $admin['password'] = '';
        $admin['confirm_password'] = '';
    }

    $page_title = 'Create Admin';
    include(SHARED_PATH . '/staff_header.php');

?>

    <div id="content">
        <a class="back_link" href="<?php echo wwwRoot('/staff/admins/index.php');  ?>">&laquo; Back to menu</a>
        <div class="admin new">
            <h1>Create Admin</h1>
            <?php echo display_errors($errors);  ?>
            <form action="<?php echo wwwRoot('/staff/admins/new.php');  ?>" method="post">
                <dl>
                    <dt>First Name</dt>
                    <dd><input type="text" name="first_name" value="<?php echo h($admin['first_name']);  ?>"></dd>
                </dl>
                <dl>
                    <dt>Last Name</dt>
                    <dd><input type="text" name="last_name" value="<?php echo h($admin['last_name']);  ?>"></dd>
                </dl>
                <dl>
                    <dt>Email</dt>
                    <dd><input type="email" name="email" value="<?php echo h($admin['email']);  ?>"></dd>
                </dl>
                <dl>
                    <dt>Username</dt>
                    <dd><input type="text" name="username" value="<?php echo h($admin['username']);  ?>"></dd>
                </dl>
                <dl>
                    <dt>Password</dt>
                    <dd><input type="password" name="password" value="<?php echo h($admin['password']);  ?>"></dd>
                </dl>
                <dl>
                    <dt>Confirm Password</dt>
                    <dd><input type="password" name="confirm_password" value="" /></dd>
                </dl>
                <p>
                    Passwords should be at least 12 characters and include at least one uppercase letter, lowercase letter, number, and symbol.
                </p>
                <br />
                <div id="operations">
                    <input type="submit" value="Create Admin">
                </div>
            </form>
        </div>
    </div>

<?php require_once(SHARED_PATH . '/staff_footer.php');  ?>