<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Models;

/**
 * Description of ClassFuncionario
 *
 * @author allan
 */
class ClassFuncionario extends ClassUsuario{
    private $cpf;
    private $cargo;
    private $area;
    private $id_colaborador;
    function getId_colaborador() {
        return $this->id_colaborador;
    }

    function setId_colaborador($id_colaborador) {
        $this->id_colaborador = $id_colaborador;
    }

                function getArea() {
        return $this->area;
    }

    function setArea($area) {
        $this->area = $area;
    }

                    
    function getCargo() {
        return $this->cargo;
    }

        function getCpf() {
        return $this->cpf;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }
    
    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    public function insertNovo_tecnico(ClassFuncionario $tecnico){
          $this->insertDB(
          "tecnicos",
          "?,?,?,?,?,?,?",
                array(
                    0,        
                    $tecnico->getNome(),
                    $tecnico->getCpf(),
                    $tecnico->getEmail(),
                    $tecnico->getTelefone(),
                    $tecnico->getCargo(),
                    $tecnico->getStatus()                                                     
                   
                )
        );
    }
    
    public function getTodos_tecnicos(){
        $tecnicos = $this->selectDB(
                "*", 
                "tecnicos",
                "", 
                array(  
                    
                )
                
        );
        return $tecnicos;
    }
    
    public function alterColaborador(ClassFuncionario $colaborador){
        $this->updateDB( 
               "tecnicos",
                "nome_tecnico = ?, cpf=?, email_tecnico = ?, tel_tecnico = ?, area_tecnico = ?, status_tecnico = ?",
                "id_tecnico = ?",
                array(
                    $colaborador->getNome(),
                    $colaborador->getCpf(),
                    $colaborador->getEmail(),
                    $colaborador->getTelefone(),
                    $colaborador->getArea(),
                    $colaborador->getStatus(),
                    $colaborador->getId_colaborador()
                    
                )
           );
    }
    
    public function getFuncionarios(){
        $b = $this->selectDB( 
                "*",
                "funcionarios", 
                "",
                array(
                    
                )                
            );
        return $b;
    }
    
    public function editarFuncionario(ClassFuncionario $funcionario){
        $this->updateDB( 
                "funcionarios",
                "nome=?, email=?, telefone=?, status=?",
                "id_funcionario = ?", 
                array(
                    $funcionario->getNome(),
                    $funcionario->getEmail(),
                    $funcionario->getTelefone(),
                    $funcionario->getStatus(),
                    $funcionario->getId_usuario()
                )
            );
    }


}
