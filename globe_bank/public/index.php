<?php require_once('../private/init.php'); ?>

<?php
    $preview = false;
    if (isset($_GET['preview'])) {
        //previewing should require admin to be logged in
        $preview = $_GET['preview'] == 'true' ? true : false;
    }

    //if preview is set to true, visible should be false so admin can see page whether visible or not
    $visible = !$preview;

    //Route Pages
    if (isset($_GET['id'])) {
        $page_id = $_GET['id'];
        $page = find_pages_by_id($page_id,$db,['visible'=>$visible]);
        //print_r($page);
        if (!$page) {
            redirect_to(wwwRoot('/index.php'));
        }
        //Set subject_id from foreign key $page['subject_id']
        $subject_id = $page['subject_id'];
        //Need to query subject database to see if subject is visible
        $subject = find_subject_by_id($subject_id,$db,['visible'=>$visible]);
        //if subject not visible, redirect to home page
        if (!$subject) {
            redirect_to(wwwRoot('/index.php'));
        }
    }
    elseif (isset($_GET['subject_id'])) {
        //Returns subject_id for collapsible navigation
        $subject_id = $_GET['subject_id'];
        //Need to query subject database to see if subject is visible
        $subject = find_subject_by_id($subject_id,$db,['visible'=>$visible]);
        //if subject not visible, redirect to home page
        if (!$subject) {
            redirect_to(wwwRoot('/index.php'));
        }
        //This part gets the first page from the selected subject_id and returns it
        $page_set = find_pages_by_subject_id($subject_id,['visible'=>$visible]);
        //Just returns the first page in an associative array
        $page = mysqli_fetch_assoc($page_set);
        mysqli_free_result($page_set);
        if (!$page) {
            redirect_to(wwwRoot('/index.php'));
        }

        $page_id = $page['id'];

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
            $allowedTags = '<div><img><h1><h2><p><br><strong><em><ul><li>';
            echo strip_tags($page['content'],$allowedTags);

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
