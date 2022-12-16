<?php
include_once "./service/DAO.php";

class Usuario
{
    public $id_usuario;
    public $nome;
    public $cpf;
    public $email;
    public $senha;
    public $telefone;
    public $data_nasc;
    public $active = true;

    public function add()
    {
        try {
            $dao = new DAO;
            $conecta = $dao->conecta();
            $sql = "INSERT into usuario (nome, cpf, email, senha, telefone, data_nasc) VALUES (:nome, :cpf, :email, :senha, :telefone, :data_nasc)";
            $criptSenha = crypt($this->senha, '$5$rounds=5000$' . 'GOELK43650gr' . '$');

            $stman = $conecta->prepare($sql);
            $stman->bindParam(":nome", $this->nome);
            $stman->bindParam(":cpf", $this->cpf);
            $stman->bindParam(":email", $this->email);
            $stman->bindParam(":data_nasc", $this->data_nasc);
            $stman->bindParam(":senha", $criptSenha);
            $stman->bindParam(":telefone", $this->telefone);
            $stman->execute();
        } catch (Exception $e) {
            throw new Exception("Erro ao cadastrar usuario!!!" . $e->getMessage());
        }
    }
    function getAll()
    {
        try {
            $dao = new DAO;
            $conn = $dao->conecta();
            $sql = "SELECT id_usuario, nome, cpf, email, senha, telefone, data_nasc, active FROM usuario";
            $stman = $conn->prepare($sql);
            $stman->execute();
            $result = $stman->fetchAll();
            return $result;
        } catch (Exception $e) {

            throw new Exception("Erro ao listar os usuarios!!!" . $e->getMessage());
        }
    }

    function get($id)
    {
        try {
            $dao = new DAO;
            $conn = $dao->conecta();
            $sql = "SELECT id_usuario,nome, cpf, email, telefone, data_nasc, active
            from usuario where id_usuario=:id
            and usuario.active = true";
            $stman = $conn->prepare($sql);
            $stman->bindParam(':id', $id);
            $stman->execute();
            $result = $stman->fetchAll();
            return $result;
        } catch (Exception $e) {
            throw new Exception("Erro ao buscar usuario! " . $e->getMessage());
        }
    }
    function update($id)
    {
        try {

            $dao = new DAO;
            $conn = $dao->conecta();
            $sql = "UPDATE nome, cpf, email, telefone, data_nasc, id_usuario
        from usuario where id_usuario = :id and usuario.active = true";
            $stman =  $conn->prepare($sql);
            $stman->bindParam(":id", $id);
            $stman->bindParam(":nome", $this->nome);
            $stman->bindParam(":cpf", $this->cpf);
            $stman->bindParam(":email", $this->email);
            $stman->bindParam(":telefone", $this->telefone);
            $stman->bindParam(":data_nasc", $this->data_nasc);
            $stman->execute();
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar usuario!" . $e->getMessage());
        }
    }
    function delete($id)
    {
        try {

            $dao = new DAO;
            $conn = $dao->conecta();
            $sql = "DELETE from usuario where usuario.id_usuario = :id";
            $stman = $conn->prepare($sql);
            $stman->bindParam(":id", $id);
            $stman->execute();
            } catch (Exception $e) {
                throw new Exception("Erro ao deletar usuario" . $e->getMessage());
            }
    }

    function deleteLogico($id) 
    {
        try {

            $dao = new DAO;
            $conn = $dao->conecta();
            $sql = "UPDATE usuario set usuario.active = false where usuario.id_usuario = :id ";
            $stman = $conn->prepare($sql);
            $stman->bindParam(":id", $id);
            $stman->execute();
            echo "Delete lógico concluido!";
        } catch (Exception $e) {
            throw new Exception("Erro no delete lógico" . $e->getMessage());
        }
        
    }
}
