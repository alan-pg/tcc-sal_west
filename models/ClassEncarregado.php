<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Models;

/**
 * Description of ClassEncarregado
 *
 * @author allan
 */
class ClassEncarregado extends ClassFuncionario {
    
    public function __construct() {
        $this->setPermissao("encarregado");
    }

    
       public function insertEncarregado(ClassEncarregado $usu){
            $this->insertDB(
          "funcionarios",
          "?,?,?,?,?,?,?,?,?,?",
                array(
                    0,                    
                    $usu->getNome(),
                    $usu->getEmail(),
                    $usu->getTelefone(),                    
                    $usu->getSenha(),
                    $usu->getCpf(),                    
                    $usu->getCargo(),
                    $usu->getPermissao(),  
                    $usu->getData_cadastro(),
                    $usu->getStatus()                                  
                   
                )
        );
        
    }
   

}
