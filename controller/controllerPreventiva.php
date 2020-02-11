<?php
$preventiva = new Models\ClassPreventiva();
$validate=new Classes\ClassValidate();
switch ($_POST["acao"]) {
    case "agendarProx":
        
        
        $preventiva->setId_manutencao_prev($id_manutencao_prev);
        $preventiva->setUltima_prev($ultima_prev);
        $preventiva->setProx_prev($prox_prev);
        
        $preventiva->setColaborador($id_colaborador);
        $preventiva->setLoja($id_loja);
        $preventiva->setNome_preventiva($nome_preventiva);
                
        
        $preventiva->editar_egenda_preventiva($preventiva);
        $preventiva->insertHistoricoPreventica($preventiva);
        header("Location:../agenda_preventiva");
    break;    

    case "agendarNovo":
        $preventiva->setLoja($id_loja);
        $preventiva->setId_manutencao_prev($id_manutencao_prev);
        if($dataNull == null && $ultima_prev==null){ 
            $arrResponse=[
            "retorno"=>"erro",
            "erros"=>"Selecione a data da última manutenção"
            ];
            echo json_encode($arrResponse);
                        break;
        }
        
        if($dataNull != null){            
            $preventiva->setUltima_prev(null);
            $preventiva->getUltima_prev();
        }else{
            $preventiva->setUltima_prev($ultima_prev);
            $preventiva->getUltima_prev();
        }   
        
        $preventiva->setProx_prev($prox_prev);        
        echo $validate->validateAgendarPreventiva($preventiva);
        break;

    case "excluirAgendamento":
        
        $preventiva->setId_manutencao_prev($id_manutencao_prev);
        $preventiva->excluirAgendamento($preventiva); 
        header("Location:../agenda_preventiva");
        break;
    
    default:
    echo "nem uma ação foi passada";
        
    break;
}