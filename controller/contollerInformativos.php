<?php
$informativo = new Models\ClassInformativo();

switch ($_POST["acao"]) {
    case "novoInformativo":
        $informativo->setAssunto($assunto);
        $informativo->setMensagem($mensagem);
        $informativo->setData_expiracao($data_expiracao);
        
        $informativo->insertInformativo($informativo);
        header("Location: ../informativos");
    break;
    case "editarInformativo":
        $informativo->setId_informativo($id_informativo);
        $informativo->setAssunto($assunto);
        $informativo->setMensagem($mensagem);
        $informativo->setData_expiracao($data_expiracao);
        
        $informativo->editarInformativo($informativo);
        header("Location: ../informativos");
    break;
    
default:
        echo "nem uma ação foi passada";
        break;
}