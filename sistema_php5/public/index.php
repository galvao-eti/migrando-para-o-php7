<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>Sistema</title>
    </head>
    <body>
        <?=(isset($_GET['msg']) ? $_GET['msg'] : '');?>
        <form action="login.php" method="post">
            <label for="email">E-mail: </label>
            <input type="text" name="email"><br>
            <label for="senha">Senha: </label>
            <input type="password" name="senha"><br>
            <input type="submit" value="Acessar">
        </form>
    </body>
</html>
