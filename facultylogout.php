<?php
ob_start();
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
$user->faculty_logout();
header('Location: index.php');
exit();
ob_end_flush();
?>
