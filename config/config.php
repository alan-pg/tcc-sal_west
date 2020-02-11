<?php

#Caminhos absolutos
$pastaInterna="tcc/";
define('DIRPAGE',"http://{$_SERVER['HTTP_HOST']}/{$pastaInterna}");
(substr($_SERVER['DOCUMENT_ROOT'],-1)=='/')?$barra="":$barra="/";
define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}{$barra}{$pastaInterna}");

#Atalhos
define('DIRIMG',DIRPAGE.'img/');
define('DIRCSS',DIRPAGE.'lib/css/');
define('DIRJS',DIRPAGE.'lib/js/');

#Acesso ao db
define('HOST',"localhost");
define('DB',"sistema3");
define('USER',"root");
define('PASS',"");

#outras informações

define("SITEKEY","6LdokLkUAAAAANuMnRJs5bDDjCzPaJ6R5eDZdsGg");
define("SECRETKEY","6LdokLkUAAAAACs-zOCZvQfpkCq3aYcR7k7bPMuf");

define("DOMAIN",$_SERVER["HTTP_HOST"]);

?>

