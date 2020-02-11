
<?PHP \Classes\ClassLayout::setHeadRestrito(); ?>

<?php
$controler = new Controllers\ControllerListar();
$chamado = $controler->listarChamados_por_id_lojista($_SESSION['id_usuario']);
$lista_c = $chamado->fetchAll(PDO::FETCH_ASSOC);

$listaServico = new Controllers\ControllerListar();
?>

<?php \Classes\ClassLayout::setHead('ChamadosLojista', 'Tela de chamados do lojista.'); ?>




        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chamados encerrados</h6>
            </div>
            <div class="card-body">


                <div class="table table-responsive-sm table-hover table-sm table-borderless">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nº chamado</th>
                                <th>Data</th>
                                <th>Departamento</th>                                
                                <th>status</th>                               
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nº chamado</th>
                                <th>Data</th>
                                <th>Departamento</th>                                
                                <th>status</th>                                
                                <th>Ações</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($lista_c as $lista) : ?>
                               <?php if($lista['status']=="encerrado" || $lista['status']=="cancelado lojista" || $lista['status']=="cancelado encarregado"){ ?>
                                <tr>

                                    <th><?php echo $lista['id_chamado']; ?></th>
                                    <td><?php echo $lista['data_criacao']; ?></td>
                                    <td><?php echo $lista['nome_departamento']; ?></td>                                   
                                    <td><?php echo $lista['status']; ?></td>                                    
                                    <td>                                                        
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=
                                            "#myModal<?php echo $lista['id_chamado']; ?>">Detalhes
                                        </button> 
                                </tr>
                                
                                
                                
                               <!-- modal vizualiar dados do chamado-->
                        <div class="modal fade" id="myModal<?php echo $lista['id_chamado']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Detalhes do chamado</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                            </div>
                                            <div class="modal-body">
                                                 <?php
                                                        // $listaServico = new Controllers\ControllerListar();
                                                        $list = $listaServico->listarServicos_por_id_chamado($lista['id_chamado']);
                                                        $listarTodosServicos = $list->fetchAll(PDO::FETCH_ASSOC);
                                                 ?>
                                                <div class="card">
                                    
                                                    <div class="card-header">
                                                        <h5 class="card-title">Nº chamado: <?php echo $lista['id_chamado']; ?> - <?php echo $lista['status']; ?>  </h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="card-col">
                                                            
                                                            <div class="row">
                                                            <div class="col-4">
                                                                <p class="font-weight-bold">Solicitante:</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p> <?php echo $lista['nome']; ?></p>
                                                            </div>
                                                            </div>
                                                            
                                                            <div class="row">
                                                            <div class="col-4">
                                                                <p class="card-text font-weight-bold">Data de solicitação: </p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p><?php echo $lista['data_criacao']; ?></p>
                                                            </div>
                                                            </div>
                                                            
                                                            <div class="row">                                                               
                                                            <div class="col-4">
                                                                <p class="font-weight-bold">Serviço solicitado: </p>
                                                            </div>
                                                            <div class="col-6">                                                            
                                                            <p><?php echo $lista['servico']; ?></p>
                                                            </div>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <p class="font-weight-bold">Detalhes do chamado:</p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p><?php echo $lista['detalhes']; ?></p>
                                                                </div>
                                                            </div>
                                                            
                                                                    <?php
                                                                    if ($lista['imagem'] != null) {
                                                                        $file = "../fotos/" . $lista['imagem'];
                                                                        $nomef = $lista['imagem'];
                                                                        ?>
                                                                        <a href="<?php echo '../../controller/controllerDownload.php?file=' . $file . '&nome=' . $nomef ?> " >
                                                                            imagem anexo
                                                                        </a>
                                                                    <?php } ?>
                                                       
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="card-body">
                                                        
                                                    
                                                         <?php foreach ($listarTodosServicos as $listaServ) :  ?>
                                                            <div class="card">
                                                            <div class="card-header  <?php if($listaServ['motivo_reaberto']!=null){ echo "alert alert-warning";}else{ echo "alert alert-success";}?>" role="alert" >
                                                                <h5 class="card-title">Ordem de serviço: <?php echo $listaServ['id_servico']; ?></h5>
                                                            </div>                   
                                                                <div class="card-body">
                                                            <?php if($listaServ['data_finalizacao']==null){ ?>
                                                                <div class="form-group">
                                                                    <button type="button" class="btn btn-outline-secondary font-weight-bold" disabled>Agendado para: <?php echo date('d-m-y', strtotime($listaServ['data_execucao']))  ?> - <?php echo $listaServ['hora_execucao']; ?></button>
                                                                
                                                                </div>
                                                            <?php }else{ ?>  
                                                                        <div class="form-group">
                                                                            <button type="button" class="btn btn-outline-secondary font-weight-bold" disabled>Data de execução: <?php echo date('d-m-y', strtotime($listaServ['data_finalizacao'])) ?> </button>
                                                                            
                                                                        </div>
                                                            <?php }?>
                                                                    <div class="row font-weight-bold">
                                                                                    <div class="col-4">
                                                                                        <p class="card-text">Responsável: <?php echo $listaServ['nome_tecnico']; ?></p>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <p class="card-text">Autorizado por: <?php echo $listaServ['nome']; ?></p>
                                                                                    </div>
                                                                                </div>
                                                                    <br>
                                                                    <div class="row ">
                                                                        <div class="col-4 font-weight-bold">
                                                                            <p class="card-text ">Detalhes do serviço:</p>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <p><?php echo $listaServ['detalhes_servico']; ?></p>
                                                                        </div>
                                                                    </div>
                                                                     
                                                            
                                                        
                                                        <?php if($listaServ['motivo_reaberto']!=null){ ?>
                                                        <button type="button" class="btn btn-sm btn btn-danger" disabled>Reaberto</button>
                                                         <p><?php echo $listaServ['motivo_reaberto']; ?></p>
                                                        <?php }?>
                                                                </div>
                                                        </div>
                                                        <br>
                                                         <?php endforeach; ?>
                                                        
                                                    </div>
                                                    
                                                
                                                
                                                
                                                
                                                
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <!-- fim do modal vizualizar dados do chamado -->
                        
                               <?php } ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
<?php \Classes\ClassLayout::setFooter(); ?>



