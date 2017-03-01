<?php
session_start();

$_SESSION['UID'] = (isset($_SESSION['UID']) ? $_SESSION['UID'] : NULL);

$skip = [
    '/index.php',
    '/login.php',
    '/logout.php',
];

if (!in_array($_SERVER['PHP_SELF'], $skip)) {
   if ($_SESSION['UID'] === NULL) {
       header('Location: logout.php');
   }
}
