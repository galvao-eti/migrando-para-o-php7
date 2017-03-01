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
        <form action="processEditUser.php" method="post">
            <input type="hidden" name="id" id="id" value="<?=(isset($id) ? $id : NULL);?>">
            <label for="name">Username: </label>
            <input type="text" name="name" id="name" value="<?=(isset($name) ? $name : '');?>"><br>
            <label for="email">E-mail: </label>
            <input type="text" name="email" id="email" value="<?=(isset($email) ? $email : '');?>"><br>
            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha"><br>
            <label for="confirma_senha">Confirme a Senha: </label>
            <input type="password" name="confirma_senha" id="confirma_senha"><br>
            <input type="submit" value="Cadastrar">
        </form>
    </body>
</html>
