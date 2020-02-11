<?php

$validate=new Classes\ClassValidate();
$validate->validateFields($_POST);
$validate->validateEmail($email);
//$validate->validateStrongSenha($senha);

switch ($_POST["acao"]) {
    case "loginLojista":
        
        
        $op="lojista";
        $validate->validateIssetEmail($email,"login",$op);        
        $validate->validateSenha($email,$senha,$op);
        
        $validate->validateUserActive($email, $op);
        
        echo $validate->validateFinalLogin($email, $op);


break;

    case "loginFuncionario":
        
        $op="funcionario";
        $validate->validateIssetEmail($email,"login",$op);
        $validate->validateSenha($email,$senha,$op);
        $validate->validateUserActive($email, $op);
        echo $validate->validateFinalLogin($email, $op);
        
        break;
    
}


