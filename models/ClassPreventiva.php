<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Models;

/**
 * Description of ClassPreventiva
 *
 * @author allan
 */
class ClassPreventiva extends ClassCrud {
private $nome_preventiva;
private $descricao;
private $id_manutencao_prev;
private $prox_prev;
private $data_execucao;
private $ultima_prev;
private $loja;
private $colaborador;
private $status;
function getStatus() {
    return $this->status;
}

function setStatus($status) {
    $this->status = $status;
}

        function getId_manutencao_prev() {
    return $this->id_manutencao_prev;
}

function getProx_prev() {
    return $this->prox_prev;
}

function getData_execucao() {
    return $this->data_execucao;
}

function getUltima_prev() {
    return $this->ultima_prev;
}

function getLoja() {
    return $this->loja;
}

function getColaborador() {
    return $this->colaborador;
}

function setId_manutencao_prev($id_manutencao_prev) {
    $this->id_manutencao_prev = $id_manutencao_prev;
}

function setProx_prev($prox_prev) {
    $this->prox_prev = $prox_prev;
}

function setData_execucao($data_execucao) {
    $this->data_execucao = $data_execucao;
}

function setUltima_prev($ultima_prev) {
    $this->ultima_prev = $ultima_prev;
}

function setLoja($loja) {
    $this->loja = $loja;
}

function setColaborador($colaborador) {
    $this->colaborador = $colaborador;
}


        function getNome_preventiva() {
    return $this->nome_preventiva;
}

function getDescricao() {
    return $this->descricao;
}

function setNome_preventiva($nome_preventiva) {
    $this->nome_preventiva = $nome_preventiva;
}

function setDescricao($descricao) {
    $this->descricao = $descricao;
}


    public function novo_tipo_preventiva(ClassPreventiva $novo_tipo){
           $this->insertDB(
          "tipo_preventiva",
          "?,?,?,?",
                array(
                    0,
                   $novo_tipo->getNome_preventiva(),
                   $novo_tipo->getDescricao(),
                   "ativo"
                )
        );
    }
    
    public function alter_tipo_preventiva(ClassPreventiva $preventiva){
        $this->updateDB( 
               "tipo_preventiva",
                "nome_preventiva = ?, descricao = ?, status_preventiva = ?",
                "id_preventiva = ?",
                array(
                    $preventiva->getNome_preventiva(),
                    $preventiva->getDescricao(),
                    $preventiva->getStatus(),
                    $preventiva->getId_manutencao_prev()
                )
            );
    }

        public function getTodos_tipo_preventiva(){
         $b=$this->selectDB(
            "*",
            "tipo_preventiva" ,
            "",
            array(
                
            )
        );
        return $b;
    }
    
    // agendar um nova manutenção preventiva para uma loja
    public function agendar_preventiva(ClassPreventiva $agendar){
            $this->insertDB(
          "agenda_preventiva",
          "?,?,?,?,?",
                array(
                    0,
                    $agendar->getLoja(),
                    $agendar->getId_manutencao_prev(),
                    $agendar->getUltima_prev(),
                    $agendar->getProx_prev()
                )
        );
    }
    
    //Excluir agendamento
    public function excluirAgendamento(ClassPreventiva $preventiva){
        $this->deleteDB( 
                "agenda_preventiva",
                "id_manutencao_prev = ?", 
                array(
                    $preventiva->getId_manutencao_prev()
                )
        );
    }


    public function editar_egenda_preventiva(ClassPreventiva $preventiva){
          $this->updateDB( 
                "agenda_preventiva", 
                "ultima_prev=?, prox_prev=?", 
                "id_manutencao_prev=?",
                array(
                    $preventiva->getUltima_prev(),
                    $preventiva->getProx_prev(),
                    $preventiva->getId_manutencao_prev()
                )
        );
    }
    
    public function insertHistoricoPreventica(ClassPreventiva $preventiva){
            $this->insertDB(
          "historico_preventiva",
          "?,?,?,?,?",
                array(
                    0,
                   $preventiva->getLoja(),
                   $preventiva->getColaborador(),
                   $preventiva->getNome_preventiva(),
                   $preventiva->getUltima_prev()            
                )
        );
    }

        public function get_agenda_preventiva(){
          $b=$this->selectDB(
            "agenda_preventiva.*, lojas.localizacao , tipo_preventiva.nome_preventiva, tipo_preventiva.descricao",
            "agenda_preventiva JOIN lojas on agenda_preventiva.fk_loja = lojas.id_loja JOIN tipo_preventiva on agenda_preventiva.fk_tipo_prev = tipo_preventiva.id_preventiva" ,
            "",
            array(
                
            )
        );
        return $b;
    }
    
    public function get_historico_preventiva(){
        $b=$this->selectDB(
                "historico_preventiva.*, lojas.localizacao, tecnicos.nome_tecnico",
                "historico_preventiva JOIN lojas on historico_preventiva.fk_loja = lojas.id_loja JOIN tecnicos on historico_preventiva.fk_colaborador = tecnicos.id_tecnico",
                "",
                array(
                    
                )
        );
        return $b;
    }
    
    //verifica se já existe um agendamento para a mesma loja e tipo preventiva
    public function verificaAgendamento($loja, $id_prev){
        $b=$this->selectDB(
                "*",
                "agenda_preventiva",
                "where fk_loja = ? and fk_tipo_prev =?",
                array(
                    $loja,
                    $id_prev
                    
                )
        );
        $f=$b->fetch(\PDO::FETCH_ASSOC);
        $r=$b->rowCount();
        return $r;
    }
    

    
}
