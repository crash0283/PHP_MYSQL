<?php
    $pages = [
        ['id' => '1', 'position' => '1', 'visible' => '1', 'page-name' => 'Home'],
        ['id' => '2', 'position' => '2', 'visible' => '1', 'page-name' => 'Online Banking'],
        ['id' => '3', 'position' => '3', 'visible' => '1', 'page-name' => 'About Us'],
        ['id' => '4', 'position' => '4', 'visible' => '1', 'page-name' => 'Contact'],
    ];
?>

<?php require_once('../../../private/init.php') ?>
<?php
    //Can set variables and import them as well to use in other files
    $page_title = 'Pages';
?>
<?php
//Bring in shared header data
require(SHARED_PATH . '/staff_header.php');
?>
    <div id="content">
        <div class="pages listing">
            <h1>Pages</h1>
            <div class="actions">
                <a class="action" href="">Create New Pages</a>
            </div>
        </div>

        <table class="list">
            <tr>
                <th>ID</th>
                <th>Position</th>
                <th>Visible</th>
                <th>Page</th>
            </tr>
            <?php
                foreach ($pages as $page) {?>
                    <tr>
                        <td><?php echo h($page['id']); ?></td>
                        <td><?php echo h($page['position']); ?></td>
                        <td><?php echo $page['visible'] == 1 ? true : false; ?></td>
                        <td><?php echo h($page['page-name']); ?></td>
                        <td><a class="action" href="<?php echo wwwRoot('/staff/pages/show.php?id=' . h(u($page['id'])));  ?>">View</a></td>
                        <td><a class="action" href="">Edit</a></td>
                        <td><a class="action" href="">Delete</a></td>
                    </tr>
                <?php } ?>

        </table>
    </div>
<?php
//Bring in shared footer data
require(SHARED_PATH . '/staff_footer.php');
?>