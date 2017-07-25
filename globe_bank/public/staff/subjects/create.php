<?php require_once('../../../private/init.php');  ?>

<?php

    if (is_post_request()) {
        //Handle form values sent by new.php
        $menu_name = isset($_POST['menu_name']) ? $_POST['menu_name'] : '';
        $visible = isset($_POST['visible']) ? $_POST['visible'] : '';
        $position = isset($_POST['position']) ? $_POST['position'] : '';

        //Use this function to create new subject
        $result = insert_subject($menu_name,$visible,$position);
        $new_id = mysqli_insert_id($db);
        redirect_to(wwwRoot('/staff/subjects/show.php?id=' . $new_id));

//        echo 'Menu Name: ' . $menu_name;
//        echo '<br>';
//        echo 'Visible: ' . $visible;
//        echo '<br>';
//        echo 'Position: ' . $position;
    } else {
        redirect_to(wwwRoot('/staff/subjects/new.php'));
    }




?>