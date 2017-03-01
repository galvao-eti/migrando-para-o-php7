<?php require_once '../sessionManagement.php';?>
<?php
require '../config.php';
require '../conn.php';
require '../crypto.php';

$id    = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
$name  = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$pass  = $_POST['senha'];
$pass2 = $_POST['confirma_senha'];

if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false and $name) {
    $cryptoName  = encrypt($name);
    $cryptoEmail = encrypt($email);

    $sql = "UPDATE usuario SET name = '$cryptoName', email = '$cryptoEmail'";

    if (strlen($pass) > 0 and $pass == $pass2) {
        $sql .= ", senha = '" . password_hash($pass, PASSWORD_DEFAULT) . "'";
    }

    $sql .= " WHERE id = $id";

    $result = mysql_query($sql);

    if (!$result) {
        mysql_close();
        header('Location: editUser.php?msg=' . urlencode(mysql_error()));
        exit();
    }

    mysql_close();
    header('Location: listUser.php');
    exit();
} else {
    mysql_close();
    header('Location: addUser.php?msg=' . urlencode('E-mail inválido.'));
    exit();
}
