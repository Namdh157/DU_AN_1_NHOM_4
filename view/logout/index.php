<?php

if (isset($_COOKIE['userName']) && isset($_COOKIE['password'])) {
    unset($_COOKIE['userName']);
    unset($_COOKIE['password']);
    setcookie('userName',null, -0,'/');
    setcookie('password', null, -1, '/');
}

header("location:../../index.php");
exit();
?>