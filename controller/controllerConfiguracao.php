<?PHP \Classes\ClassLayout::setHeadRestrito(); ?>
<?php
$preventiva = new Models\ClassPreventiva();
$loja = new Models\ClassLoja();

switch ($_POST["acao"]) {
    case "novo_tipo_preventiva":
        $preventiva->setNome_preventiva($nome_preventiva);
        $preventiva->setDescricao($descricao);
        $preventiva->novo_tipo_preventiva($preventiva);
        $_SESSION['msgSucesso']= " <div class='alert alert-success col-4' role='alert'>Novo tipo preventiva cadastrada com sucesso!</div>";
        header("Location: ../views/coordenador/config_preventiva");
      break;
  
    case "editar_tipo_preventiva":
        $preventiva->setId_manutencao_prev($id_manutencao_prev);
        $preventiva->setNome_preventiva($nome_preventiva);
        $preventiva->setDescricao($descricao);
        $preventiva->setStatus($status);
        $preventiva->alter_tipo_preventiva($preventiva);
        $_SESSION['msgSucesso']= " <div class='alert alert-success col-4' role='alert'>Tipo preventiva alterada com sucesso!</div>";
        header("Location: ../views/coordenador/config_preventiva");
        
        break;
  
    case "novaLoja":
        $loja->setLocalizacao($localizacao);
        $loja->setStatus($status);
        $loja->insertLoja($loja);
        $_SESSION['msgSucesso']= " <div class='alert alert-success col-3' role='alert'>Loja cadastrada com sucesso!</div>";
        header("Location: ../views/coordenador/lojas");
        break;
    case "editarLoja":
        $loja->setId_loja($id_loja);
        $loja->setLocalizacao($localizacao);
        $loja->setStatus($status);
        $loja->alterLoja($loja);
        $_SESSION['msgSucesso']= " <div class='alert alert-success col-4' role='alert'>Dados altedados com sucesso! id loja: ".$loja->getId_loja()."</div>";
        header("Location: ../views/coordenador/lojas");
        break;
    
    default:
        echo "nem uma ação foi passada";        
     break;
 }
