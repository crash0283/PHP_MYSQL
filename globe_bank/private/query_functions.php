<?php

    function find_all_subjects($db,$options=[]) {
        //Add optional array of attributes to look for
        $visible = $options['visible'] ?? false;


        //Read data from subjects database table
        // .= will concatenate long MySQL sequences
        $sql = "SELECT * FROM subjects ";


        if ($visible) {
            $sql .= "WHERE visible = true ";
        }
        $sql .= "ORDER BY position ASC";

        //Get result
        $result = mysqli_query($db,$sql);
        //Test to see if result is returned
        confirm_result_set($result);
        //return result
        return $result;
    }

    function find_subject_by_id($id,$db,$options=[]) {
        $visible = $options['visible'] ?? false;

        //Create SQL SELECT and don't forget to put single quotes around query variable ($id)
        $sql = "SELECT * FROM subjects ";
        $sql .= "WHERE id='" . db_escape($db,$id) ."' ";
        if ($visible) {
            $sql .= "AND visible=true";
        }
        //echo $sql;
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
        $sql .= "VALUES ('" . db_escape($db,$subject['menu_name']) ."','" . db_escape($db,$subject['position']) . "','" . db_escape($db,$subject['visible']) ."')";

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
        $sql .= "menu_name='" . db_escape($db,$subject['menu_name']) . "', ";
        $sql .= "position='" . db_escape($db,$subject['position']) . "', ";
        $sql .= "visible='" . db_escape($db,$subject['visible']) . "' ";
        $sql .= "WHERE id='" . db_escape($db,$subject['id']) . "'";

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

        $sql = "DELETE FROM subjects WHERE id='" . db_escape($db,$id) . "' LIMIT 1";
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
        $sql .= "ORDER BY id ASC";

        $result = mysqli_query($db,$sql);
        confirm_result_set($result);
        return $result;
    }

    function find_pages_by_id($id,$db,$options=[]) {
        $visible = $options['visible'] ?? false;

        //Create SQL SELECT and don't forget to put single quotes around query variable ($id)
        $sql = "SELECT * FROM pages ";
        $sql .= "WHERE id='" . db_escape($db,$id) ."' ";

        if ($visible) {
            $sql .= "AND visible=true";
        }
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

        $sql = "INSERT INTO pages (subject_id,menu_name,position,visible,content) ";
        $sql .= "VALUES ('" . db_escape($db,$page['subject_id']) ."','" . db_escape($db,$page['menu_name']) ."','" . db_escape($db,$page['position']) . "','" . db_escape($db,$page['visible']) . "','" . db_escape($db,$page['content']) . "')";

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
        $sql .= "menu_name='" . db_escape($db,$page['menu_name']) . "', ";
        $sql .= "position='" . db_escape($db,$page['position']) . "', ";
        $sql .= "visible='" . db_escape($db,$page['visible']) . "', ";
        $sql .= "content='" . db_escape($db,$page['content']) . "' ";
        $sql .= "WHERE id='" . db_escape($db,$page['id']) . "'";

        $query = mysqli_query($db,$sql);

        if ($query) {
            return true;
        } else {
            echo mysqli_error($db);
            db_disconnect($db);
            exit();
        }



    }

    function delete_page($id) {
        global $db;

        $sql = "DELETE FROM pages WHERE id='" . db_escape($db,$id) . "' LIMIT 1";
        $query = mysqli_query($db,$sql);
        if ($query) {
            return true;
        } else {
            echo mysqli_error($db);
            db_disconnect($db);
            exit();
        }
    }

    function find_pages_by_subject_id($subject_id,$options=[]) {
        global $db;

        //add optional array of attributes to look for
        $visible = $options['visible'] ?? false;

        //Create SQL SELECT and don't forget to put single quotes around query variable ($id)
        $sql = "SELECT * FROM pages ";
        $sql .= "WHERE subject_id='" . db_escape($db,$subject_id) ."'";

        //test if visible is true
        if ($visible) {
            $sql .= " AND visible=true ";
        }
        $sql .= "ORDER BY position ASC";

        //Get result set
        $result = mysqli_query($db,$sql);

        //Error check to make sure we get set back
        confirm_result_set($result);


        return $result;
    }

    function find_all_admins() {
        global $db;

        $sql = "SELECT * FROM admins ";
        $sql .= "ORDER BY last_name ASC";

        $result = mysqli_query($db,$sql);

        confirm_result_set($result);

        return $result;
    }

    function find_admin_by_id($id) {
        global $db;

        $sql = "SELECT * FROM admins ";
        $sql .= "WHERE id='" . db_escape($db,$id) . "'";

        //Get result set
        $result = mysqli_query($db,$sql);

        //Error check to make sure we get set back
        confirm_result_set($result);

        //Get Associative Array
        $admin = mysqli_fetch_assoc($result);

        //Free data set since it's stored in the $subject variable as an array now
        mysqli_free_result($result);

        return $admin;


    }

    function find_admin_by_username($username) {
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE username='" . db_escape($db,$username) . "'";

    //Get result set
    $result = mysqli_query($db,$sql);

    //Error check to make sure we get set back
    confirm_result_set($result);

    //Get Associative Array
    $admin = mysqli_fetch_assoc($result);

    //Free data set since it's stored in the $subject variable as an array now
    mysqli_free_result($result);

    return $admin;


}

    function validate_admins($admin,$options=[]) {
        $errors = [];

        $password_checked = $options['password_checked'] ?? true;


        //first_name
        if (is_blank($admin['first_name'])) {
            $errors[] = 'First Name cannot be blank!';
        }
        elseif (!has_length($admin['first_name'],['min'=>2,'max'=>255])) {
            $errors[] = 'First Name must be between 2 and 255 characters!';
        }

        //last name
        if (is_blank($admin['last_name'])) {
            $errors[] = 'Last Name cannot be blank!';
        }
        elseif (!has_length($admin['last_name'],['min'=>2,'max'=>255])) {
            $errors[] = 'Last Name must be between 2 and 255 characters!';
        }

        //email
        if (is_blank($admin['email'])) {
            $errors[] = 'Email cannot be blank!';
        }
        elseif (!has_length($admin['email'],['min'=>2,'max'=>255])) {
            $errors[] = 'Email must be between 2 and 255 characters!';
        }

        //username
        if (is_blank($admin['username'])) {
            $errors[] = 'Username cannot be blank!';
        }
        elseif (!has_length($admin['username'],['min'=>2,'max'=>255])) {
            $errors[] = 'Username must be between 2 and 255 characters!';
        }
        elseif (!has_unique_username($admin['username'], $admin['id'] ?? 0)) {
            $errors[] = "Username not allowed. Try another.";
        }

        if ($password_checked) {
            //password
            if (is_blank($admin['password'])) {
                $errors[] = 'Password cannot be blank!';
            }
            elseif (!has_length($admin['password'],['min'=>2,'max'=>12])) {
                $errors[] = 'Password must be between 2 and 12 characters!';
            }
            elseif (!preg_match('/[A-Z]/', $admin['password'])) {
                $errors[] = "Password must contain at least 1 uppercase letter";
            } elseif (!preg_match('/[a-z]/', $admin['password'])) {
                $errors[] = "Password must contain at least 1 lowercase letter";
            } elseif (!preg_match('/[0-9]/', $admin['password'])) {
                $errors[] = "Password must contain at least 1 number";
            } elseif (!preg_match('/[^A-Za-z0-9\s]/', $admin['password'])) {
                $errors[] = "Password must contain at least 1 symbol";
            }

            //confirm password
            if(is_blank($admin['confirm_password'])) {
                $errors[] = "Confirm password cannot be blank.";
            } elseif ($admin['password'] !== $admin['confirm_password']) {
                $errors[] = "Password and confirm password must match.";
            }
        }




        return $errors;

    }

    function insert_admin($admin) {
        global $db;

        //Validate
        $errors = validate_admins($admin);

        //If there were errors do this
        if (!empty($errors)) {
            //By using return here, if there are errors this function will just return the errors and won't execute the sql code
            return $errors;
        }

        //password_hash encrypts password
        $hashed_password = password_hash($admin['password'],PASSWORD_DEFAULT);

        $sql = "INSERT INTO admins ";
        $sql .= "(first_name, last_name, email, username, hashed_password) ";
        $sql .= "VALUES (";
        $sql .= "'" . db_escape($db,$admin['first_name']) . "',";
        $sql .= "'" . db_escape($db,$admin['last_name']) . "',";
        $sql .= "'" . db_escape($db,$admin['email']) . "',";
        $sql .= "'" . db_escape($db,$admin['username']) . "',";
        $sql .= "'" . db_escape($db,$hashed_password) . "'";
        $sql .= ")";


        $result = mysqli_query($db,$sql);

        //If result returned a value, return true, else show error and disconnect from database
        if ($result) {
            return true;
        } else {
            mysqli_error($db);
            db_disconnect($db);
            exit();
        }

    }

    function update_admin($admin) {
        global $db;

//        $password_sent = !is_blank($admin['password']);
        $password_checked = $admin['updatePass'] ?? false;

        $errors = validate_admins($admin,["password_checked" => $password_checked]);
        if (!empty($errors)) {
            return $errors;
        }

        //password_hash encrypts password
        $hashed_password = password_hash($admin['password'],PASSWORD_DEFAULT);

        $sql = "UPDATE admins SET ";
        $sql .= "first_name='" . db_escape($db,$admin['first_name']) . "', ";
        $sql .= "last_name='" . db_escape($db,$admin['last_name']) . "', ";
        $sql .= "email='" . db_escape($db,$admin['email']) . "', ";
        if ($password_checked) {
            $sql .= "hashed_password='" . db_escape($db,$hashed_password) . "', ";
        }
        $sql .= "username='" . db_escape($db,$admin['username']) . "' ";
        $sql .= "WHERE id='" . db_escape($db,$admin['id']) . "'";

        $result = mysqli_query($db,$sql);

        if ($result) {
            return true;
        } else {
            echo mysqli_error($db);
            db_disconnect($db);
            exit();

        }
    }

    function delete_admin($id) {
        global $db;

        $sql ="DELETE FROM admins WHERE id='" . db_escape($db,$id) . "' LIMIT 1";

        $result = mysqli_query($db,$sql);

        if ($result) {
            return true;
        } else {
            echo mysqli_error($db);
            db_disconnect($db);
            exit();
        }
    }

?>