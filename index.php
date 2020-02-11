<?php

header("Content-Type: text/html; charset=utf-8");
include("config/config.php");
include(DIRREQ."lib/vendor/autoload.php");
include(DIRREQ."helpers/variables.php");
$dispatch=new Classes\ClassDispatch();
include($dispatch->getInclusao());
//$date=date("Y-m-d H:i:s");

//echo $date;
/*
use Models\ClassChamado;
$teste = new ClassChamado();
$t = $teste->getChamado(2);
var_dump($t);

 */

/*use Controllers\classTeste;
$teste= new classTeste(); */
  
                        /*$lista = new Models\ClassListar2();
                        $lista = $lista->testeModel();
                       
                        
                        $teste = new Controllers\controllerTeste();
                        $teste = $teste->testeModel();

                          $teste = new Controllers\controllerListar();
                          $teste = $teste->teste();  */
                       
                        

/*
use Models\ClassCrud;
$crud=new ClassCrud();
$crud->insertDB("users", 
    "?,?,?,?,?,?,?,?,?", 
    array(
         0,
         'Alan',
         'alan999999@gmail.com',
         '123',
         '19/02/1992',
         '111.222.333.44',
         $date,
         'user',
         'ativo'
    ) 
 );*/
/*
$crud=new ClassCrud();
$bf=$crud->selectDB(
        "*", 
        "users", 
        "",
        array(
            
       )        
 );
$f=$bf->fetch(PDO::FETCH_ASSOC);
//var_dump($f);
echo $f['nome'];  */
/*
$crud=new ClassCrud();
$bf=$crud->updateDB(
        "users", 
        "nome=?, dataNascimento=?, email=?", 
        "id=?",
        array(
            'alan12343234',
            '19/02/1994',
            'alan@teste.com',
            1
        )
); */
/*
$crud=new ClassCrud();
$bf=$crud->deleteDB(
        "users", 
        "id=?", 
        array(
           1
        )
);  */ 