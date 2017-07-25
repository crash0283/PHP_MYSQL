<footer>
    &copy; <?php echo date('Y'); ?> Globe Bank
</footer>
</body>
</html>

<?php
    //This happens on every page that has a footer, it will load html and then disconnect from database
    db_disconnect($db);
?>