<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove all session variables
session_unset(); 

setcookie("username", "", time() - 36000 , '/');
// destroy the session 
session_destroy(); 
header('location:index.php')
?>

</body>
</html>
