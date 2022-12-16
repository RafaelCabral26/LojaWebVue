<?php
//include "./Usuario.php";
include_once "./service/DAO.php";
class Endereco
{
    public $cep;
    public $logradouro;
    public $bairro;
    public $cidade;
    public $uf;
    
    function add() 
    {
        try {
            $dao = new DAO;
            $conn = $dao->conecta();
            $sql = "INSERT into endereço (cep, logradouro, bairro, cidade, uf) VALUES (:cep, :logradouro, :bairro, :cidade, :uf)";
            $stman = $conn->prepare($sql);
            $stman->bindParam(":cep", $this->cep);
            $stman->bindParam(":logradouro", $this->logradouro);
            $stman->bindParam(":bairro", $this->bairro);
            $stman->bindParam(":cidade",$this->cidade);
            $stman->bindParam(":uf", $this->uf);
            $stman->execute();

        } catch (Exception $e) {
            throw new Exception("Erro ao cadastrar o endereço!" . $e->getMessage());
        }

    }


        function get($cep) 
        {
            try {
                $dao = new DAO;
                $conn = $dao->conecta();
                $sql = "SELECT * from endereço where endereço.cep = :cep";
                $stman = $conn->prepare($sql);
                $stman->bindParam(":cep", $cep);
                $stman->execute();
                $result = $stman->fetchAll();
                return $result;
    
            } catch (Exception $e) {
                throw new Exception("Erro ao cadastrar o endereço!" . $e->getMessage());
            }
        
        
    }

    function update($idcep) 
    {
        try {
            $dao = new DAO;
            $conn = $dao->conecta();
            $sql = "UPDATE endereço SET 
                cep = :novocep, 
                logradouro = :logradouro,
                bairro = :bairro,
                cidade = :cidade,
                uf = :uf
                WHERE endereço.cep = :idcep";
            $stman = $conn->prepare($sql);
            $stman->bindParam(":novocep", $this->cep);
            $stman->bindParam(":logradouro", $this->logradouro);
            $stman->bindParam(":bairro", $this->bairro);
            $stman->bindParam(":cidade",$this->cidade);
            $stman->bindParam(":uf", $this->uf);
            $stman->bindParam(":idcep", $idcep);
            $stman->execute();

        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar" . $e->getMessage());
        }
    }
    
    function delete($idcep) {
        try {
            $dao = new DAO;
            $conn = $dao->conecta();
            $sql = "DELETE from endereço where endereço.cep = :cep";
            $stman = $conn->prepare($sql);
            $stman->bindParam(":cep", $idcep);
            $stman->execute();
        } catch (Exception $e) {
            throw new Exception("Erro ao deletar" . $e->getMessage());
        }
}
}
    ?>