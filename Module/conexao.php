<?php
class Conexao{
    private $conexao;
    function __construct() {
        $this->conexao = new mysqli("localhost", "root", "", "geek_commerce");
        if ($this->conexao->connect_error) {
            die("Erro na conexão com o banco de dados: " . $this->conexao->connect_error);
        }
    }
    // usado em cadastro.php
    public function setAllDataAndReturnId($nome, $sobrenome, $cpf, $email, $telefone, $cep, $senha) {
        $sql = "INSERT INTO clientes (nome, sobrenome, cpf, email, telefone, cep, senha) VALUES ('$nome', '$sobrenome', '$cpf', '$email', '$telefone', '$cep', '$senha')";
        if ($this->conexao->query($sql) === TRUE) {
            $sql2 = "SELECT id FROM clientes WHERE nome='$nome' AND senha='$senha' AND sobrenome='$sobrenome' AND email='$email'";
            $result = $this->conexao->query($sql2);
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
            }
            return $id;
        } else {
            echo "Erro ao inserir no banco de dados. Tente novamente.";
        }
    }
    // usado em login.php
    public function getIdByEmailAndPassword($email, $senha) {
        $sql = "SELECT id FROM clientes WHERE email = '$email' AND senha = '$senha'";
        $result = $this->conexao->query($sql);
        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
        }
        return $id;
    }
}