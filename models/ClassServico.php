<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Models;
use Models\ClassLoja;

/**
 * Description of ClassServico
 *
 * @author allan
 */
class ClassServico extends ClassCrud{
    private $departamento;
    private $sub_departamento;
    private $id_departamento;
    private $id_sub_departamento;
    private $id_chamado;
    private $id_servico;
    private $data_execucao;
    private $hora_execucao;
    private $tec_responsavel;
    private $enca_responsavel;
    private $endereco_loja;
    function getId_servico() {
        return $this->id_servico;
    }

    function setId_servico($id_servico) {
        $this->id_servico = $id_servico;
    }

                
    function getEndereco_loja() {
        return $this->endereco_loja;
    }

    function setEndereco_loja($endereco_loja) {
        $this->endereco_loja = $endereco_loja;
    }

    
                
    function getId_chamado() {
        return $this->id_chamado;
    }

    function setId_chamado($id_chamado) {
        $this->id_chamado = $id_chamado;
    }

        function getData_execucao() {
        return $this->data_execucao;
    }

    function getHora_execucao() {
        return $this->hora_execucao;
    }

    function getTec_responsavel() {
        return $this->tec_responsavel;
    }

    function getEnca_responsavel() {
        return $this->enca_responsavel;
    }    

    function getDepartamento() {
        return $this->departamento;
    }

    function getSub_departamento() {
        return $this->sub_departamento;
    }

    function getId_departamento() {
        return $this->id_departamento;
    }

    function getId_sub_departamento() {
        return $this->id_sub_departamento;
    }

    function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }

    function setSub_departamento($sub_departamento) {
        $this->sub_departamento = $sub_departamento;
    }

    function setId_departamento($id_departamento) {
        $this->id_departamento = $id_departamento;
    }

    function setId_sub_departamento($id_sub_departamento) {
        $this->id_sub_departamento = $id_sub_departamento;
    }

    function setData_execucao($data_execucao) {
        $this->data_execucao = $data_execucao;
    }

    function setHora_execucao($hora_execucao) {
        $this->hora_execucao = $hora_execucao;
    }

    function setTec_responsavel($tec_responsavel) {
        $this->tec_responsavel = $tec_responsavel;
    }

    function setEnca_responsavel($enca_responsavel) {
        $this->enca_responsavel = $enca_responsavel;
    }
    
    
    public function insertDepartamento(ClassServico $servico){
           $this->insertDB(
          "departamento",
          "?,?",
                array(
                    0,
                    $servico->getDepartamento()                   
                               
                )
        );
    }
    
    public function getTodosDepartamentos(){
        
          $departamentos=$this->selectDB(
                "*",
                "departamento",
                "",
                array(
                )
        );
          return $departamentos;
    }
    // inserir um novo tipo de sub serviço
    public function insertSub_departamento(ClassServico $servico){
          $this->insertDB(
          "sub_departamento",
          "?,?,?",
                array(
                    0,
                    $servico->getSub_departamento(),
                    $servico->getId_departamento(),
                                       
                     
                )
        );
    }
    // retorna os sub serviçoes de um departamento
    public function getSub_departamentos_por_id_departamento($id_departamento){
         $sub_dep=$this->selectDB(
                "*",
                "sub_departamento",
                "where fk_departamento = ?",
                array(
                    $id_departamento
                )
        );
        return $sub_dep;
    }
       // inserir novo serviço
    public function insertServico(ClassServico $servico){
        $this->insertDB(
          "servicos",
          "?,?,?,?,?,?,?,?,?,?",
                array(
                    0,
                    $servico->getId_chamado(),
                    $servico->getTec_responsavel(),
                    $servico->getEnca_responsavel(),
                    $servico->getData_execucao(),
                    $servico->getHora_execucao(),
                    $servico->getEndereco_loja(),
                    null,
                    null,
                    null
                )
        );
    }
    
    //Editar dados do serviço
    public function alterServico(ClassServico $servico){
        $this->updateDB( 
                "servicos",
                "fk_tecnico=?, data_execucao=?, hora_execucao=?",
                "id_servico=?",
                array(
                    $servico->getTec_responsavel(),
                    $servico->getData_execucao(),
                    $servico->getHora_execucao(),
                    $servico->getId_servico()
                )
        );
        
    }


    public function finalizarServico($id_servico,$data_finalizado,$detalhes){
           $this->updateDB( 
                "servicos", 
                "data_finalizacao=?, detalhes_servico=?", 
                "id_servico=?",
                array(
                    $data_finalizado,
                    $detalhes,
                    $id_servico
                )
        );
    }
    
    
    // inserir detalhes do motivo do serviço reaberto
    public function servicoReaberto($id_servico, $detalhes){
        $this->updateDB(
                "servicos",
                "motivo_reaberto=?",
                "id_servico = ?",
                array(
                    $detalhes,
                    $id_servico
                )                    
        );
        
    }
    
}
