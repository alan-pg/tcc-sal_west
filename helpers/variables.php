<?php
date_default_timezone_set('America/Sao_Paulo');
$objPass=new \Classes\ClassPassword();
if(isset($_POST['nome'])){$nome=filter_input(INPUT_POST,'nome',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$nome=null;}
if(isset($_POST['email'])){$email=filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);}else{$email=null;}
if(isset($_POST['cpf'])){$cpf=filter_input(INPUT_POST,'cpf',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$cpf=null;}
if(isset($_POST['cnpj'])){$cnpj=filter_input(INPUT_POST,'cnpj',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$cnpj=null;}
if(isset($_POST['dataNascimento'])){$dataNascimento=filter_input(INPUT_POST,'dataNascimento',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$dataNascimento=null;}
if(isset($_POST['senha'])){$senha=$_POST['senha']; $hashSenha=$objPass->passwordHash($senha);}else{$senha=null; $hashSenha=null;}
if(isset($_POST['senhaConf'])){$senhaConf=$_POST['senhaConf'];}else{$senhaConf=null;}

if(isset($_POST['nova_senha'])){$nova_senha=$_POST['nova_senha']; $hashNovaSenha=$objPass->passwordHash($nova_senha);}else{$nova_senha=null; $hashNovaSenha=null;}



if(isset($_POST['permissoes'])){$permissoes=filter_input(INPUT_POST,'permissoes',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$permissoes=null;}
if(isset($_POST['id_usuario'])){$id_usuario=filter_input(INPUT_POST,'id_usuario',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$id_usuario=null;}
if(isset($_POST['id_funcionario'])){$id_funcionario=filter_input(INPUT_POST,'id_funcionario',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$id_funcionario=null;}
if(isset($_POST['id_tecnico'])){$id_tecnico=filter_input(INPUT_POST,'id_tecnico',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$id_tecnico=null;}
if(isset($_POST['id_lojista'])){$id_lojista=filter_input(INPUT_POST,'id_lojista',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$id_lojista=null;}

if(isset($_POST['id_colaborador'])){$id_colaborador=filter_input(INPUT_POST,'id_colaborador',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$id_colaborador=null;}


if(isset($_POST['id_loja'])){$id_loja=filter_input(INPUT_POST,'id_loja',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$id_loja=null;}
if(isset($_POST['telefone'])){$telefone=filter_input(INPUT_POST,'telefone',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$telefone=null;}
if(isset($_POST['empresa'])){$empresa=filter_input(INPUT_POST,'empresa',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$empresa=null;}
if(isset($_POST['cargo'])){$cargo=filter_input(INPUT_POST,'cargo',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$cargo=null;}
if(isset($_POST['area_colaborador'])){$area_colaborador=filter_input(INPUT_POST,'area_colaborador',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$area_colaborador=null;}

// variaveis usadas no chamado
if(isset($_POST['departamento'])){$departamento=filter_input(INPUT_POST,'departamento',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$departamento=null;}
if(isset($_POST['subCategoria'])){$nome_servico=filter_input(INPUT_POST,'subCategoria',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$nome_servico=null;}
if(isset($_POST['detalhes'])){$detalhes=filter_input(INPUT_POST,'detalhes',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$detalhes=null;}
if(isset($_POST['id_chamado'])){$id_chamado=filter_input(INPUT_POST,'id_chamado',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$id_chamado=null;}
if(isset($_POST['id_servico'])){$id_servico=filter_input(INPUT_POST,'id_servico',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$id_servico=null;}
if(isset($_POST['status'])){$status=filter_input(INPUT_POST,'status',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$status=null;}
if(isset($_POST['data_execucao'])){$data_execucao=filter_input(INPUT_POST,'data_execucao',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$data_execucao=null;}
if(isset($_POST['hora_execucao'])){$hora_execucao=filter_input(INPUT_POST,'hora_execucao',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$hora_execucao=null;}
if(isset($_POST['end_loja'])){$end_loja=filter_input(INPUT_POST,'end_loja',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$end_loja=null;}
if(isset($_POST['estrela'])){$estrela=filter_input(INPUT_POST,'estrela',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$estrela=null;}

// variáveis usadas na manutenção preventiva
if(isset($_POST['nome_preventiva'])){$nome_preventiva=filter_input(INPUT_POST,'nome_preventiva',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$nome_preventiva=null;}
if(isset($_POST['descricao'])){$descricao=filter_input(INPUT_POST,'descricao',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$descricao=null;}
if(isset($_POST['id_manutencao_prev'])){$id_manutencao_prev=filter_input(INPUT_POST,'id_manutencao_prev',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$id_manutencao_prev=null;}
if(isset($_POST['ultima_prev'])){$ultima_prev=filter_input(INPUT_POST,'ultima_prev',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$ultima_prev=null;}
if(isset($_POST['prox_prev'])){$prox_prev=filter_input(INPUT_POST,'prox_prev',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$prox_prev=null;}
if(isset($_POST['dataNull'])){$dataNull=filter_input(INPUT_POST,'dataNull',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$dataNull=null;}

// variáveis usadas no informativos
if(isset($_POST['assunto'])){$assunto=filter_input(INPUT_POST,'assunto',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$assunto=null;}
if(isset($_POST['mensagem'])){$mensagem=filter_input(INPUT_POST,'mensagem',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$mensagem=null;}
if(isset($_POST['data_expiracao'])){$data_expiracao=filter_input(INPUT_POST,'data_expiracao',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$data_expiracao=null;}
if(isset($_POST['id_informativo'])){$id_informativo=filter_input(INPUT_POST,'id_informativo',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$id_informativo=null;}


if(isset($_POST['localizacao'])){$localizacao=filter_input(INPUT_POST,'localizacao',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$localizacao=null;}


$dataCreate=date("Y-m-d H:i:s");
//$token=bin2hex(random_bytes(64));

//if(isset($_POST['g-recaptcha-response'])){$gRecaptchaResponse=$_POST['g-recaptcha-response'];}else{$gRecaptchaResponse=null;}

$arrVar=[
    "nome"=>$nome,
    "email"=>$email,
    "cpf"=>$cpf,
    "dataNascimento"=>$dataNascimento,
    "senha"=>$senha,
    "hashSenha"=>$hashSenha,
    "dataCreate"=>$dataCreate,
    //"token"=>$token,
    "permissoes"=>$permissoes,
    "id_usuario"=>$id_usuario,
    "departamento"=>$departamento,
    "nome_servico"=>$nome_servico,
    "detalhes"=>$detalhes,
    "id_chamado"=>$id_chamado,
    "status"=>$status

];
