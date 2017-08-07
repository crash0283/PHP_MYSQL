<footer>
    &copy; <?php echo date('Y'); ?> Globe Bank
</footer>
<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>

    $(document).ready(function(){
        if(!$('#updatePass').prop('checked')) {
            $('#password,#confirm_password,.passLabels').toggle();
        }
        $('#updatePass').click(function() {
            $('#password,#confirm_password,.passLabels').toggle();
        })

    })

</script>
</body>
</html>

<?php
    //This happens on every page that has a footer, it will load html and then disconnect from database
    db_disconnect($db);
?>