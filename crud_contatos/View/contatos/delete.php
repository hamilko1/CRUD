<?php
require_once '../../config/database.php';
require_once '../../model/Contato.php';

$database = new Database();
$db = $database->getConnection();

$contato = new Contato($db);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $contato->id = $_GET['id'];

    if ($contato->delete()) {
        header('Location: index.php');
        exit;
    } else {
        echo "Erro ao excluir o contato.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Excluir Contato</title>
    <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body>
    <div class="container">
        <h1>Excluir Contato</h1>
        <p>O contato foi excluído com sucesso. <a href="index.php">Voltar para a lista</a></p>
    </div>
</body>
</html>
