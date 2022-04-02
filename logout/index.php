<?php
setcookie('user_id',null, time() - 3600,'/' );
session_start();
session_destroy();

header('Location:../login');
?>