
<?php 
session_start();
echo $_SESSION['user'];
session_destroy();
?>