<?php

namespace Models;
use Models\ClassServico;

class ClassChamado extends ClassCrud{
    private $departamento;
    private $servico;
    private $detalhes;
    private $data_criacao;
    private $id_chamado;
    private $id_usuario;
    private $id_servico;
    private $ClassServico;
    private $avaliacao;
    private $data_avaliacao;
    private $imagem;
    function getImagem() {
        return $this->imagem;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

                
    function getId_servico() {
        return $this->id_servico;
    }

    function setId_servico($id_servico) {
        $this->id_servico = $id_servico;
    }

        
    function getAvaliacao() {
        return $this->avaliacao;
    }

    function getData_avaliacao() {
        return $this->data_avaliacao;
    }

    function setAvaliacao($avaliacao) {
        $this->avaliacao = $avaliacao;
    }

    function setData_avaliacao($data_avaliacao) {
        $this->data_avaliacao = $data_avaliacao;
    }

    
    
    function getClassServico() {
        return $this->ClassServico;
    }

   

    
        function getDepartamento() {
        return $this->departamento;
    }

    function getServico() {
        return $this->servico;
    }

    function getDetalhes() {
        return $this->detalhes;
    }

    function getData_criacao() {
        return $this->data_criacao;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }
    
    function getId_chamado() {
        return $this->id_chamado;
    }

    function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }

    function setServico($servico) {
        $this->servico = $servico;
    }

    function setDetalhes($detalhes) {
        $this->detalhes = $detalhes;
    }

    function setData_criacao($data_criacao) {
        $this->data_criacao = $data_criacao;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }
    
    function setId_chamado($id_chamado) {
        $this->id_chamado = $id_chamado;
    }

    

    

    // Inserir novo chamdo na tabela chamados
     public function insertChamado(ClassChamado $chamado)
    {
        
         $this->insertDB(
          "chamados",
          "?,?,?,?,?,?,?,?,?,?,?,?",
                array(
                    0,
                    $chamado->getDepartamento(),
                    $chamado->getServico(),
                    $chamado->getDetalhes(),
                    $chamado->getImagem(),
                    $chamado->getData_criacao(),
                    null,
                    "novo",
                    $chamado->getId_usuario(),
                    null,
                    null,
                    null
                )
        );

     
    }
    
    



    #Editar chamado
    
    public function AlterChamado($arrVar){
          $this->updateDB( 
                "chamados", 
                "departamento=?, servico=?, detalhes=?", 
                "id_chamado=?",
                array(
                    $arrVar['departamento'],
                    $arrVar['nome_servico'],
                    $arrVar['detalhes'],
                    $arrVar['id_chamado']
                )
        );
    }
    
    
    
        #Editar detalhe chamado
    
    public function Alterdetalhe(ClassChamado $chamado){
          $this->updateDB( 
                "chamados", 
                "detalhes=?", 
                "id_chamado=?",
                array(                    
                    $chamado->getDetalhes(),
                    $chamado->getId_chamado()
                )
        );
    }
    
    
    
    //Alterar status do chamado
    public function alterStatus($status, $id_chamado){
         $this->updateDB( 
                "chamados", 
                "status=?", 
                "id_chamado=?",
                array(
                    $status,
                    $id_chamado
                )
        );
    }


    // pegar todos os chamados
        public function getTodos_chamados()
    {
        $b=$this->selectDB(
            "chamados.*, lojistas.nome, lojistas.empresa, lojas.localizacao, departamento.nome_departamento ",
            "chamados JOIN lojistas ON chamados.fk_lojista = lojistas.id_lojista JOIN lojas ON lojistas.fk_loja = lojas.id_loja JOIN departamento ON chamados.departamento = departamento.id_departamento" ,
            "",
            array(
                
            )
        );
        return $b;
    }
    
    
    // pegar todos os chamados e seus serviços
    public function getTodos_chamados_servicos(){
        $b=$this->selectDB(
            "chamados.*, lojistas.nome, lojas.localizacao, servicos.*, tecnicos.nome_tecnico ",
            "chamados JOIN lojistas ON chamados.fk_lojista = lojistas.id_lojista JOIN lojas ON lojistas.fk_loja = lojas.id_loja JOIN servicos ON chamados.id_chamado = servicos.fk_chamado JOIN tecnicos on servicos.fk_tecnico = tecnicos.id_tecnico" ,
            "",
            array(
                
            )
        );
        return $b;
    }

    // pegar todos os dados do chamado e ordens de serviço pelo id_chamado
    public function getChamado_servico_por_id_chamado($id_chamado){
        $b=$this->selectDB(
            "chamados.*, lojistas.nome, lojas.localizacao, servicos.*, tecnicos.nome_tecnico, tecnicos.id_tecnico, funcionarios.nome ",
            "chamados JOIN lojistas ON chamados.fk_lojista = lojistas.id_lojista JOIN lojas ON lojistas.fk_loja = lojas.id_loja JOIN servicos ON chamados.id_chamado = servicos.fk_chamado JOIN tecnicos on servicos.fk_tecnico = tecnicos.id_tecnico JOIN funcionarios ON servicos.fk_encarregado = funcionarios.id_funcionario" ,
            "where id_chamado = ?",
            array(
                $id_chamado
            )
        );
        return $b;
    }



    #Buscar dados apenas do chamado por id do usuario
    public function getChamado_por_id_lojista($id_lojista){
       $chamados=$this->selectDB(
                "chamados.*, lojistas.nome, departamento.nome_departamento ",
                "chamados JOIN lojistas ON chamados.fk_lojista = lojistas.id_lojista JOIN departamento ON chamados.departamento = departamento.id_departamento",
                "where chamados.fk_lojista=?",
                array(
                    $id_lojista
                )
        );
        return $chamados;  
    }
    
    
    //Buscar dados do chamado e dados da ordem de serviço por id do usuário
    public function getChamdo_servico_por_id_lojista($id_lojista){
         $chamados=$this->selectDB(
                "chamados.*, lojistas.nome ",
                "chamados JOIN lojistas ON chamados.fk_lojista = lojistas.id_lojista",
                "where chamados.fk_lojista=?",
                array(
                    $id_lojista
                )
        );
        return $chamados; 
    }
    
    
    
    //Buscar chamados por status
    public function getChamados_por_status($status){
        $b = $this->selectDB(
                "*",
                "chamados",
                "where status = ?",
                array(
                    $status
                )
            );
        return $b;
    }



// inserte dados (data e hora agendada para o serviço e técnico responsável) na tabela serviços
    public function responderChamado($data_execucao, $hora_execucao, $tec_responsavel, $id_chamado,$end_loja, $enca_responsavel){
        $this->ClassServico = new ClassServico();
        
        $this->ClassServico->setId_chamado($id_chamado);
        $this->ClassServico->setEnca_responsavel($enca_responsavel);
        $this->ClassServico->setData_execucao($data_execucao);
        $this->ClassServico->setHora_execucao($hora_execucao);
        $this->ClassServico->setEndereco_loja($end_loja);
        $this->ClassServico->setTec_responsavel($tec_responsavel);
        
        $this->ClassServico->insertServico($this->ClassServico);
    }
    
    // insera uma data de finalização do chamado na tabela chamado
    public function finalizarChamado($id_chamado, $data_finalizado){
          $this->updateDB( 
                "chamados", 
                "data_finalizado=?", 
                "id_chamado=?",
                array(
                    $data_finalizado,
                    $id_chamado
                )
        );
    }
    // insere uma data de finalizacao e detalhes do serviço finalizado na tabela serviços
    public function finalizarServico_do_chamado($id_servico,$data_finalizado,$detalhes){
                $this->ClassServico = new ClassServico();
                $this->ClassServico->finalizarServico($id_servico, $data_finalizado, $detalhes);

    }    
    // Avalir chamado
    public function avaliar_Chamado(ClassChamado $chamado){
           $this->updateDB( 
                "chamados", 
                "avaliacao=?, data_avaliacao=?", 
                "id_chamado=?",
                array(
                    $chamado->getAvaliacao(),
                    $chamado->getData_avaliacao(),
                    $chamado->getId_chamado()
                )
        );
    }
    //Reabrir chamado
    public function reabrir_chamado(ClassChamado $chamado){
        $this->updateDB(
                "chamados",
                "status = ?, reaberto=?", 
                "id_chamado=?",
                array(
                    "reaberto",
                    true,                    
                    $chamado->getId_chamado()
                )
                );        
    }
    
    //Inserir motivo do serviço ser reaberto
    public function reabrir_servico(ClassChamado $chamado){
        $this->ClassServico = new ClassServico();
        $this->ClassServico->servicoReaberto($chamado->getId_servico(), $chamado->getDetalhes());        
    }
    
    //Editar dados da ordem de serviço
    public function editarSevico($id_tecnico, $data_execucao, $hora_execucao, $id_servico){
        $this->ClassServico = new ClassServico();
        $this->ClassServico->setTec_responsavel($id_tecnico);
        $this->ClassServico->setData_execucao($data_execucao);
        $this->ClassServico->setHora_execucao($hora_execucao);        
        $this->ClassServico->setId_servico($id_servico);
        
        $this->ClassServico->alterServico($this->ClassServico);
    }
    
    }
    

        
