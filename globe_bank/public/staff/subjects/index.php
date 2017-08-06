<?php require_once('../../../private/init.php') ?>
<?php require_login(); ?>
<?php

    //Set $subject_set to the function we created in query_functions.php
    $subject_set = find_all_subjects($db);




    //Create placeholder data (will substitute with database data)
//     $subjects = [
//                ['id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'About Globe Bank'],
//                ['id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'Consumer'],
//                ['id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Small Business'],
//                ['id' => '4', 'position' => '4', 'visible' => '1', 'menu_name' => 'Commercial']
//        ];


?>
<?php
//Can set variables and import them as well to use in other files
$page_title = 'Subjects';
?>
<?php
//Bring in shared header data
require(SHARED_PATH . '/staff_header.php');
?>
    <div id="content">
        <div class="subjects listing">
            <h1>Subjects</h1>
            <div class="actions">
                <a class="action" href="<?php echo wwwRoot('/staff/subjects/new.php');  ?>">Create New Subjects</a>
            </div>

            <table class="list">
                <tr>
                    <th>ID</th>
                    <th>Position</th>
                    <th>Visible</th>
                    <th>Name</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <?php
                //using while loop to loop through database, assign row associative array to $subject
                    while ($subject = mysqli_fetch_assoc($subject_set)) { ?>
                        <tr>
                            <td><?php echo h($subject['id']); ?></td>
                            <td><?php echo h($subject['position']); ?></td>
                            <td><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></td>
                            <td><?php echo h($subject['menu_name']); ?></td>
                            <td><a class="action" href="<?php echo wwwRoot('/staff/subjects/show.php?id=' . h(u($subject['id']))); ?>">View</a></td>
                            <td><a class="action" href="<?php echo wwwRoot('/staff/subjects/edit.php?id=' . h(u($subject['id'])));  ?>">Edit</a></td>
                            <td><a class="action" href="<?php echo wwwRoot('/staff/subjects/delete.php?id=' . h(u($subject['id'])));  ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
            </table>
            <?php
                //Free database data
                mysqli_free_result($subject_set);
            ?>
        </div>
    </div>
<?php
//Bring in shared footer data
require(SHARED_PATH . '/staff_footer.php');
?>