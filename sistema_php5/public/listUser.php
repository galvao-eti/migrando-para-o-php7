<?php require_once '../sessionManagement.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>Sistema</title>
        <link rel="stylesheet" type="text/css" href="css/default.css">
    </head>
    <body>
<?php
require_once 'menu.php';
require_once '../conn.php';

$sql = "SELECT * FROM usuario";

$result = mysql_query($sql);

if (!$result) {
    die('Erro: ' . mysql_error());
}
?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>

<?php
while ($record = mysql_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td align="center">' . $record['id'] . '</td>';
    echo '<td>' . decrypt($record['name']) . '</td>';
    echo '<td>' . decrypt($record['email']) . '</td>';
    echo '<td width="20%" align="right"><a href="viewUser.php?id=' . $record['id'] . '">Visualizar</a> | ';
    echo '<a href="editUser.php?id=' . $record['id'] . '">Editar</a> | ';
    echo '<a href="deleteUser.php?id=' . $record['id'] . '">Excluir</a></td>';
    echo '</tr>';
}

echo '</tbody></table>';

mysql_close();
?>
    </body>
</html>
