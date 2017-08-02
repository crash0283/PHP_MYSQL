<?php require_once('../private/init.php'); ?>

<?php
    //Route Pages
    if (isset($_GET['id'])) {
        $page_id = $_GET['id'];
        $page = find_pages_by_id($page_id,$db);
        //print_r($page);
        if (!$page) {
            redirect_to(wwwRoot('/index.php'));
        }
        //Set subject_id from foreign key $page['subject_id']
        $subject_id = $page['subject_id'];
    }

?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">
    <?php include(SHARED_PATH . '/public_navigation.php'); ?>

  <div id="page">

      <?php
        if (isset($page)) {
            //Show page from database
            //TODO add html escaping back in
            echo $page['content'];

        } else {
            //Show the homepage
            //The homepage content could:
            //* Be a static page (here or in a shared file)
            //* Show the first page in the nav from a database
            //* Be in the database, but add code to hide in nav

            include(SHARED_PATH . '/static_homepage.php');
        }

      ?>
  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
