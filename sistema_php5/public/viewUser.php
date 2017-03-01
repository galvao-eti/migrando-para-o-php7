<?php require_once '../sessionManagement.php';?>
<?php
require_once '../config.php';
require_once '../conn.php';
require_once '../crypto.php';

$id = (isset($_GET['id']) ? $_GET['id'] : NULL);

$sql = "SELECT * FROM usuario WHERE id=$id";
$result = mysql_query($sql);
$record = mysql_fetch_assoc($result);

$name  = decrypt($record['name']);
$email = decrypt($record['email']);

mysql_close();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>Sistema</title>
        <link rel="stylesheet" type="text/css" href="css/default.css">
    </head>
    <body>
        <?php require_once 'menu.php';?>
        <?=(isset($_GET['msg']) ? $_GET['msg'] : '');?>
        Username: <?=(isset($name) ? $name : '');?><br>
        E-mail: <?=(isset($email) ? $email : '');?><br>
    </body>
</html>
