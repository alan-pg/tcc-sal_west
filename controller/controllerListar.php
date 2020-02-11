<?php

namespace Controllers;
use Models\ClassCrud;
use Models\ClassServico;
use Models\ClassLoja;
use Models\ClassChamado;
use Models\ClassFuncionario;
use Models\ClassPreventiva;
use Models\ClassInformativo;
use Models\ClassLojista;
class ControllerListar extends ClassCrud{
    
    
    private $lojas;
    private $servico;
    private $chamado;
    private $funcionario;
    private $preventiva;
    private $informativo;
    private $lojista;
    public function __construct() {
        $this->servico = new ClassServico();
        $this->lojas = new ClassLoja();
        $this->chamado = new ClassChamado();
        $this->funcionario = new ClassFuncionario();
        $this->preventiva = new ClassPreventiva();
        $this->informativo = new ClassInformativo();
        $this->lojista = new ClassLojista();
        
    }


// listar todos os usuários
    public function listarLojistas() {
        return $this->lojista->getLojistas(); 
    }
    
    //Listar dados do lojista por id lojista
    public function listarDados_lojista($id_lojista){
        return $this->lojista->getLojista_por_id($id_lojista);
    }


    // Listar todos os funcionários
    public function listarFuncionarios(){
        return $this->funcionario->getFuncionarios();
    }

    //listar todos os Chamados
    public function listarTodos_Chamados(){
        return $this->chamado->getTodos_chamados();
    }
    
    

        // listar todos os chamados e dados de suas ordens de serviço
    public function listarTodos_chamados_servico(){
        return $this->chamado->getTodos_chamados_servicos();
    }

    // listar os dados dos servicos de um chamado por id do chamado
    public function listarServicos_por_id_chamado($id_chamado){
        return $this->chamado->getChamado_servico_por_id_chamado($id_chamado);
    }

    
    //listar apemas os dados do chamado
    public function listarChamados_por_id_lojista($id_lojista){
        return $this->chamado->getChamado_por_id_lojista($id_lojista);
    }
    //listar dados do chamado e dados da ordem de serviço
    public function listarChamdos_servico_id_lojista(){
        
    }

    
    // Listar chamdos por tipo de status
    public function listarChamadosPorStatus($status){
        return $this->chamado->getChamados_por_status($status);
    }

    // listar todos os departamentos de serviço
   public function listarDepartamentos() {
       return $this->servico->getTodosDepartamentos();       
    }
    
    
    // Listar todos os serviços por id do departamento
    public function listarSubCategoria($id_departamento) {
        return $this->servico->getSub_departamentos_por_id_departamento($id_departamento);        
    }
    
    // Listar todos os tipos de manutenção preventiva
     public function listarTipoPreventiva(){
         return $this->preventiva->getTodos_tipo_preventiva();
     }


     //Listar agendamentos de preventiva
     public function listarAgendaPreventiva(){
         return $this->preventiva->get_agenda_preventiva();
     }

     
     //Listar histórico de manutenção preventiva
     public function listarHistoricoPreventiva(){
         return $this->preventiva->get_historico_preventiva();
     }



     //listar lojas
    public function listarLojas(){
        return $this->lojas->getLojas();
    }
    
    public function listarTenicos(){
        return $this->funcionario->getTodos_tecnicos();
    }
    
    //Listar informativos não expirados
    public function listarInformativosAtivos($data_hoje){
        return $this->informativo->getInformativos($data_hoje);
    }
    public function listarTotalUsuarios(){
        $l = $this->selectDB( 
                "COUNT(id_lojista) as qtd_lojistas",
                "lojistas",
                "where status = 'ativo'",
                array(
                    
                )
            );
        
         $n = $this->selectDB( 
                "COUNT(id_lojista) as qtd_novos",
                "lojistas",
                "where status = 'novo'",
                array(
                    
                )
            );
        
        $f = $this->selectDB( 
                "COUNT(id_funcionario) as qtd_funcionarios",
                "funcionarios",
                "WHERE cargo = 'encarregado' and status = 'ativo'",
                array(
                    
                )
            );
        
        $c = $this->selectDB( 
                "COUNT(id_tecnico) as qtd_colaboradores",
                "tecnicos",
                "WHERE status_tecnico = 'ativo'",
                array(
                    
                )
            );
        $lojas = $this->selectDB( 
                "COUNT(id_loja) as qtd_Lojas",
                "lojas",
                "WHERE status_loja = 'ativo'",
                array(
                    
                ) 
            );
        
        
        $totalLoj = $l->fetch(\PDO::FETCH_ASSOC);
        $totalFun = $f->fetch(\PDO::FETCH_ASSOC);
        $novoLoj = $n->fetch(\PDO::FETCH_ASSOC);
        $colabor = $c->fetch(\PDO::FETCH_ASSOC);
        $totalLojas = $lojas->fetch(\PDO::FETCH_ASSOC);
        
        $totalUsu=[
            "totalLoj"=>$totalLoj['qtd_lojistas'],
            "totalFun"=>$totalFun['qtd_funcionarios'],
            "totalNov"=>$novoLoj['qtd_novos'],
            "totalCol"=>$colabor['qtd_colaboradores'],
            "totalLojas"=>$totalLojas['qtd_Lojas'],
        ];
        return $totalUsu;
    }
}
