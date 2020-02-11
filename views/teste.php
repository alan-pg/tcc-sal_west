<?PHP \Classes\ClassLayout::setHeadRestrito(); ?>
<?php 
$datat=date("Y-m-d");

$chamado = new \Models\ClassChamado();

$todos = $chamado->getTodos_chamados();
$f = $todos->fetchAll(PDO::FETCH_ASSOC);
var_dump($f);




