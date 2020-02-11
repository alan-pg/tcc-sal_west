<?php
namespace Models;

// use Traits\TraitGetIp;

class ClassLogin extends ClassCrud{
    
   
    private $dateNow;
    
    public function __construct() {
       
        $this->dateNow=date("Y-m-d H:i:s");
    }


    #Retorna os dados do usuário
    public function getDataUser($email, $op)
    {
        if($op == "funcionario"){
            $b=$this->selectDB(
                "*",
                "funcionarios",
                "where email=?",
                array(
                    $email
                )
            );
            $f=$b->fetch(\PDO::FETCH_ASSOC);
            $r=$b->rowCount();
            return $arrData=[
                "data"=>$f,
                "rows"=>$r
            ];
        }else{
            if($op == "lojista"){
                  $b=$this->selectDB(
                "*",
                "lojistas",
                "where email=?",
                array(
                    $email
                )
            );
            $f=$b->fetch(\PDO::FETCH_ASSOC);
            $r=$b->rowCount();
            return $arrData=[
                "data"=>$f,
                "rows"=>$r
            ];
            }
        }
    }
}


    
    
