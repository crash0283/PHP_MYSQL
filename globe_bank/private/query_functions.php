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

    function insert_subject($menu_name,$position,$visible) {
        global $db;

        $sql = "INSERT INTO subjects ";
        $sql .= "(menu_name,position,visible) ";
        $sql .= "VALUES ('$menu_name','$visible','$position')";

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

        $sql = "UPDATE subjects SET ";
        $sql .= "menu_name='" . $subject['menu_name'] . "', ";
        $sql .= "position='" . $subject['position'] . "', ";
        $sql .= "visible='" . $subject['visible'] . "' ";
        $sql .= "WHERE id='" . $subject['id'] . "'";

        $result = mysqli_query($db,$sql);

        if ($result) {
            redirect_to(wwwRoot('/staff/subjects/index.php'));
            return true;
        } else {
            echo mysqli_error($db);
            db_disconnect($db);
            exit();
        }
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

    function find_all_pages($db) {
        $sql = "SELECT * FROM pages ";
        $sql .= "ORDER BY position ASC";

        $result = mysqli_query($db,$sql);
        confirm_result_set($result);
        return $result;
    }



?>