<?php require_once '../sessionManagement.php';?>
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
        <form action="processAddUser.php" method="post">
            <label for="name">Username: </label>
            <input type="text" name="name" id="name"><br>
            <label for="email">E-mail: </label>
            <input type="text" name="email" id="email"><br>
            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha"><br>
            <label for="confirma_senha">Confirme a Senha: </label>
            <input type="password" name="confirma_senha" id="confirma_senha"><br>
            <input type="submit" value="Cadastrar">
        </form>
    </body>
</html>
