<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Models;

/**
 * Description of ClassInformativo
 *
 * @author allan
 */
class ClassInformativo extends ClassCrud {
    private $id_informativo;
    private $assunto;
    private $mensagem;
    private $data_expiracao;
    function getId_informativo() {
        return $this->id_informativo;
    }

    function getAssunto() {
        return $this->assunto;
    }

    function getMensagem() {
        return $this->mensagem;
    }

    function getData_expiracao() {
        return $this->data_expiracao;
    }

    function setId_informativo($id_informativo) {
        $this->id_informativo = $id_informativo;
    }

    function setAssunto($assunto) {
        $this->assunto = $assunto;
    }

    function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }

    function setData_expiracao($data_expiracao) {
        $this->data_expiracao = $data_expiracao;
    }

        

    public function insertInformativo(ClassInformativo $informativo){
        $this->insertDB(
                "informativos",
                "?,?,?,?",
                array(
                    0,
                    $informativo->getAssunto(),
                    $informativo->getMensagem(),
                    $informativo->getData_expiracao()
                    
                )
        );
    }
    
    public function getInformativos($data_hoje){
        $b=$this->selectDB(
            "*",
            "informativos",
            "where data_expiracao >= ?", 
            array(
               $data_hoje
            )
        );
        return $b;
    }
    
    public function editarInformativo(ClassInformativo $informativo){
        $this->updateDB(
                "informativos",
                "assunto=?, conteudo=?, data_expiracao=?",
                "id_informativo=?",
                array(
                    $informativo->getAssunto(),
                    $informativo->getMensagem(),
                    $informativo->getData_expiracao(),
                    $informativo->getId_informativo()
                )
            );
    }
}