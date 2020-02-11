<?php


if(isset($_GET['file']) and isset($_GET['nome'])){
    $file = $_GET['file'];
    $nome = $_GET['nome'];
    
   
    function setHeaders($nome, $file){
        header("content-disposition: attachment; filename={$nome}");
        header('content-type: application/jpg');
        
        readfile($file);
    }
    setHeaders($nome, $file); 
} 



