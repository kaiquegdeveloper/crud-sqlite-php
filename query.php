<?php
require 'tabela.php';
$db = new SQLite3('database/banco.db');
switch ($_POST['action']) {
    case 'all':
        $results = $db->query('SELECT * FROM user');
        while ($row = $results->fetchArray()) :
            exibirTabela($row);
        endwhile;
        break;
    case 'search':
        $results = $db->query("SELECT * FROM user WHERE ( nome LIKE '%" . $_POST['parametro'] . "%' or email LIKE '%" . $_POST['parametro'] . "%' )");
        while ($row = $results->fetchArray()) :
            exibirTabela($row);
        endwhile;
        break;
    case 'delete':
        $results = $db->query("DELETE FROM user WHERE id = " . $_POST['id']);
        $results = $db->query('SELECT * FROM user');
        while ($row = $results->fetchArray()) :
            exibirTabela($row);
        endwhile;
        break;
    case 'insert':
        $sql = "INSERT INTO user (
            nome,
            email
        )
        VALUES (
            '" . $_POST['nome'] . "',
            '" . $_POST['email'] . "'
        );
        ";
        $results = $db->query($sql);
        $results = $db->query('SELECT * FROM user');
        while ($row = $results->fetchArray()) :
            exibirTabela($row);
        endwhile;
        break;
    case 'update':
        $sql = "UPDATE user 
        SET nome = '" . $_POST['nome'] . "',
            email = '" . $_POST['email'] . "'
      WHERE id = '" . $_POST['id'] . "' 
        ";
        $results = $db->query($sql);
        $results = $db->query('SELECT * FROM user');
        while ($row = $results->fetchArray()) :
            exibirTabela($row);
        endwhile;
        break;

    default:
        # code...
        break;
}
