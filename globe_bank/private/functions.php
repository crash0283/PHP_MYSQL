<?php
    function wwwRoot($relDir) {
        return WWW_ROOT . $relDir;
    }

    function h($string) {
        return htmlspecialchars($string);
    }

    function u($string) {
        return urlencode($string);
    }

    function error_404() {
        header($_SERVER['SERVER_PROTOCOL'] . '404 Not Found');
        exit();
    }

    function error_500() {
        header($_SERVER['SERVER_PROTOCOL'] . '500 Internal Server Error');
        exit();
    }

    function redirect_to($location) {
        header('Location: ' . $location);
        exit(); //Quits PHP right away
    }

    function is_post_request() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    function is_get_request() {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    function display_errors($errors=[]) {
        $output = '';

        if (!empty($errors)) {
            $output .= "<div class=\"errors\">";
            $output .= "Please fix the following errors:";
            $output .= "<ul>";
            foreach ($errors as $error) {
                $output .= "<li>" . h($error) . "</li>";

            }
            $output .= "</ul>";
            $output .= "</div>";
        }

        return $output;
    }




?>