<?
session_start();
session_destroy();
include "config.php";
header('Location: '.PATH);
exit;

