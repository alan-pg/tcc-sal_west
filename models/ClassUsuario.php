<?php
namespace Models;





class ClassUsuario extends ClassCrud{
    
    private $nome;
    private $data_cadastro;
    private $dataNascimento;
    private $email;
    private $permissao;
    private $status;
    private $senha;
    private $cpf;
    private $telefone;
   

    
                        
    function getNome() {
        return $this->nome;
    }

    function getData_cadastro() {
        return $this->data_cadastro;
    }

    function getDataNascimento() {
        return $this->dataNascimento;
    }

    function getEmail() {
        return $this->email;
    }

    function getPermissao() {
        return $this->permissao;
    } 

    function getStatus() {
        return $this->status;
    }
    
      function getSenha() {
        return $this->senha;
    }

    function getCpf() {
        return $this->cpf;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }
    
    function getId_usuario() {
        return $this->id_usuario;
    }
    
     function getTelefone() {
        return $this->telefone;
    }

    function setData_cadastro($data_cadastro) {
        $this->data_cadastro = $data_cadastro;
    }

    function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPermissao($permissao) {
        $this->permissao = $permissao;
    } 

    function setStatus($status) {
        $this->status = $status;
    }

     function setSenha($senha) {
        $this->senha = $senha;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }
    
     function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }
    
    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    
    
    
    #Realizará a inserção no banco de dados
    public function insertUsuario(ClassUsuario $uso)
    {
        $this->insertDB(
          "users",
          "?,?,?,?,?,?,?,?,?",
                array(
                    0,
                    $uso->getNome(),
                    $uso->getEmail(),
                    $uso->getSenha(),
                    $uso->getDataNascimento(),
                    $uso->getCpf(),
                    $uso->getData_cadastro(),
                    $uso->getPermissao(),                  
                    'confirmation',
                  
                   
                )
        );
    
    }
    
    
    
    
    
    
    
    
    public function alterUsuario(ClassUsuario $uso){
        $this->updateDB( 
                "users", 
                "nome=?, email=?, cpf=?, dataNascimento=?, permissoes=?", 
                "id_usuario=?",
                array(
                    $uso->getNome(),
                    $uso->getEmail(),
                    $uso->getCpf(),
                    $uso->dataNascimento,
                    $uso->permissao,
                    $uso->getId_usuario()    
                )
        );
        
    }
    
    # Pegar todos os usuarios cadastratos
    public function getTodosUsuarios(){
        $usuarios=$this->selectDB(
                "*",
                "users",
                "",
                array(
                )
        );
        return $usuarios;
    }




    #Veriricar se já existe o mesmo email cadastro no db
public function getIssetEmail($email, $op)
{
    if($op=="funcionario"){
    $b=$this->selectDB(
        "*",
        "funcionarios",
        "where email=?",
        array(
            $email
        )
    );
    return $r=$b->rowCount();
}else{
    if($op=="lojista"){
        $b=$this->selectDB(
        "*",
        "lojistas",
        "where email=?",
        array(
            $email
        )
    );
    return $r=$b->rowCount();
        
}

    }
    
        
}    
}