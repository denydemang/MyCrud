<?php
session_start();
session_destroy();
session_unset();
$_SESSION = [];
setcookie("key", "", time() - 3600);
setcookie("id", "", time() - 3600);

header('Location: Login.php');
exit;

?>
<html>

</html>