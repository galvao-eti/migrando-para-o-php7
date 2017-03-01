<?php 
require_once '../sessionManagement.php';
require_once '../config.php';
require_once '../crypto.php';
?>
<div id="identification">
    Usuário: <?=decrypt($_SESSION['user']);?> ||| <a href="logout.php">Logout</a> 
</div>
<div id="menu">
    <a href="addUser.php">Cadastrar novo usuário</a> | 
    <a href="listUser.php">Listar usuários</a> | 
    <a href="addProduct.php">Cadastrar novo produto</a> | 
    <a href="listProduct.php">Listar produtos</a> | 
    <a href="addCategory.php">Cadastrar nova categoria</a> | 
    <a href="listCategory.php">Listar categorias</a>
</div>
