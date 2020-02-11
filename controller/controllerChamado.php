<?PHP \Classes\ClassLayout::setHeadRestrito(); ?>
<?php

$validate=new Classes\ClassValidate();
$chamado=new Models\ClassChamado();


 switch ($_POST["acao"]) {
  case "novoChamado":
       $chamado->setId_usuario($id_usuario);
       $chamado->setDepartamento($departamento);
       $chamado->setDetalhes($detalhes);
       $chamado->setData_criacao(date("Y-m-d H:i:s", strtotime('-1h')));
       $chamado->setServico($nome_servico);    
       $chamado->setImagem(null);
       
      
      if($_FILES['imagem']['error'] != 4){
      $arquivo = $_FILES['imagem'];
      $retorno =  $validate->validateImagem($arquivo);
      if($retorno['erro']==null){
          $chamado->setImagem($retorno['nome_imagem']); 
      }else{
          $_SESSION['msgErro']= " <div class='alert alert-danger col-4' role='alert'>".$retorno['erro']."</div>";
         
          header("Location: ../lojista/novoChamado"); 
          break;
      }      
      }      
      $chamado->insertChamado($chamado);
      header("Location: ../lojista/listarChamadosLojista"); 
      // echo $validate->validateFinalChamado($chamado);
      break;
  
  case "alterStatus":      
      $chamado->alterStatus($arrVar);
      header("Location: ../listarPedidos");
      break;
  
  case "EditarChamado":      
     // var_dump($arrVar);
      $chamado->setDetalhes($detalhes);
      $chamado->setId_chamado($id_chamado);
      $chamado->Alterdetalhe($chamado);
      header("Location: ../lojista/listarChamadosLojista");
      break;
  
  case "responderChamado":
     
      $responderChamado = new Models\ClassChamado();
      $responderChamado->responderChamado($data_execucao, $hora_execucao, $id_tecnico, $id_chamado,$end_loja, $id_funcionario);
      $responderChamado->alterStatus("em andamento", $id_chamado);
      header("Location: ../chamadosNovos");
      break;
  
  case "editarChamado":
      
      $chamado->editarSevico($id_tecnico, $data_execucao, $hora_execucao, $id_servico);
       header("Location: ../chamadosEmAndamentoEncarregado");
      
      
      break;
  
  case "finalizarChamado":            
      $chamado->finalizarChamado($id_chamado, date("Y-m-d H:i:s"));      
      $chamado->alterStatus($status, $id_chamado); 
      $chamado->finalizarServico_do_chamado($id_servico, date("Y-m-d H:i:s"), $detalhes); 
      header("Location: ../chamadosEmAndamentoEncarregado");
      break;
  
  case "avaliarChamado":            
      $chamado->setId_chamado($id_chamado);
      $chamado->setAvaliacao($estrela);
      $chamado->setData_avaliacao(date("Y-m-d H:i:s"));
      $chamado->avaliar_Chamado($chamado);
      $chamado->alterStatus("encerrado", $id_chamado);
      header("Location: ../lojista/listarChamadosLojista");
      break;
  
  
  
  case "cancelarChamado":
        $chamado->finalizarChamado($id_chamado, date("Y-m-d H:i:s"));      
        $chamado->alterStatus($status, $id_chamado);
        break;
    
case "reabrirChamado":
        $chamado->setId_chamado($id_chamado);
        $chamado->setId_servico($id_servico);
        $chamado->setDetalhes($detalhes);     
        
        $chamado->reabrir_chamado($chamado);
        $chamado->reabrir_servico($chamado); 
      break;
  default:
     
        echo "nem uma ação foi passada";
        
         break;
 }