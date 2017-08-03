<!doctype html>

<html lang="en">
  <head>
    <title>Globe Bank <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?><?php if (isset($preview) && $preview) {echo ' [PREVIEW MODE] ';} ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo wwwRoot('/css/public.css'); ?>" />
  </head>

  <body>

    <header>
      <h1>
        <a href="<?php echo wwwRoot('/index.php'); ?>">
          <img src="<?php echo wwwRoot('/images/gbi_logo.png'); ?>" width="298" height="71" alt="" />
        </a>
      </h1>
    </header>
