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
    <!--    We are using the page_title php variable that we created in the index.php file-->
    <title>GBI - <?php echo h($page_title); ?></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"  href="<?php echo wwwRoot("/css/staff.css");  ?>">
</head>
<body>
<header>
    <h1>GBI Staff Area</h1>
</header>
<nav>
    <ul>
        <li>Username: <?php echo $_SESSION['username'] ?? ''; ?></li>
        <li><a href="<?php echo wwwRoot('/staff/index.php'); ?>">Menu</a></li>
        <li><a href="<?php echo wwwRoot('/staff/logout.php'); ?>">Logout</a></li>
    </ul>
</nav>
<?php echo display_session_message();  ?>

