<?php 
$validate=new Classes\ClassValidate();
$lojista = new Models\ClassLojista();

        
        $op = "lojista";       
        $cargo = "lojista";
        $lojista->setNome($nome);
        $lojista->setEmail($email);
        $lojista->setTelefone($telefone);
        $lojista->setSenha($hashSenha);
        $lojista->setEmpresa($empresa);
        $lojista->setCnpj($cnpj);
        $lojista->setData_cadastro(date("Y-m-d H:i:s"));
        $lojista->setStatus($status);
        $lojista->setLoja($id_loja);     
       
        
        $validate->validateFields($_POST);
        $validate->validateEmail($email);
        $validate->validateIssetEmail($email,null,$op); 
        $validate->validateConfSenha($senha, $senhaConf);
        $validate->validateStrongSenha($senha);
        echo $validate->validateFinalCad($lojista, $cargo); 
     