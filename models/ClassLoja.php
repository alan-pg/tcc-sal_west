<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Models;

/**
 * Description of ClassLoja
 *
 * @author allan
 */
class ClassLoja extends ClassCrud {
    private $listaLojas;
    private $id_loja;
    private $localizacao;
    private $status;
    function getId_loja() {
        return $this->id_loja;
    }

    function getLocalizacao() {
        return $this->localizacao;
    }

    function getStatus() {
        return $this->status;
    }

    function setId_loja($id_loja) {
        $this->id_loja = $id_loja;
    }

    function setLocalizacao($localizacao) {
        $this->localizacao = $localizacao;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    public function insertLoja(ClassLoja $loja){
        $this->insertDB( 
               "lojas",
                "?,?,?", 
                array(
                    0,
                    $loja->getLocalizacao(),
                    $loja->getStatus()
                )
            );
       
    }
    
    public function alterLoja(ClassLoja $loja){
        $this->updateDB( 
                "lojas",
                "localizacao = ?, status_loja = ?",
                "id_loja = ?",
                array(
                    $loja->getLocalizacao(),
                    $loja->getStatus(),
                    $loja->getId_loja()
                )
            );
    }

        public function getLojas(){
        $l = $this->selectDB(
                "*",
                "lojas",
                "",
                array(
                )
        );
        return $l;
        
        
    }
    
    
    public function getEndereco_loja($id_loja){
         $l = $this->selectDB(
                "*",
                "loja",
                "where id_loja = ?",
                array(
                    $id_loja
                )
        );
         
        return $l;
    }
}
