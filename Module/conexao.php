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
    // usado em getCarrinho.php
    public function getCarrinho($id) {
        $sql = "SELECT * FROM carrinho WHERE cliente_id=$id;";
        $result = $this->conexao->query($sql);
        $ret = [];
        while ($row = $result->fetch_assoc()) {
            array_push($ret, ['id' => $row['id'], 'nome' => $row['nome'], 'custo_unitario' => $row['custo_unitario'], 'frete' => $row['frete'], 'quantidade' => $row['quantidade'], 'path_img' => $row['path_img']]);
        }
        return $ret;
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
            $ret[$row['id']] = ['nome' => $row['nome'], 'custo_unitario' => $row['custo_unitario'], 'estoque' => $row['estoque'], 'categoria_id' => $row['categoria_id'], 'path_img' => $row['path_img'], 'descricao' => $row['descricao']];
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
    // usado em setCarrinho.php
    public function setCarrinho($id, $produtoId, $frete, $quantidade) {
        $sql2 = "SELECT * FROM  produtos WHERE id=$produtoId";
        $result2 = $this->conexao->query($sql2);
        $data = [];
        while ($row = $result2->fetch_assoc()) {
            $data['nome'] = $row['nome'];
            $data['custo_unitario'] = $row['custo_unitario'];
            $data['estoque'] = $row['estoque'];
            $data['path_img'] = $row['path_img'];
        }
        $sql = "INSERT INTO carrinho (cliente_id, nome, custo_unitario, frete, quantidade, `path_img`) VALUE ($id, '".$data['nome']."', ".$data['custo_unitario'].", $frete, $quantidade, '".$data['path_img']."');";
        $this->conexao->query($sql);
    }
    // usado em deletProdutoInCarrinho.php
    public function deletProduto($id) {
        $sql = "DELETE FROM carrinho WHERE id=$id";
        $this->conexao->query($sql);
    }
    // usado em alterUser.php
    public function alterDataUser($id, $nome, $sobrenome, $cep, $telefone, $email, $senha) {
        $sql = "UPDATE clientes SET ";
        if ($nome !== '') {
            $sql .= ($sobrenome !== '' || $cep !== '' || $telefone !== '' || $email !== '' || $senha !== '') ? "nome = '$nome', " : "nome = '$nome' ";
        }
        if ($sobrenome !== '') {
            $sql .= ($cep !== '' || $telefone !== '' || $email !== '' || $senha !== '') ? "sobrenome = '$sobrenome', " : "sobrenome = '$sobrenome' ";
        }
        if ($cep !== '') {
            $sql .= ($telefone !== '' || $email !== '' || $senha !== '') ? "cep = '$cep', " : "cep = '$cep' ";
        }
        if ($telefone !== '') {
            $sql .= ($email !== '' || $senha !== '') ? "telefone = '$telefone', " : "telefone = '$telefone' ";
        }
        if ($email !== '') {
            $sql .= ($senha !== '') ? "email = '$email', " : "email = '$email' ";
        }
        if ($senha !== '') {
            $sql .= "senha = '$senha' ";
        }

        $sql .= "WHERE id=$id;";
        $this->conexao->query($sql);
    }
}