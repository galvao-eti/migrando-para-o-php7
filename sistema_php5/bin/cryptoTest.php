#!/usr/bin/php
<?php
ini_set('error_reporting', 'E_ALL ~E_NOTICE');

require_once '../config.php';
require_once '../crypto.php';

switch($_SERVER['argv'][1]) {
    case '-e':
        $result = encrypt($_SERVER['argv'][2]);
        break;

    case '-d':
        $result = decrypt($_SERVER['argv'][2]);
        break;

    default:
        $result = 'Uso: ./cryptoTest -[e|d] dado';
}

echo $result;

echo PHP_EOL;
exit();
