<?php
session_start();


session_unset();
session_destroy();


setcookie('status', '', time() - 10, '/');


header('Location: ../view/login.html');
exit();
?>
