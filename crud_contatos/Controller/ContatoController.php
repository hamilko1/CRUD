<?php
include_once '../config/database.php';
include_once '../model/Contato.php';

class ContatoController {
    private $db;
    private $contato;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->contato = new Contato($this->db);
    }

    public function index() {
        $contatos = $this->contato->readAll();
        include '../views/contatos/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->contato->nome_completo = $_POST['nome_completo'];
            $this->contato->email = $_POST['email'];
            $this->contato->data_nascimento = $_POST['data_nascimento'];
            $this->contato->profissao = $_POST['profissao'];
            $this->contato->telefone = $_POST['telefone'];
            $this->contato->celular = $_POST['celular'];
            $this->contato->whatsapp = isset($_POST['whatsapp']) ? 1 : 0;
            $this->contato->notificar_email = isset($_POST['notificar_email']) ? 1 : 0;
            $this->contato->notificar_sms = isset($_POST['notificar_sms']) ? 1 : 0;

            if ($this->contato->create()) {
                header('Location: ../views/contatos/index.php');
                exit;
            } else {
                echo "Erro ao criar contato.";
            }
        }
        include '../views/contatos/create.php';
    }
}
?>
