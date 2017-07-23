<?php
    //Here we are testing to see if page_title is set and if not, use this default
    if(!isset($page_title)) {
        $page_title = 'Staff Area';
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo wwwRoot('/css/staff.css');  ?>">
<!--    We are using the page_title php variable that we created in the index.php file-->
    <title>GBI - <?php echo h($page_title); ?></title>
</head>
<body>
<header>
    <h1>GBI Staff Area</h1>
</header>
<nav>
    <ul>
        <li><a href="<?php echo wwwRoot('/staff/index.php'); ?>">Menu</a></li>
    </ul>
</nav>
