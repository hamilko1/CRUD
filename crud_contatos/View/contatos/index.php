<?php
require_once '../../config/database.php'; 
require_once '../../model/Contato.php'; 

$database = new Database();
$db = $database->getConnection();

$contato = new Contato($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

$contatos = $contato->readAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Contatos</title>
    <link rel="stylesheet" href="../../styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="header">
        <img src="../../assets/logo_alphacode.png" alt="Logo" class="logo">
        <h1>Meu Sistema de Contatos</h1>
    </div>

    <div class="container">
        <h2>Cadastro de Contatos</h2>
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

        <h2>Contatos Anteriores</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome Completo</th>
                    <th>Data de Nascimento</th>
                    <th>Email</th>
                    <th>Celular</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contatos as $contato): ?>
                <tr>
                    <td><?php echo htmlspecialchars($contato['nome_completo']); ?></td>
                    <td><?php echo htmlspecialchars($contato['data_nascimento']); ?></td>
                    <td><?php echo htmlspecialchars($contato['email']); ?></td>
                    <td><?php echo htmlspecialchars($contato['celular']); ?></td>
                    <td class="actions">
                    <a href="edit.php?id=<?php echo htmlspecialchars($contato['id']); ?>">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="delete.php?id=<?php echo htmlspecialchars($contato['id']); ?>" onclick="return confirm('Tem certeza que deseja excluir este contato?');">
                        <i class="fas fa-trash"></i>
                    </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="footer">
        <img src="../../assets/logo_rodape_alphacode.png" alt="Logo">
        <p>&copy; 2024 Sistema de Contatos. Todos os direitos reservados.</p>
    </div>
</body>
</html>
