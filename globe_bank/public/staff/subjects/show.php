<?php
require_once('../../../private/init.php');

//Get ID
$id = isset($_GET['id']) ? $_GET['id'] : 1;
//$id = $_GET['id'] ?? 1;  PHP 7

echo h($id);

?>

<a href="show.php?name=<?php echo urlencode('John Doe');  ?>">Link</a><br>
<a href="show.php?company=<?php echo urlencode('Widgets&More');  ?>">Link</a><br>
<a href="show.php?query=<?php echo urlencode('!#*?');  ?>">Link</a><br>
