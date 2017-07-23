<?php require_once('../../../private/init.php');  ?>


<?php

    $test = isset($_GET['test']) ? $_GET['test'] : '';

    if ($test == '404') {
        error_404();
    } elseif ($test == '500') {
        error_500();
    } elseif ($test == 'redirect') {
        redirect_to(wwwRoot('/staff/subjects/index.php'));
    }

?>

<?php $page_title = 'Create Subject';  ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back_link" href="<?php echo wwwRoot('/staff/subjects/index.php');  ?>">&laquo; Back to list</a>

    <div class="subject new">
        <h1>Create Subject</h1>
        <form action="" method="post">
            <dl>
                <dt>Menu Name</dt>
                <dd><input type="text" name="menu_name" value=""></dd>
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
                <dd>
                    <input type="hidden" name="visible" value="0">  <!-- set type to hidden and value to 0 -->
                    <input type="checkbox" name="visible" value="1"> <!-- set checkbox and if checked will return value to 1 and will ignore the one input above this one -->
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Create Subject">
            </div>
        </form>
    </div>
</div>
