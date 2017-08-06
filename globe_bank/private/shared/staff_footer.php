<footer>
    &copy; <?php echo date('Y'); ?> Globe Bank
</footer>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>

<?php
    //This happens on every page that has a footer, it will load html and then disconnect from database
    db_disconnect($db);
?>