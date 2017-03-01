<?php
require_once '../sessionManagement.php';
require '../config.php';
require '../conn.php';
require '../crypto.php';

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$pass  = $_POST['senha'];

if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
    if (strlen($pass)) {
        $cryptoEmail = encrypt($email);
        $sql = "SELECT id, name, senha FROM usuario WHERE email = '$cryptoEmail'";

        $result = mysql_query($sql);

        if (!$result) {
            die('Erro: ' . mysql_error());
        }

        $record = mysql_fetch_assoc($result);

        if ($record['id']) {
            if (password_verify($pass, $record['senha'])) {
                $_SESSION['UID'] = encrypt($record['id']);
                $_SESSION['user'] = $record['name'];

                mysql_close();
                header('Location: dashboard.php');
                exit();
            } else {
                mysql_close();
                header('Location: index.php?msg=' . urlencode('E-mail e/ou senha não confere(m).'));
                exit();
            }
        }

        mysql_close();
        header('Location: index.php?msg=Erro');
        exit();
    }
}

mysql_close();
