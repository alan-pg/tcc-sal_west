<?php

namespace Classes;

use Models\ClassUsuario;
use Models\ClassLojista;
use Models\ClassFuncionario;
use Models\ClassEncarregado;
use Models\ClassCoordenador;
use Models\ClassLogin;
use Models\ClassChamado;
use Models\ClassPreventiva;
use ZxcvbnPhp\Zxcvbn;
use Classes\ClassPassword;

class ClassValidate {

    private $erro = [];
    private $usuario;
    private $lojista;
    private $encarregado;
    private $coordenador;
    private $funcionario;
    private $chamado;
    private $password;
    private $login;
    private $session;
    private $preventiva;

    public function __construct() {
        $this->usuario = new ClassUsuario();
        $this->lojista = new ClassLojista();
        $this->funcionario = new ClassFuncionario();
        $this->encarregado = new ClassEncarregado();
        $this->coordenador = new ClassCoordenador();
        $this->password = new ClassPassword();
        $this->login = new ClassLogin();
        $this->session = new ClassSessions();
        $this->chamado = new ClassChamado();
        $this->preventiva = new ClassPreventiva();
    }

    public function getErro() {
        return $this->erro;
    }

    public function setErro($erro) {
        array_push($this->erro, $erro);
    }

    #Validar se os campos desejados foram preenchidos

    public function validateFields($par) {
        $i = 0;
        foreach ($par as $key => $value) {
            if (empty($value)) {
                $i++;
            }
        }
        if ($i == 0) {
            return true;
        } else {
            $this->setErro("Preencha todos os dados!");
            return false;
        }
    }

    
    
    #Validação se o dado é um email

    public function validateEmail($par) {
        if (filter_var($par, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            $this->setErro("Email inválido!");
            return false;
        }
    }

    
    
    
#Validar se o email existe no banco de dados (action null para cadastro)

    public function validateIssetEmail($email, $action = null, $op) {
       
        $b = $this->usuario->getIssetEmail($email, $op);
       
       
        if ($action == null) {
            if ($b > 0) {
                $this->setErro("Email já cadastrado!");
                return false;
            } else {
                return true;
            }
        } else {
            if ($b > 0) {                
                return true;
                
            } else {
                $this->setErro("Email não cadastrado!");                
                return false;
                
            }
        }
    }

    
    
    
    
#Validação se o dado é uma data

    public function validateData($par) {
        $data = \DateTime::createFromFormat("d/m/Y", $par);
        if (($data) && ($data->format("d/m/Y") === $par)) {
            return true;
        } else {
            $this->setErro("Data inválida!");
            return false;
        }
    }

    
    
    
    
    
    
#Validação se é um cpf real

    public function validateCpf($par) {
        $cpf = preg_replace('/[^0-9]/', '', (string) $par);
        if (strlen($cpf) != 11) {
            $this->setErro("Cpf Inválido!");
            return false;
        }
        for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--)
            $soma += $cpf{$i} * $j;
        $resto = $soma % 11;
        if ($cpf{9} != ($resto < 2 ? 0 : 11 - $resto)) {
            $this->setErro("Cpf Inválido!");
            return false;
        }
        for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--)
            $soma += $cpf{$i} * $j;
        $resto = $soma % 11;
        return $cpf{10} == ($resto < 2 ? 0 : 11 - $resto);
    }

    
    
    
    
    
    #verificar se a senha é igual a confirmação de senha

    public function validateConfSenha($senha, $senhaConf) {
        if ($senha === $senhaConf) {
            return true;
        } else {
            $this->setErro("senha diferente de confirmação senha!");
        }
    }
    
    
    

#verificar a força da senha

    public function validateStrongSenha($senha, $par = null) {
        $zxcvbn = new Zxcvbn();
        $strength = $zxcvbn->passwordStrength($senha);
        if ($par == null) {
            if ($strength['score'] >= 1) {
                return true;
            } else {
                $this->setErro("utilize uma senha mais forte");
            }
        } else {
            /* login */
        }
    }
    
    
    
    
    

#verificaçao da senha digitada com o rash no banco de dados

    public function validateSenha($email, $senha, $op) {
        if ($this->password->verifyHash($email, $senha, $op)) {
            
            return true;
        } else {
            $this->setErro("Usuário ou Senha Inválidos!");
            
            return false;
        }
    }
    

    
    
    

#Método de validação de confirmação de email

    public function validateUserActive($email, $op) {
        $user = $this->login->getDataUser($email, $op);
        if ($user["data"]["status"] != "ativo") {
                $this->setErro("Seu cadastro esta inativo!"); 
        } else {
            
            return true;
        }
    }

#Validação final do cadastro
public function validateFinalCad($usu, $cargo)
{
    if(count($this->getErro())>0){
        $arrResponse=[
            "retorno"=>"erro",
            "erros"=>$this->getErro()
        ];
    }else{
        $arrResponse=[
            "retorno"=>"success",
            "erros"=>null
        ];
            if($cargo == "lojista"){
                $this->lojista->insertLojista($usu);
            }else{
                if($cargo == "coordenador"){                    
                    $this->coordenador->insertCoordenador($usu);
                }else{
                    if($cargo == "encarregado"){
                        $this->encarregado->insertEncarregado($usu);
                    }
                }
            }
       
    }
    return json_encode($arrResponse);
}

#validação final do editar cadastro
    public function validateEditarCad($usu){
        if(count($this->getErro())>0){
        $arrResponse=[
            "retorno"=>"erro",
            "erros"=>$this->getErro()
        ];
    }else{
        $arrResponse=[
            "retorno"=>"success",
            "erros"=>null
        ];
        
        $this->usuario->alterUsuario($usu);
        
    }
        return json_encode($arrResponse);
    }




#Validação final do login
public function validateFinalLogin($email, $op)
{
    if(count($this->getErro()) >0){

        $arrResponse=[
            "retorno"=>"erro",
            "erros"=>$this->getErro()
        ];
    }else{
        $this->session->setSessions($email, $op);

        $arrResponse=[
            "retorno"=>"success",
            "page"=>'telaAdm'
        ];
    }
    return json_encode($arrResponse);
}

//validaçao de novo pedido
public function validateFinalChamado($chamado){
       if(count($this->getErro())>0){
        $arrResponse=[
            "retorno"=>"erro",
            "erros"=>$this->getErro()
        ];
    }else{
        $arrResponse=[
            "retorno"=>"success",
            "erros"=>null
        ];
        
        $this->chamado->insertChamado($chamado);
        
    }
        return json_encode($arrResponse);
    
}

//Validar imagem
public function validateImagem($imagem){
    	//$arquivo= $_FILES['arquivo']['name'];
    $nome_img = $imagem['name'];
			
			//Pasta onde o arquivo vai ser salvo
			$_UP['pasta'] = 'fotos/';
			
			//Tamanho máximo do arquivo em Bytes
			$_UP['tamanho'] = 1024*1024*100; //5mb
			
			//Array com a extensões permitidas
			$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');
			
			//Renomeiar
			$_UP['renomeia'] = true;
			
			//Array com os tipos de erros de upload do PHP
			$_UP['erros'][0] = 'Não houve erro';
			$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
			$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
			$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
			$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
			
			//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
			if($imagem['error'] != 0){
				die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$imagem['error']]);
				exit; //Para a execução do script
			}
			
			//Faz a verificação da extensao do arquivo
                        $tmp = explode('.',$imagem['name']);
                        $extensao = end($tmp);
			//$extensao = strtolower(end(explode('.', $nome_img)));
			if(array_search($extensao, $_UP['extensoes'])=== false){
                            $arrResponse = [
                                "nome_imagem" => null,
                                "erro" => "A imagem não foi cadastrada extesão inválida."
                            ];
                             return $arrResponse;
                        }
			
			//Faz a verificação do tamanho do arquivo
			else if ($_UP['tamanho'] < $imagem['size']){
                            $arrResponse = [
                                "nome_imagem" => null,
                                "erro" => "Arquivo muito grande!"
                            ];
                             return $arrResponse;                            				
			}
			
			//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
			else{
				//Primeiro verifica se deve trocar o nome do arquivo
				if($_UP['renomeia'] == true){
					//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
					$nome_final = time().".jpg";                                        
				}else{
					//mantem o nome original do arquivo
					$nome_final = $imagem['name'];                                        
				} 
				//Verificar se é possivel mover o arquivo para a pasta escolhida
				if(move_uploaded_file($imagem['tmp_name'], $_UP['pasta']. $nome_final)){
					//Upload efetuado com sucesso, exibe a mensagem
                                     $arrResponse = [
                                        "nome_imagem" => $nome_final,
                                        "erro" => null
                                      ];
                                 return $arrResponse; 				
						
				}else{
					//Upload não efetuado com sucesso, exibe a mensagem
                                     $arrResponse = [
                                        "nome_imagem" => null,
                                        "erro" => "Imagem não foi cadastrada com Sucesso."
                                      ];
                                    return $arrResponse; 					
				} 
			}
}




// validar se já existe o mesmo agendamento e inserir um novo agendamento
public function validateAgendarPreventiva(ClassPreventiva $prev){
    $cont = $prev->verificaAgendamento($prev->getLoja(), $prev->getId_manutencao_prev());
    if($cont>0){
      
        $this->setErro("Já existe um agendamento para loja e preventiva!");
         $arrResponse=[
            "retorno"=>"erro",
            "erros"=>$this->getErro()
        ];
    }else{
         $arrResponse=[
            "retorno"=>"success",
            "page"=>'agenda_preventiva'
        ];
         
        $prev->agendar_preventiva($prev);
    }
    return json_encode($arrResponse);
}

public function validateResetSenha($email, $cnpj){
    $b = $this->usuario->getIssetEmail($email, "lojista");
    if($b > 0){
        $user = $this->login->getDataUser($email, "lojista");
        if ($user["data"]["cnpj"] == $cnpj) {
            
            $objPass=new \Classes\ClassPassword();
            $hashSenha=$objPass->passwordHash($cnpj);
            $this->lojista->alterSenha($user["data"]["id_lojista"],$hashSenha);
             $arrResponse=[
                "retorno"=>"success",
                "erros"=>null
            ];
                 
        }else{
             $arrResponse=[
                "retorno"=>"erro",
                "erros"=>"cnpj não é compativel com e-mail"
            ];
        }
    }
     else {
             $arrResponse=[
                "retorno"=>"erro",
                "erros"=>"E-mail não cadastrado"
            ];
        }
        echo json_encode($arrResponse);
}

}
