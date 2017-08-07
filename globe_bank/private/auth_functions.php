<?php

//Performs all necessary actions to login to admin
function log_in_admin($admin) {
    //Regenerating id protects the admin from session fixation
    session_regenerate_id();

    $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['last_login'] = time();
    $_SESSION['first_name'] = $admin['first_name'];


    return true;
}

//Performs all necessary actions to log out
function log_out_admin() {
    unset($_SESSION['first_name']);
    unset($_SESSION['last_login']);
    unset($_SESSION['admin_id']);

    return true;
}

//is_logged_in() contains all the logic for determining if a
//request should be considered a "logged in" request or not.
//It is the core of require_login() but it can also be called on its own
//in other contexts (ex. display one link if an admin is logged in
//and display another link if they are not
function is_logged_in() {
    //having a admin_id in the session serves a dual-purpose
    //*Its presence indicates the admin is logged in
    //*Its value tells which admin for looking up their record
    return isset($_SESSION['admin_id']);
}

//Call require_login() at the top of any page which needs to
//require a valid login before granting access to the page
function require_login() {
    if(!is_logged_in()) {
        redirect_to(wwwRoot('/staff/login.php'));
    }
}