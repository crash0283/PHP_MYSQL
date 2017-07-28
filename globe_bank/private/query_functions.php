<?php

    function find_all_subjects($db) {
        //Read data from subjects database table
        // .= will concatenate long MySQL sequences
        $sql = "SELECT * FROM subjects ";
        $sql .= "ORDER BY position ASC";

        //Get result
        $result = mysqli_query($db,$sql);
        //Test to see if result is returned
        confirm_result_set($result);
        //return result
        return $result;
    }

    function find_subject_by_id($id,$db) {
    //Create SQL SELECT and don't forget to put single quotes around query variable ($id)
    $sql = "SELECT * FROM subjects ";
    $sql .= "WHERE id='" . $id ."'";

    //Get result set
    $result = mysqli_query($db,$sql);

    //Error check to make sure we get set back
    confirm_result_set($result);

    //Get Associative Array
    $subject = mysqli_fetch_assoc($result);

    //Free data set since it's stored in the $subject variable as an array now
    mysqli_free_result($result);

    return $subject;
}

    function validate_subject($subject) {
        $errors = [];

        //menu name
        if (is_blank($subject['menu_name'])) {
            //$errors[] adds value to end of array
            $errors[] = "Name cannot be blank!";
        }
        elseif (!has_length($subject['menu_name'],['min'=>2,'max'=>255])) {
            $errors[] = "Name must be between 2 and 255 characters!";
        }

        //position
        //Make sure we are working with an integer
        $position_int = (int) $subject['position'];
        if ($position_int <= 0) {
            $errors[] = "Position must be greater than zero!";
        }
        if($position_int > 999) {
            $errors[] = "Position must be less than 999!";
        }

        //visible
        //Make sure we are working with a string
        $visible_str = (string) $subject['visible'];

        if (!has_inclusion_of($visible_str,["0","1"])) {
            $errors[] = "Visible must be true or false!";
        }

        return $errors;

    }

    function insert_subject($subject) {
        global $db;

        //Validate
        $errors = validate_subject($subject);

        //If there were errors do this
        if (!empty($errors)) {
            //By using return here, if there are errors this function will just return the errors and won't execute the sql code
            return $errors;
        }

        $sql = "INSERT INTO subjects ";
        $sql .= "(menu_name,position,visible) ";
        $sql .= "VALUES ('{$subject['menu_name']}','{$subject['position']}','{$subject['visible']}')";

        $result = mysqli_query($db,$sql); //For INSERT statements, returns true/false

        if ($result) {
            return true;
        } else {
            mysqli_error($db);
            db_disconnect($db);
            exit();
        }
    }

    function update_subject($subject) {
        global $db;

        //Validate
        $errors = validate_subject($subject);

        //If there were errors do this
        if (!empty($errors)) {
            //By using return here, if there are errors this function will just return the errors and won't execute the sql code
            return $errors;
        }

        $sql = "UPDATE subjects SET ";
        $sql .= "menu_name='" . $subject['menu_name'] . "', ";
        $sql .= "position='" . $subject['position'] . "', ";
        $sql .= "visible='" . $subject['visible'] . "' ";
        $sql .= "WHERE id='" . $subject['id'] . "'";

        $result = mysqli_query($db,$sql);

        if ($result) {
            return true;
        } else {
            echo mysqli_error($db);
            db_disconnect($db);
            exit();
        }
    }

    function delete_subject($id) {
        //allow global scope $db to be brought into function
        global $db;

        $sql = "DELETE FROM subjects WHERE id='" . $id . "' LIMIT 1";
        $query = mysqli_query($db,$sql);
        if ($query) {
            return true;
        } else {
            echo mysqli_error($db);
            db_disconnect($db);
            exit();
        }
    }

    function find_all_pages($db) {
        $sql = "SELECT * FROM pages ";
        $sql .= "ORDER BY position ASC";

        $result = mysqli_query($db,$sql);
        confirm_result_set($result);
        return $result;
    }

    function find_pages_by_id($id,$db) {
    //Create SQL SELECT and don't forget to put single quotes around query variable ($id)
    $sql = "SELECT * FROM pages ";
    $sql .= "WHERE id='" . $id ."'";

    //Get result set
    $result = mysqli_query($db,$sql);

    //Error check to make sure we get set back
    confirm_result_set($result);

    //Get Associative Array
    $page = mysqli_fetch_assoc($result);

    //Free data set since it's stored in the $subject variable as an array now
    mysqli_free_result($result);

    return $page;
}

    function validate_page($page) {
        $errors = [];

        //menu_name
        if (is_blank($page['menu_name'])) {
            $errors[] = 'Name cannot be blank!';
        }
        elseif (!has_length($page['menu_name'], ['min'=>2, 'max'=>255])) {
            $errors[] = 'Name must be between 2 and 255 characters!';
        }

        //position
        //Make sure we are working with int
        $pos_int = (int) $page['position'];
        if ($pos_int <= 0) {
            $errors[] = 'Position must be greater than zero!';
        }
        if ($pos_int > 255) {
            $errors[] = 'Position must be less than 255!';
        }

        //visible
        //Make sure we are working with sting
        $vis_str = (string) $page['visible'];
        if (!has_inclusion_of($vis_str,['0','1']) ) {
            $errors[] = 'Visible must be true or false!';
        }

        return $errors;

    }

    function insert_page($page) {
        global $db;

        //Validate
        $errors = validate_page($page);
        if (!empty($errors)) {
            return $errors;
        }

        $sql = "INSERT INTO pages (menu_name,position,visible) ";
        $sql .= "VALUES ('{$page['menu_name']}','{$page['position']}','{$page['visible']}')";

        $query = mysqli_query($db,$sql);

        if ($query) {
            return true;
        } else {
            mysqli_error($db);
            db_disconnect($db);
            exit();
        }

    }

    function update_page($page) {
        global $db;

        //Validate
        $errors = validate_page($page);

        if (!empty($errors)) {
            return $errors;
        }

        $sql = "UPDATE pages SET ";
        $sql .= "menu_name='" . $page['menu_name'] . "', ";
        $sql .= "position='" . $page['position'] . "', ";
        $sql .= "visible='" . $page['visible'] . "' ";
        $sql .= "WHERE id='" . $page['id'] . "'";

        $query = mysqli_query($db,$sql);

        if ($query) {
            redirect_to(wwwRoot('/staff/pages/index.php'));
            return true;
        } else {
            echo mysqli_error($db);
            db_disconnect($db);
            exit();
        }



    }

    function delete_page($id) {
        global $db;

        $sql = "DELETE FROM pages WHERE id='" . $id . "' LIMIT 1";
        $query = mysqli_query($db,$sql);
        if ($query) {
            return true;
        } else {
            echo mysqli_error($db);
            db_disconnect($db);
            exit();
        }
    }



?>