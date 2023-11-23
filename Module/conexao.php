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
        $sql2 = "SELECT email FROM clientes";
        $result = $this->conexao->query($sql2);
        $emails = [];
        $count = 0;
        while ($row = $result->fetch_assoc()) {
            array_push($emails, $row['email']);
        }
        for ($i = 0; $i < sizeof($emails); $i++) {
            if ($emails[$i] === $email) {
                $count++;
            }
        }
        if ($count === 0) {
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
        } else {
            return 0;
        }
    }
    // usado em login.php
    public function getIdByEmailAndPassword($email, $senha) {
        $id = 0;
        $sql = "SELECT id FROM clientes WHERE email = '$email' AND senha = '$senha'";
        $result = $this->conexao->query($sql);
        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
        }
        return $id;
    }
    // usado em getAllData.php
    public function getAllClientesById($id) {
        $sql = "SELECT * FROM clientes WHERE id = $id";
        $result = $this->conexao->query($sql);
        $ret = [];
        while ($row = $result->fetch_assoc()) {
            $ret['nome'] = $row['nome'];
            $ret['sobrenome'] = $row['sobrenome'];
            $ret['cpf'] = $row['cpf'];
            $ret['email'] = $row['email'];
            $ret['telefone'] = $row['telefone'];
            $ret['cep'] = $row['cep'];
        }
        return $ret;
    }
    public function getAllProdutos() {
        $sql = "SELECT * FROM produtos";
        $result = $this->conexao->query($sql);
        $ret = [];
        while ($row = $result->fetch_assoc()) {
            $ret[$row['id']] = ['nome' => $row['nome'], 'custo_unitario' => $row['custo_unitario'], 'estoque' => $row['estoque'], 'categoria_id' => $row['categoria_id'], 'path_img' => $row['path_img']];
        }
        return $ret;
    }
    public function getAllCategorias() {
        $sql = "SELECT * FROM categorias";
        $result = $this->conexao->query($sql);
        $ret = [];
        while ($row = $result->fetch_assoc()) {
            $ret[$row['id']] = $row['nome'];
        }
        return $ret;
    }
}