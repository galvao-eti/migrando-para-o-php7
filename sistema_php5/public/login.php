<?php session_start();?>
<?php
require '../config.php';
require '../conn.php';

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$pass  = $_POST['senha'];

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if (strlen($pass)) {
        $cryptoEmail = openssl_encrypt($email, CRYPTO_CIPHER, CRYPTO_PASS, 0, CRYPTO_IV);
        $sql = "SELECT id, senha FROM usuario WHERE email = '$cryptoEmail'";

        $result = mysql_query($sql);
        $record = mysql_fetch_assoc($result);

        if ($record['id']) {
            if (password_verify($pass, $record['senha'])) {
                $_SESSION['UID'] = $record['id'];

                header('Location: dashboard.php');
                exit();
            }
        }

        header('Location: index.php?msg=Erro');
        exit();
    }
}

mysql_close();
