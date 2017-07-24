<?php require_once('../../../private/init.php');  ?>

<?php

    if (is_post_request()) {
        //Handle form values sent by new.php
        $menu_name = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
        $visible = isset($_POST['visible']) ? $_POST['visible'] : '';
        $position = isset($_POST['position']) ? $_POST['position'] : '';

        echo 'Menu Name: ' . $menu_name;
        echo '<br>';
        echo 'Visible: ' . $visible;
        echo '<br>';
        echo 'Position: ' . $position;
    } else {
        redirect_to(wwwRoot('/staff/subjects/new.php'));
    }




?>