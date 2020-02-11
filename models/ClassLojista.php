<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Models;

/**
 * Description of ClassLojista
 *
 * @author allan
 */
class ClassLojista extends ClassUsuario{
    private $empresa;
    private $loja;
    private $cnpj;
    private $permissao;
    private $id_lojista;
    private $status;
 
            function getId_lojista() {
        return $this->id_lojista;
    }

    function getStatus() {
        return $this->status;
    }

    function setId_lojista($id_lojista) {
        $this->id_lojista = $id_lojista;
    }

    function setStatus($status) {
        $this->status = $status;
    }
        
    function getEmpresa() {
        return $this->empresa;
    }

    function getCnpj() {
        return $this->cnpj;
    }
    
    function getPermissao() {
        return $this->permissao;
    }

    function getLoja() {
        return $this->loja;
    }
    
    function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

     function setPermissao($permissao) {
        $this->permissao = $permissao;
    }
    function setLoja($loja) {
        $this->loja = $loja;
    }
   
    
    
    
    
    
    public function __construct() {
        $this->permissao = "lojista";
    }

    #inserir um novo lojista
    public function insertLojista(ClassLojista $uso){
            $this->insertDB(
          "lojistas",
          "?,?,?,?,?,?,?,?,?,?,?",
                array(
                    0,
                    $uso->getNome(),
                    $uso->getEmail(),
                    $uso->getTelefone(),                    
                    $uso->getSenha(),
                    $uso->getEmpresa(),
                    $uso->getCnpj(),
                    $uso->getData_cadastro(),
                    $uso->getPermissao(),                    
                    'novo',
                    $uso->getLoja()                  
                   
                )
        );
            
        
    }
    
    
    
    #teste
    public function insertLojista2(){
            $this->insertDB(
          "lojistas",
          "?,?,?,?,?,?,?,?,?,?,?",
                array(
                    0,
                    'lojista',
                    'lojista@gmail',
                    '999999999',                    
                    'as2r',
                    'americanas',
                    '15160686703',
                    '12/11/2000',
                    'lojista',                    
                    'novo',
                    '10'
                   
                )
        );
            
        
    }
    
    
    
    public function alterStatusLojista(ClassLojista $lojista){
        $this->updateDB(
                "lojistas",
                "status = ?",
                "id_lojista = ?",
                array(
                    $lojista->getStatus(),
                    $lojista->getId_lojista()
                )
           );
    }
    
    public function alterSenha($id_lojista, $senha){
        $this->updateDB(
                "lojistas",
                "senha =?",
                "id_lojista = ?",
                array(
                    $senha,
                    $id_lojista
                )
            );
    }

        public function getLojistas(){
        $b = $this->selectDB(
                "lojistas.*, lojas.localizacao",
                "lojistas JOIN lojas on lojistas.fk_loja = lojas.id_loja",
                "",
                array(
                    
                )
            );
            return $b;
    }
    
    public function getLojista_por_id($id_lojista){
        $b = $this->selectDB( 
                "lojistas.*, lojas.id_loja, lojas.localizacao ",
                "lojistas JOIN lojas on lojistas.fk_loja = lojas.id_loja",
                "where id_lojista = ?",
                array(
                    $id_lojista
                )
            ); 
        return $b;
        
    }
    
    public function editarLojista(ClassLojista $lojista){
        $this->updateDB(  
              "lojistas",
                "nome = ?, email=?, telefone=?, empresa=?, cnpj=?, fk_loja=?",
                "id_lojista =?",
                array(
                    $lojista->getNome(),
                    $lojista->getEmail(),
                     $lojista->getTelefone(),
                     $lojista->getEmpresa(),
                     $lojista->getCnpj(),
                     $lojista->getLoja(),
                     $lojista->getId_lojista()
                )
            );
    }
   
   
    
}
