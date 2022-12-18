<?php

include_once "./service/DAO.php";

class Produto
{
    public $nome;
    public $descricao;
    public $quant;
    public $data_alteracao;
    public $valor;
    public $largura;
    public $altura;
    public $comprimento;
    public $peso;
    public $fotos;
    public $ativo;

    function add() 
    {
       try {

           $dao = new DAO;
           $conn = $dao->conecta();
        $sql = "INSERT into produtos (nome,descricao,quant,data_alteracao,valor,largura,altura,comprimento,peso,fotos) VALUES (:nome,:descricao,:quant,:data_alteracao,:valor,:largura,:altura,:comprimento,:peso,:fotos)";
        $stman = $conn->prepare($sql);
        $stman->bindParam(":nome", $this->nome);
        $stman->bindParam(":descricao", $this->descricao);
        $stman->bindParam(":quant", $this->quant);
        $stman->bindParam(":data_alteracao", $this->data_alteracao);
        $stman->bindParam(":valor", $this->valor);
        $stman->bindParam(":largura", $this->largura);
        $stman->bindParam(":altura", $this->altura);
        $stman->bindParam(":comprimento", $this->comprimento);
        $stman->bindParam(":peso", $this->peso);
        $stman->bindParam(":fotos", $this->fotos);
        $stman->execute();
        }catch (Exception $e) {
            throw new Exception("Erro ao add produto" . $e->getMessage());
        }

    }
    function get($nome) 
    {
        try 
        {
            $dao = new DAO;
            $conn = $dao->conecta();
            $sql = "SELECT nome,descricao,quant,data_alteracao,valor,largura,altura,comprimento,peso,fotos from produtos
            where nome = :nome";
            $stman = $conn->prepare($sql);
            $stman->bindParam(":nome", $nome);
            $stman->execute();
            $result = $stman->fetchAll();
            return $result;

        }catch (Exception $e) {
            throw new Exception("Erro ao buscar produto" . $e->getMessage());
        }
    }

    function getAll()
    {
        try {
            $dao = new DAO();
            $conn = $dao->conecta();
            $sql = "SELECT * from produtos";
            $stman = $conn->prepare($sql);
            $stman->execute();
            $result = $stman->fetchAll();
            echo json_encode($result);
            return $result;
        } catch (Exception $e) {
            throw new Exception("Erro ao cadastra o endereço!" . $e->getMessage());
        }
    }




    function update($nome) {
        $dao = new DAO;
        $conn = $dao->conecta();
        $sql = "UPDATE produtos SET nome = :nome,
        descricao = :descricao
        ,quant = :quant,
        data_alteracao = :data_alteracao,
        valor = :valor,
        largura = :largura,
        altura = :altura,
        comprimento = :comprimento,
        peso = :peso,
        fotos = :fotos
        where produtos.nome = :antigonome";
        $stman = $conn->prepare($sql);
        $stman->bindParam(":antigonome", $nome);
        $stman->bindParam(":nome", $this->nome);
        $stman->bindParam(":descricao", $this->descricao);
        $stman->bindParam(":quant", $this->quant);
        $stman->bindParam(":data_alteracao", $this->data_alteracao);
        $stman->bindParam(":valor", $this->valor);
        $stman->bindParam(":largura", $this->largura);
        $stman->bindParam(":altura", $this->altura);
        $stman->bindParam(":comprimento", $this->comprimento);
        $stman->bindParam(":peso", $this->peso);
        $stman->bindParam(":fotos", $this->fotos);
        $stman->execute();
    }

    function deleteLogico($nome) {
        try {

            $dao = new DAO;
            $conn = $dao->conecta();
        $sql = "UPDATE produtos set produtos.ativo = true where produtos.nome = :nome";
        $stman = $conn->prepare($sql);
        $stman->bindParam(":nome",$nome);
        $stman->execute();
        echo "Delete logico concluido!";
        }catch (Exception $e) {
            throw new Exception("Erro no delete logico" . $e->getMessage());
        }
    }




}


?>