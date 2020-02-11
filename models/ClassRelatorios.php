<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Models;
use Controllers;
new ClassRelatorios();
/**
 * Description of ClassRelatorios
 *
 * @author allan
 */
class ClassRelatorios extends ClassCrud {
    
    
       public function __construct() {
        
        $uri = urldecode(filter_input(INPUT_SERVER, 'REQUEST_URI'));
        $resquest = explode('/', $uri);
        $method = $resquest[4];
        $param = $resquest[5];
        
       if(method_exists(get_class(), $method)){
           $this->$method($param);
        }else{
            return false;
        }              
    }
    
    public function chamados_reabertos(){
         $b = $this->selectDB( 
                "month(data_criacao) as mes, COUNT(id_chamado) as qtd",
                "chamados",
                "where reaberto = true GROUP BY  month(data_criacao) ORDER by  month(data_criacao) asc",
                array(
                    
                )
            );
        $resultado = $b->fetchAll(\PDO::FETCH_OBJ);
        
        $m=['zero','jan','fev','mar','abr','mai','jun','jul','ago','set','out','nov','dez'];
        
        foreach ($resultado as $res):
            $dados[$m[$res->mes]] = $res->qtd;
        endforeach;
        echo json_encode($dados);
        
    }
    
    
    public function chamados_reabertos_por_mes($param){
        $b = $this->selectDB( 
                "departamento, COUNT(chamados.id_chamado) as qtd ",
                "chamados",
                "where reaberto = true and month(data_criacao) =? GROUP by departamento ORDER BY departamento ASC",
                array(
                    $param
                )
            );
        $f = $b->fetchAll(\PDO::FETCH_ASSOC);
        
         $arrDep=[
            "SERVIÇOS GERAIS"=>0,
            "HIDRÁULICA"=>0,
            "ELÉTRICA"=>0,
            "MANUTENÇÃO PREDIAL"=>0,
            "OBRA"=>0,
            "SEGURANÇA PATRIMONIAL"=>0,
            "BOMBEIRO CIVIL"=>0
        ];
        foreach ($f as $res):
            if($res['departamento']==1){$arrDep['SERVIÇOS GERAIS']=$res['qtd'];}
            if($res['departamento']==2){$arrDep['HIDRÁULICA']=$res['qtd'];}
            if($res['departamento']==3){$arrDep['ELÉTRICA']=$res['qtd'];}
            if($res['departamento']==4){$arrDep['MANUTENÇÃO PREDIAL']=$res['qtd'];}
            if($res['departamento']==5){$arrDep['OBRA']=$res['qtd'];}
            if($res['departamento']==6){$arrDep['SEGURANÇA PATRIMONIAL']=$res['qtd'];}
            if($res['departamento']==7){$arrDep['BOMBEIRO CIVIL']=$res['qtd'];}            
        endforeach;
        
        echo json_encode($arrDep);
    }

    public function meses(){
        $m=['jan','fev','mar','abr','mai','jun','jul','ago','set','out','nov','dez'];
        $mes_atual = date('m');
        
        for($i=0;$i<$mes_atual;$i++){
            $arr[]=$m[$i];
        }
        echo json_encode($arr);
    }
    
    public function get_reaberto_por_departamento($param = null){
          $b = $this->selectDB( 
                "month(data_criacao) as mes, COUNT(id_chamado) as qtd",
                "chamados",
                "where reaberto = true and departamento= ? GROUP BY  month(data_criacao) ORDER by  month(data_criacao) asc",
                array(
                    $param
                )
            );
        
        $f = $b->fetchAll(\PDO::FETCH_OBJ);
        
        $mes_atual = date('m');
        for($i=1;$i<=$mes_atual;$i++){
            $arrMes[$i]=0;
        }
        
        foreach ($f as $res):
            $arrMes[$res->mes] = $res->qtd;
        endforeach; 
        
        echo json_encode($arrMes);
    }

 
        
    public function qtd_chamados_por_mes($param){
        $b = $this->selectDB( 
                "departamento, COUNT(chamados.id_chamado) as qtd ",
                "chamados",
                "where month(data_criacao) =? GROUP by departamento ORDER BY departamento ASC",
                array(
                    $param
                )
            );
        $f = $b->fetchAll(\PDO::FETCH_ASSOC);
        
         $arrDep=[
            "SERVIÇOS GERAIS"=>0,
            "HIDRÁULICA"=>0,
            "ELÉTRICA"=>0,
            "MANUTENÇÃO PREDIAL"=>0,
            "OBRA"=>0,
            "SEGURANÇA PATRIMONIAL"=>0,
            "BOMBEIRO CIVIL"=>0
        ];
        foreach ($f as $res):
            if($res['departamento']==1){$arrDep['SERVIÇOS GERAIS']=$res['qtd'];}
            if($res['departamento']==2){$arrDep['HIDRÁULICA']=$res['qtd'];}
            if($res['departamento']==3){$arrDep['ELÉTRICA']=$res['qtd'];}
            if($res['departamento']==4){$arrDep['MANUTENÇÃO PREDIAL']=$res['qtd'];}
            if($res['departamento']==5){$arrDep['OBRA']=$res['qtd'];}
            if($res['departamento']==6){$arrDep['SEGURANÇA PATRIMONIAL']=$res['qtd'];}
            if($res['departamento']==7){$arrDep['BOMBEIRO CIVIL']=$res['qtd'];}            
        endforeach;
        
        echo json_encode($arrDep);

    
    }
    
    public function media_avaliacao($param){
        $b=$this->selectDB( 
                "departamento, AVG(avaliacao) as media ",
                "chamados",
                "where month(data_criacao) =? and status = 'encerrado' GROUP by departamento",
                array(
                    $param
                ) 
            );
        $f = $b->fetchAll(\PDO::FETCH_ASSOC);
        $total=0;
        $departamento=0;
        foreach ($f as $res):
            $arrAval[$res['departamento']] =  number_format($res['media'], 2);
        $total += number_format($res['media'], 2);
        $departamento++;
        endforeach;
        $arrAval[8]= number_format($total / $departamento ,2);
        echo json_encode($arrAval);
    }
    
    public function chamados_em_andamento($param = null){
        $b=$this->selectDB(
                "status, COUNT(chamados.id_chamado) as qtd ",
                "chamados",
                "where status = 'novo' OR status = 'em andamento' OR status = 'aguardando avaliacao' GROUP by status ORDER by status ", 
                array(
                    
                )
            );
        $f = $b->fetchAll(\PDO::FETCH_ASSOC);
        $arrStatus=[
            "aguardando avaliacao"=>0,
            "em andamento"=>0,
            "novo"=>0            
        ];
        foreach ($f as $res):
            $arrStatus[$res['status']] =  $res['qtd'];
        endforeach;
        
        echo json_encode($arrStatus);
    }
    
    
    public function relatorio_agenda_preventiva($param=null){
        $lista = new Controllers\ControllerListar();
        $prev = $lista->listarAgendaPreventiva();

        $f = $prev->fetchAll(\PDO::FETCH_ASSOC);
        $hoje = date("Y-m-d");
        $total = 0;
        $atrasados = 0;
        foreach ($f as $agenda):
            $total++;
            if ($agenda['prox_prev'] < $hoje) {
                $atrasados++;
            }
        endforeach;
        $arrAgen=[
            "total"=>$total,
            "atrasado"=>$atrasados
        ];
        
        echo json_encode($arrAgen);
        
    }
    
   }
