<?php
    function wwwRoot($relDir) {
        return WWW_ROOT . $relDir;
    }

    function h($string) {
        return htmlspecialchars($string);
    }

?>