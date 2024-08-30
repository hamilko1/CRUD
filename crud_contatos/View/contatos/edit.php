<?php
require_once '../../config/database.php';
require_once '../../model/Contato.php';

$database = new Database();
$db = $database->getConnection();

$contato = new Contato($db);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $contato->id = $_GET['id'];
    $contato->readOne();
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $contato->id = $_POST['id'];
    $contato->nome_completo = $_POST['nome_completo'];
    $contato->email = $_POST['email'];
    $contato->data_nascimento = $_POST['data_nascimento'];
    $contato->profissao = $_POST['profissao'];
    $contato->telefone = $_POST['telefone'];
    $contato->celular = $_POST['celular'];
    $contato->whatsapp = isset($_POST['whatsapp']) ? 1 : 0;
    $contato->notificar_email = isset($_POST['notificar_email']) ? 1 : 0;
    $contato->notificar_sms = isset($_POST['notificar_sms']) ? 1 : 0;

    if ($contato->update()) {
        header('Location: index.php');
        exit;
    } else {
        echo "Erro ao atualizar o contato.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Contato</title>
    <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body>
    <div class="container">
        <h1>Editar Contato</h1>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($contato->id); ?>">
            <div class="form-group">
                <label for="nome_completo">Nome Completo:</label>
                <input type="text" id="nome_completo" name="nome_completo" value="<?php echo htmlspecialchars($contato->nome_completo); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($contato->email); ?>" required>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" value="<?php echo htmlspecialchars($contato->data_nascimento); ?>" required>
            </div>
            <div class="form-group">
                <label for="profissao">Profissão:</label>
                <input type="text" id="profissao" name="profissao" value="<?php echo htmlspecialchars($contato->profissao); ?>" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" value="<?php echo htmlspecialchars($contato->telefone); ?>" required>
            </div>
            <div class="form-group">
                <label for="celular">Celular:</label>
                <input type="text" id="celular" name="celular" value="<?php echo htmlspecialchars($contato->celular); ?>" required>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="whatsapp" <?php echo $contato->whatsapp ? 'checked' : ''; ?>>
                    Possui WhatsApp
                </label>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="notificar_email" <?php echo $contato->notificar_email ? 'checked' : ''; ?>>
                    Notificar por Email
                </label>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="notificar_sms" <?php echo $contato->notificar_sms ? 'checked' : ''; ?>>
                    Notificar por SMS
                </label>
            </div>
            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>
