<?php
/*require_once '../../config/database.php';
require_once '../../model/Contato.php';

$database = new Database();
$db = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $contato = new Contato($db);
    $contato->nome_completo = $_POST['nome_completo'];
    $contato->email = $_POST['email'];
    $contato->data_nascimento = $_POST['data_nascimento'];
    $contato->profissao = $_POST['profissao'];
    $contato->telefone = $_POST['telefone'];
    $contato->celular = $_POST['celular'];
    $contato->whatsapp = isset($_POST['whatsapp']) ? 1 : 0;
    $contato->notificar_email = isset($_POST['notificar_email']) ? 1 : 0;
    $contato->notificar_sms = isset($_POST['notificar_sms']) ? 1 : 0;

    if ($contato->create()) {
        header('Location: index.php');
        exit;
    } else {
        echo "Erro ao cadastrar o contato.";
    }
}
?>

<div class="container">
    <h1>Cadastrar Novo Contato</h1>
    <form action="" method="post">
        <div class="form-group">
            <label for="nome_completo">Nome Completo:</label>
            <input type="text" id="nome_completo" name="nome_completo" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" required>
        </div>
        <div class="form-group">
            <label for="profissao">Profissão:</label>
            <input type="text" id="profissao" name="profissao" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" required>
        </div>
        <div class="form-group">
            <label for="celular">Celular:</label>
            <input type="text" id="celular" name="celular" required>
        </div>
        <div class="form-group">
            <label for="whatsapp">WhatsApp:</label>
            <input type="checkbox" id="whatsapp" name="whatsapp">
        </div>
        <div class="form-group">
            <label for="notificar_email">Notificar por Email:</label>
            <input type="checkbox" id="notificar_email" name="notificar_email">
        </div>
        <div class="form-group">
            <label for="notificar_sms">Notificar por SMS:</label>
            <input type="checkbox" id="notificar_sms" name="notificar_sms">
        </div>
        <button type="submit">Cadastrar</button>
    </form>
</div>
*/