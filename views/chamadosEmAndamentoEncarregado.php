<?PHP \Classes\ClassLayout::setHeadRestrito(); ?>

<?php
$lista = new Controllers\ControllerListar();
$l = $lista->listarTodos_Chamados();
$listarTodos = $l->fetchAll(PDO::FETCH_ASSOC);
$t = $lista->listarTenicos();
$listarTenicos = $t->fetchAll(PDO::FETCH_ASSOC);

$listaServico = new Controllers\ControllerListar();
?>


<?php \Classes\ClassLayout::setHead('Listar pedidos', 'Tela lista todos os pedidos para o adm'); ?>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Chamados em andamento</h6>
    </div>
    <div class="card-body">


        <div class="table-responsive table-sm table-hover">
            <table class="table " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nº chamado</th>
                        <th>Data</th>
                        <th>Solicitante</th>                                
                        <th>Departamento</th>
                        <th>status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nº chamados</th>
                        <th>Data</th>
                        <th>Solicitante</th>                                
                        <th>Departamento</th>
                        <th>status</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    foreach ($listarTodos as $lista) :
                        if ($lista['status'] != "novo" && $lista['status'] != "encerrado" && $lista['status'] != "cancelado lojista" && $lista['status'] != "cancelado encarregado") {
                            ?>

                            <tr>

                                <th><?php if ($lista['reaberto'] == 1) { ?><button type="button" class="btn btn-danger btn-circle btn-sm"><?php } ?><?php echo $lista['id_chamado']; ?></th>
                                <td><?php echo date('d-m-Y H:i', strtotime($lista['data_criacao'])); ?></td>
                                <td><?php echo $lista['nome']; ?></td>                                   
                                <td><?php echo $lista['nome_departamento']; ?></td>
                                <td><?php echo $lista['status']; ?></td>
                                <td>                                                        
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=
                                            "#myModal<?php echo $lista['id_chamado']; ?>"><i class="fas fa-eye"></i></button>                                        


                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=
                                            "#ModalAdmChamado<?php echo $lista['id_chamado']; ?> " <?php if ($lista['status'] != "em andamento") {
                                echo "disabled";
                            } ?>><i class="far fa-edit"></i></button> 

                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=
                                            "#ModalFinalizar<?php echo $lista['id_chamado']; ?>" <?php if ($lista['status'] != "em andamento") {
                                echo "disabled";
                            } ?>><i class="fas fa-check"></i></button> 



                            </tr>


                            <!-- INICIO MODAL FINALIZAR CHAMADO -->

                        <div class="modal fade" id="ModalFinalizar<?php echo $lista['id_chamado']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">FINALIZAR CHAMADO</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                    </div>
                                    <div class="modal-body">

                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title">Nº CHAMADO: <?php echo $lista['id_chamado']; ?></h5>
                                            </div>
                                            <?php
                                                // $listaServico = new Controllers\ControllerListar();
                                                $list = $listaServico->listarServicos_por_id_chamado($lista['id_chamado']);
                                                $listarTodosServicos = $list->fetchAll(PDO::FETCH_ASSOC);
                                                ?>
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
                                                            <p class="font-weight-bold">Loja: <?php echo $lista['localizacao']; ?></p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p> Empresa: <?php echo $lista['empresa']; ?></p>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <p class="card-text font-weight-bold">Data de solicitação: </p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p><?php echo date('d-m-Y H:i', strtotime($lista['data_criacao'])); ?></p>
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

        <?php if ($lista['imagem'] != null) { ?>
                                                        <img src="tcc/fotos/<?php echo $lista['imagem'] ?>"/>
        <?php } ?>

                                                </div>
                                            </div>

                                                <hr class="divider">
                                                <div class="card-body">                                                
                                                <form name="formFinalizarChamado" id="finalizarChamado" action="<?php echo DIRPAGE . 'controller/controllerChamado'; ?>" method="post">
                                                    <input type="hidden" class="form-control" name="acao" id="acao" value="finalizarChamado">
                                                    <input type="hidden" class="form-control" name="id_chamado" id="id_chamado" value="<?php echo $lista['id_chamado']; ?>">
                                                    <input type="hidden" class="form-control" name="status" id="acao" value="aguardando avaliacao">

        <?php foreach ($listarTodosServicos as $listaServ) :
            if ($listaServ['data_finalizacao'] == null) {
                ?>
                                                            <input type="hidden" class="form-control" name="id_servico" id="id_servico" value="<?php echo $listaServ['id_servico']; ?>">
<div class="card">
                                                        <div class="card-header alert alert-success" role="alert" >
                                                            <h5 class="card-title">Ordem de serviço: <?php echo $listaServ['id_servico']; ?></h5>
                                                        </div>                   
                                                        <div class="card-body">
                                                            <?php if ($listaServ['data_finalizacao'] == null) { ?>
                                                                <div class="form-group">
                                                                    <button type="button" class="btn btn-outline-secondary font-weight-bold" disabled>Agendado para: <?php echo date('d-m-Y', strtotime($listaServ['data_execucao'])) ?> - <?php echo $listaServ['hora_execucao']; ?></button>

                                                                </div>
            <?php } else { ?>  
                                                                <div class="form-group">
                                                                    <button type="button" class="btn btn-outline-secondary font-weight-bold" disabled>Data de execução: <?php echo date('d-m-Y', strtotime($listaServ['data_finalizacao'])) ?> </button>

                                                                </div>
            <?php } ?>
                                                            <div class="row font-weight-bold">
                                                                <div class="col-5">
                                                                    <p class="card-text">Responsável: <?php echo $listaServ['nome_tecnico']; ?></p>
                                                                </div>
                                                                <div class="col">
                                                                    <p class="card-text">Autorizado por: <?php echo $listaServ['nome']; ?></p>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            
                                                                
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="detalhes">Detalhes da execução do serviço:</label>                                                         
                                                                    <textarea class="form-control" name="detalhes" id="detalhes" rows="3"></textarea>
                                                                </div>
                                                            </div>
                                                            
            
                                                        </div>
                                                    </div>


                                                            <?php
                                                        }
                                                    endforeach;
                                                    ?>
                                                            <br>
                                                            <div class="col">
                                                                <button type="submit" class="btn btn-primary">Finalizar</button>
                                                            </div>
                                                </form> 





                                            </div>
                                        </div> 

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- FIM DO MODAL FINALIZAR CHAMADO -->




                        <!-- INICIO MODAL VISUALIZAR CHAMADO -->
                        <div class="modal fade bd-example-modal-lg" id="myModal<?php echo $lista['id_chamado']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Detalhes do chamado</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                    </div>
                                    <div class="modal-body">

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
                                                            <p class="font-weight-bold">Loja: <?php echo $lista['localizacao']; ?></p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p> Empresa: <?php echo $lista['empresa']; ?></p>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <p class="card-text font-weight-bold">Data de solicitação: </p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p><?php echo date('d-m-Y H:i', strtotime($lista['data_criacao'])); ?></p>
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

                                                    <?php if ($lista['imagem'] != null) { 
                                                        $file = "../fotos/".$lista['imagem'];
                                                        $nomef = $lista['imagem'];
                                                                                                              
                                                    ?>
                                                    <a href="<?php echo 'controller/controllerDownload.php?file='.$file.'&nome='.$nomef ?> " >
                                                     imagem anexo
                                                    </a>
                                                   
                                                   
                                                       
                                                    <?php } ?>

                                                </div>
                                            </div>
                                            <div class="card-body">


                                                        <?php foreach ($listarTodosServicos as $listaServ) : ?>
                                                    <div class="card">
                                                        <div class="card-header  <?php if ($listaServ['motivo_reaberto'] != null) {
                                                                echo "alert alert-warning";
                                                            } else {
                                                                echo "alert alert-success";
                                                            } ?>" role="alert" >
                                                            <h5 class="card-title">Ordem de serviço: <?php echo $listaServ['id_servico']; ?></h5>
                                                        </div>                   
                                                        <div class="card-body">
                                                            <?php if ($listaServ['data_finalizacao'] == null) { ?>
                                                                <div class="form-group">
                                                                    <button type="button" class="btn btn-outline-secondary font-weight-bold" disabled>Agendado para: <?php echo date('d-m-Y', strtotime($listaServ['data_execucao'])) ?> - <?php echo $listaServ['hora_execucao']; ?></button>

                                                                </div>
            <?php } else { ?>  
                                                                <div class="form-group">
                                                                    <button type="button" class="btn btn-outline-secondary font-weight-bold" disabled>Data de execução: <?php echo date('d-m-Y', strtotime($listaServ['data_finalizacao'])) ?> </button>

                                                                </div>
            <?php } ?>
                                                            <div class="row font-weight-bold">
                                                                <div class="col-5">
                                                                    <p class="card-text">Responsável: <?php echo $listaServ['nome_tecnico']; ?></p>
                                                                </div>
                                                                <div class="col">
                                                                    <p class="card-text">Autorizado por: <?php echo $listaServ['nome']; ?></p>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row ">
                                                                <div class="col-5 font-weight-bold">
                                                                    <p class="card-text ">Detalhes do serviço:</p>
                                                                </div>
                                                                <div class="col">
                                                                    <p><?php echo $listaServ['detalhes_servico']; ?></p>
                                                                </div>
                                                            </div>

            <?php if ($listaServ['motivo_reaberto'] != null) { ?>
                                                                <button type="button" class="btn btn-sm btn btn-danger" disabled>Reaberto</button>
                                                                <p><?php echo $listaServ['motivo_reaberto']; ?></p>
            <?php } ?>
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
                        <!-- FIM MODAL VISUALIZAR CHAMADO -->









                        <!-- INICIO MODAL EDITAR ADMINISTRAR CHAMADOS -->
                        <div class="modal fade" id="ModalAdmChamado<?php echo $lista['id_chamado']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Editar ordem de serviço</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                    </div>
                                    <div class="modal-body">

                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title">Nº chamado: <?php echo $lista['id_chamado']; ?></h5>
                                            </div>
                                            <div class="card-body">
                                                <form name="formAdmChamado" id="formAdmChamado" action="<?php echo DIRPAGE . 'controller/controllerChamado'; ?>" method="post">
                                                    <input type="hidden" class="form-control" name="acao" id="acao" value="editarChamado">


                                                    <p class="card-text">Locall loja: <?php echo $lista['localizacao']; ?></p> 

        <?php foreach ($listarTodosServicos as $listaServ) :

            if ($listaServ['data_finalizacao'] == null) {
                ?>

                                                            <input type="hidden" class="form-control" name="id_servico" id="id_servico" value="<?php echo $listaServ['id_servico']; ?>">

                                                            <div class="form-group">
                                                                <label for="id_tecnico">Selecionar técnico:</label>
                                                                <select class="form-control" name="id_tecnico" id="id_tecnico">
                                                                    <option value="<?php echo $listaServ['id_tecnico']; ?>"><?php echo $listaServ['nome_tecnico'] ?></option>

                <?php
                foreach ($listarTenicos as $lista) :
                    echo '<option value="' . $lista['id_tecnico'] . '">' . $lista['nome_tecnico'] . '</option>';
                endforeach;
                ?>
                                                                </select>    
                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <input class="form-control" id="data_execucao" name="data_execucao" type="date" min="<?php echo date("Y-m-d"); ?>" max="<?php echo date('Y-m-d', strtotime('+1 year')); ?>" value="<?php echo $listaServ['data_execucao']; ?>">
                                                                </div>

                                                                <div class="form-group col-5">
                                                                    <input class="form-control" id="hora_execucao" name="hora_execucao"  type="time" min="09:00" max="22:00" value="<?php echo $listaServ['hora_execucao']; ?>" required>
                                                                </div>
                                                            </div>

            <?php } endforeach; ?>

                                                    <button type="submit" class="btn btn-primary mb-2">OK</button>
                                                </form>

                                            </div>
                                        </div> 

                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- FIM MODAL ADMINISTRAR CHAMADOS -->


        <?php
    }
endforeach;
?>
                </tbody>
            </table>

        </div>
    </div>


</div>




<?php \Classes\ClassLayout::setFooter(); ?>


