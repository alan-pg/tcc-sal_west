<?PHP// \Classes\ClassLayout::setHeadRestrito(); ?>
<?php \Classes\ClassLayout::setHead('Cadastro', 'Tela de cadastro'); ?>

<?php
$validate=new Classes\ClassValidate();
$lojista = new Models\ClassLojista();
$funcionario = new Models\ClassFuncionario();
//$uso = new Models\ClassUsuario();
//var_dump($arrVar);





switch ($_POST["acao"]) {
    case "solicitaAcesso":
        $op = "lojista";       
        $cargo = "lojista";
        $lojista->setNome($nome);
        $lojista->setEmail($email);
        $lojista->setTelefone($telefone);
        $lojista->setSenha($hashSenha);
        $lojista->setEmpresa($empresa);
        $lojista->setCnpj($cnpj);
        $lojista->setData_cadastro(date("Y-m-d H:i:s"));
        $lojista->setStatus("novo");
        $lojista->setLoja($id_loja);     
       
        
        $validate->validateFields($_POST);
        $validate->validateEmail($email);
        $validate->validateIssetEmail($email,null,$op); 
        $validate->validateConfSenha($senha, $senhaConf);
        $validate->validateStrongSenha($senha);
        echo $validate->validateFinalCad($lojista, $cargo);  
        break;
    
    case "novoLojista":
        $op = "lojista";       
        $cargo = "lojista";
        $lojista->setNome($nome);
        $lojista->setEmail($email);
        $lojista->setTelefone($telefone);
        $lojista->setSenha($hashSenha);
        $lojista->setEmpresa($empresa);
        $lojista->setCnpj($cnpj);
        $lojista->setData_cadastro(date("Y-m-d H:i:s"));
        $lojista->setStatus("novo");
        $lojista->setLoja($id_loja);     
       
        
        $validate->validateFields($_POST);
        $validate->validateEmail($email);
        $validate->validateIssetEmail($email,null,$op); 
        $validate->validateConfSenha($senha, $senhaConf);
        $validate->validateStrongSenha($senha);
        echo $validate->validateFinalCad($lojista, $cargo);     
        break;
    
    case "novoFuncionario":
        $funcionario = new Models\ClassFuncionario();
        $op = "funcionario";
        if($cargo == "coordenador"){
        
            
        $funcionario = new Models\ClassCoordenador();
        $funcionario->setNome($nome);
        $funcionario->setEmail($email);
        $funcionario->setTelefone($telefone);
        $funcionario->setSenha($hashSenha);
        $funcionario->setCargo($cargo);
        $funcionario->setCpf($cpf);
        $funcionario->setData_cadastro(date("Y-m-d H:i:s"));
        $funcionario->setStatus("ativo");  
            
        
        }else{ 
            if($cargo == "encarregado"){
               
                
                $funcionario = new Models\ClassEncarregado();                
                $funcionario->setNome($nome);
                $funcionario->setEmail($email);
                $funcionario->setTelefone($telefone);
                $funcionario->setSenha($hashSenha);
                $funcionario->setCargo($cargo);
                $funcionario->setCpf($cpf);
                $funcionario->setData_cadastro(date("Y-m-d H:i:s"));
                $funcionario->setStatus("ativo");
                 
                
            }
        }
        
        $validate->validateFields($_POST);
        $validate->validateEmail($email);
        $validate->validateIssetEmail($email,null,$op); 
        $validate->validateConfSenha($senha, $senhaConf);
        $validate->validateStrongSenha($senha);
        echo $validate->validateFinalCad($funcionario, $cargo);
        
        break;
        
        
    case "alterStatusLojista":
        $lojista->setStatus($status);
        $lojista->setId_lojista($id_lojista); 
        if($status == "null"){ $_SESSION['msgErro']= " <div class='alert alert-warning col-3' role='alert'>Status não foi selecionado!</div>";}
        else{$lojista->alterStatusLojista($lojista); $_SESSION['msgSucesso']= " <div class='alert alert-success col-3' role='alert'>Status alterado!</div>";}
        header("Location: ../coordenador/listarLojistas");
        
        
        break;
    case "editarCad":
        $validate->validateFields($_POST);
        $validate->validateEmail($email);
      //$validate->validateIssetEmail($email);
        $validate->validateData($dataNascimento);
        $validate->validateCpf($cpf);
        echo $validate->validateEditarCad($cadastro);
        break;
    
    case "editarFuncionario":
        $funcionario->setNome($nome);
        $funcionario->setEmail($email);
        $funcionario->setTelefone($telefone);
        $funcionario->setStatus($status);
        $funcionario->setId_usuario($id_funcionario);
        $funcionario->editarFuncionario($funcionario);
        header("Location: ../views/coordenador/listarFuncionarios");
       
        break;
    
    case "editarLojista":
        $lojista->setNome($nome);
        $lojista->setCnpj($cnpj);
        $lojista->setEmpresa($empresa);
        $lojista->setEmail($email);
        $lojista->setTelefone($telefone);
        $lojista->setLoja($id_loja);
        $lojista->setId_lojista($id_lojista);
        $lojista->editarLojista($lojista);
        header("Location: ../views/lojista/dadosLojista");
        break;
    
    case "alterSenhaLojista":
       
$op = "lojista";
        
        if($validate->validateSenha($email, $senha, "lojista")){
            if($validate->validateConfSenha($nova_senha, $senhaConf)){
                if($validate->validateStrongSenha($nova_senha)){
                    $lojista->alterSenha($id_lojista, $hashNovaSenha);
                    $_SESSION['msgSucesso']= " <div class='alert alert-success col-4' role='alert'>Senha alterada com sucesso</div>";
                    header("Location: ../views/lojista/alterarSenha");
                    echo "senha alterada";
                }else{$_SESSION['msgErro']= " <div class='alert alert-warning col-4' role='alert'>Digite uma senha mais forte</div>"; header("Location: ../views/lojista/alterarSenha");}
            }else{$_SESSION['msgErro']= " <div class='alert alert-warning col-6' role='alert'>Nova senha diferente de confirmar nova senha</div>"; header("Location: ../views/lojista/alterarSenha");}
        }else{$_SESSION['msgErro']= " <div class='alert alert-warning col-3' role='alert'>Senha atual inválida</div>"; header("Location: ../views/lojista/alterarSenha");}
       
        break;

    case "novoTecnico":
        $tec = new Models\ClassFuncionario();
        $tec->setNome($nome);
        $tec->setCpf($cpf);
        $tec->setEmail($email);
        $tec->setTelefone($telefone);
        $tec->setCargo($area_colaborador);
        $tec->setStatus("ativo");
        $tec->insertNovo_tecnico($tec);
        header("Location: ../views/coordenador/colaboradores");
        break;
    
    case "editarColaborador":
         $colaborador = new Models\ClassFuncionario();
        $colaborador->setId_colaborador($id_colaborador);
        $colaborador->setNome($nome);
        $colaborador->setCpf($cpf);
        $colaborador->setEmail($email);
        $colaborador->setTelefone($telefone);
        $colaborador->setArea($area_colaborador);
        $colaborador->setStatus($status);
        $colaborador->alterColaborador($colaborador);
        $_SESSION['msgSucesso']= " <div class='alert alert-success col-3' role='alert'>Alterado com sucesso!</div>";
        header("Location: ../views/coordenador/colaboradores");
break;
    default:
        echo "nem uma ação foi passada";
        break;
}
?>


        
<?php \Classes\ClassLayout::setFooter(); ?>