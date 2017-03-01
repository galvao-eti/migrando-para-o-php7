<?php require_once '../sessionManagement.php';?>
<?php
require '../config.php';
require '../conn.php';

$sql = "DELETE FROM usuario WHERE id = " . $_GET['id'];

$result = mysql_query($sql);

if (!$result) {
    die('Erro: ' . mysql_error());
}

mysql_close();

header('Location: listUser.php');
exit();
