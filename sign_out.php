<?php
//# start session
session_start();
//
//# unset session variables
//unset($_SESSION['admin_active']);
//
//#destroy session
//session_destroy();
//
//# redirect user back to index page
//header('Location: index.php');

require_once('fns/user_handler.php');
$user_handler = new UserHandler();
$user_handler->logout();

?>