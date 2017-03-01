<?php require_once '../sessionManagement.php';?>
<?php
require '../config.php';
require '../conn.php';
require '../crypto.php';

$name  = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$pass  = $_POST['senha'];
$pass2 = $_POST['confirma_senha'];

if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false and $name) {
    if (strlen($pass) > 0 and $pass == $pass2) {
        $cryptoName  = encrypt($name);
        $cryptoEmail = encrypt($email);
        $cryptoPass  = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuario (name, email, senha) VALUES ('$cryptoName', '$cryptoEmail', '$cryptoPass')";

        $result = mysql_query($sql);

        if (!$result) {
            mysql_close();
            header('Location: addUser.php?msg=' . urlencode(mysql_error()));
            exit();
        }

        mysql_close();
        header('Location: listUser.php');
        exit();

    } else {
        mysql_close();
        header('Location: addUser.php?msg=' . urlencode('Senha vazia ou senhas não conferem.'));
        exit();
    }
} else {
    mysql_close();
    header('Location: addUser.php?msg=' . urlencode('E-mail inválido.'));
    exit();
}
