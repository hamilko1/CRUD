<?php
require_once 'controller/ContatoController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$controller = new ContatoController();

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'index':
    default:
        $controller->index();
        break;
}
?>
