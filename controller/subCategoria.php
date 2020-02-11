<?php


$lista = new Controllers\controllerListar();
$lista = $lista->listarSubCategoria($_POST['id']);
$listaSubCategoria = $lista->fetchAll(PDO::FETCH_ASSOC);


foreach ($listaSubCategoria as $categoria){
    $categoria = utf8_decode($categoria['nome_servico']);
    echo '<option value="' . $categoria . '">' . $categoria . '</option>';

}

//  echo '<option>'.$categoria['nome_servico'].'</option>' ;