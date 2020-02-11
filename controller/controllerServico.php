<?php

switch ($_POST["acao"]) {
  case "novoSub_departamento":
      $sub_departamento = new Models\ClassServico();
      $sub_departamento->setSub_departamento($nome_servico);
      $sub_departamento->setId_departamento($departamento);
      
      $sub_departamento->insertSub_departamento($sub_departamento);
      header("Location: ../views/coordenador/sub_departamento");
     break;
  case "novo_departamento":
      $novoDepartamento = new Models\ClassServico();
      $novoDepartamento->setDepartamento($departamento);
      $novoDepartamento->insertDepartamento($novoDepartamento);
      
      break;
}

