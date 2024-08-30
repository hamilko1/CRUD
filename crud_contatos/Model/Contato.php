<?php
class Contato {
    private $conn;
    private $table_name = "contatos";

    public $id; 
    public $nome_completo;
    public $email;
    public $data_nascimento;
    public $profissao;
    public $telefone;
    public $celular;
    public $whatsapp;
    public $notificar_email;
    public $notificar_sms;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nome_completo=:nome_completo, email=:email, data_nascimento=:data_nascimento, profissao=:profissao, telefone=:telefone, celular=:celular, whatsapp=:whatsapp, notificar_email=:notificar_email, notificar_sms=:notificar_sms";

        $stmt = $this->conn->prepare($query);

        $this->nome_completo = htmlspecialchars(strip_tags($this->nome_completo));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->data_nascimento = htmlspecialchars(strip_tags($this->data_nascimento));
        $this->profissao = htmlspecialchars(strip_tags($this->profissao));
        $this->telefone = htmlspecialchars(strip_tags($this->telefone));
        $this->celular = htmlspecialchars(strip_tags($this->celular));
        $this->whatsapp = htmlspecialchars(strip_tags($this->whatsapp));
        $this->notificar_email = htmlspecialchars(strip_tags($this->notificar_email));
        $this->notificar_sms = htmlspecialchars(strip_tags($this->notificar_sms));

        $stmt->bindParam(":nome_completo", $this->nome_completo);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":data_nascimento", $this->data_nascimento);
        $stmt->bindParam(":profissao", $this->profissao);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":celular", $this->celular);
        $stmt->bindParam(":whatsapp", $this->whatsapp);
        $stmt->bindParam(":notificar_email", $this->notificar_email);
        $stmt->bindParam(":notificar_sms", $this->notificar_sms);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nome_completo = $row['nome_completo'];
        $this->email = $row['email'];
        $this->data_nascimento = $row['data_nascimento'];
        $this->profissao = $row['profissao'];
        $this->telefone = $row['telefone'];
        $this->celular = $row['celular'];
        $this->whatsapp = $row['whatsapp'];
        $this->notificar_email = $row['notificar_email'];
        $this->notificar_sms = $row['notificar_sms'];
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nome_completo = :nome_completo, email = :email, data_nascimento = :data_nascimento, profissao = :profissao, telefone = :telefone, celular = :celular, whatsapp = :whatsapp, notificar_email = :notificar_email, notificar_sms = :notificar_sms WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $this->nome_completo = htmlspecialchars(strip_tags($this->nome_completo));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->data_nascimento = htmlspecialchars(strip_tags($this->data_nascimento));
        $this->profissao = htmlspecialchars(strip_tags($this->profissao));
        $this->telefone = htmlspecialchars(strip_tags($this->telefone));
        $this->celular = htmlspecialchars(strip_tags($this->celular));
        $this->whatsapp = htmlspecialchars(strip_tags($this->whatsapp));
        $this->notificar_email = htmlspecialchars(strip_tags($this->notificar_email));
        $this->notificar_sms = htmlspecialchars(strip_tags($this->notificar_sms));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":nome_completo", $this->nome_completo);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":data_nascimento", $this->data_nascimento);
        $stmt->bindParam(":profissao", $this->profissao);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":celular", $this->celular);
        $stmt->bindParam(":whatsapp", $this->whatsapp);
        $stmt->bindParam(":notificar_email", $this->notificar_email);
        $stmt->bindParam(":notificar_sms", $this->notificar_sms);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
