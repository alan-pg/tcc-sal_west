
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
                <h6 class="m-0 font-weight-bold text-primary">Meus chamados</h6>
            </div>
            <div class="card-body">


                <div class="table table-responsive-sm table-hover table-sm">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">Nº</th>
                                <th scope="col">Data de abertura</th>
                                <th scope="col">Departamento</th>                                
                                <th scope="col">status</th>                               
                                <th scope="col" class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">Nº</th>
                                <th scope="col">Data de abertura</th>
                                <th scope="col">Departamento</th>                                
                                <th scope="col">status</th>                                
                                <th scope="col" class="text-center">Ações</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($lista_c as $lista) : ?>
                               <?php if($lista['status']=="novo" || $lista['status']=="em andamento" || $lista['status']=="aguardando avaliacao" || $lista['status']=="reaberto"){ ?>
                                <tr>

                                    <th scope="row"><?php if($lista['reaberto']==1){?><button type="button" class="btn btn-danger btn-circle btn-sm"><?php }?><?php echo $lista['id_chamado']; ?></th>
                                    <td><?php echo $lista['data_criacao']; ?></td>
                                    <td><?php echo $lista['nome_departamento']; ?></td>                                   
                                    <td><?php echo $lista['status']; ?></td>                                    
                                    <td>                                                        
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=
                                            "#myModal<?php echo $lista['id_chamado']; ?>"><i class="fas fa-eye"></i>
                                        </button> 
                                        
                                        <?php if ($lista['status'] == "novo") { ?>
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target=
                                                "#ModalEditar<?php echo $lista['id_chamado']; ?>"><i class="far fa-edit"></i>
                                            </button> 
                                            <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target=
                                            "#ModalCancelar<?php echo $lista['id_chamado']; ?>"><i class="fas fa-times"></i>
                                        </button> 
                                            <?php } ?>
                                        
                                        
                                        <?php if($lista['status']=="aguardando avaliacao"){ ?>
                                            <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target=
                                                "#ModalReabrir<?php echo $lista['id_chamado']; ?>">Reabrir
                                            </button>
                                        
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target=
                                                "#ModalAvaliar" data-id_chamado="<?php echo $lista['id_chamado']; ?>">Avaliar </button>
                                        <?php } ?>
                                        
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
                                                            <div class="col-sm-12 col-lg-4">
                                                                <p class="font-weight-bold">Solicitante:</p>
                                                            </div>
                                                            <div class="col-sm-12 col-lg-6">
                                                                <p> <?php echo $lista['nome']; ?></p>
                                                            </div>
                                                            </div>
                                                            
                                                            
                                                            
                                                            
                                                            <div class="row">
                                                            <div class="col-sm-12 col-lg-4">
                                                                <p class="card-text font-weight-bold">Data de solicitação: </p>
                                                            </div>
                                                            <div class="col-sm-12 col-lg-6">
                                                                <p><?php echo $lista['data_criacao']; ?></p>
                                                            </div>
                                                            </div>
                                                            
                                                            <div class="row">                                                               
                                                            <div class="col-sm-12 col-lg-4">
                                                                <p class="font-weight-bold">Serviço solicitado: </p>
                                                            </div>
                                                            <div class="col-sm-12 col-lg-6">                                                            
                                                            <p><?php echo $lista['servico']; ?></p>
                                                            </div>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-sm-12 col-lg-4">
                                                                    <p class="font-weight-bold">Detalhes do chamado:</p>
                                                                </div>
                                                                <div class="col-sm-12 col-lg-6">
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
                                                                    <div class="row ">
                                                                                    <div class="col-sm-12 col-lg-4">
                                                                                        <p class="card-text font-weight-bold">Responsável:</p>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-lg">
                                                                                        <p class="card-text"><?php echo $listaServ['nome_tecnico']; ?></p>
                                                                                    </div>
                                                                    </div>
                                                                    <div class="row">
                                                                                    <div class="col-sm-12 col-lg-4">
                                                                                        <p class="card-text font-weight-bold">Autorizado por: </p>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-lg">
                                                                                        <p class="card-text"><?php echo $listaServ['nome']; ?></p>
                                                                                    </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row ">
                                                                        <div class="col-sm-12 col-lg-4 font-weight-bold">
                                                                            <p class="card-text ">Detalhes do serviço:</p>
                                                                        </div>
                                                                        <div class="col">
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
                        
                        
                        
                        <!-- MODAL REABRIR CHAMADO -->
                        
                        <div class="modal fade" id="ModalReabrir<?php echo $lista['id_chamado']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Reabrir chamado</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                            </div>
                                            <div class="modal-body">
                                               <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title">Nº chamado: <?php echo $lista['id_chamado']; ?></h5>
                                                    </div>
                                                   <div class="card-body">
                                                               <form method="POST" action="<?php echo DIRPAGE . 'controller/controllerChamado'; ?>" enctype="multipart/form-data">
                                                                   <input class="form-control" type="hidden" name="acao" id="acao" value="reabrirChamado">
                                                                   <input class="form-control" type="hidden" name="id_chamado" id="id_chamado" value="<?php echo $lista['id_chamado']; ?>">
                                                                   <input class="form-control" type="hidden" name="status" id="status" value="Reaberto">


                                                                   <?php foreach ($listarTodosServicos as $listaServ) : ?>  

                                                                       <?php if ($listaServ['motivo_reaberto'] == null) { ?>
                                                                   <input class="form-control" type="hidden" name="id_servico" id="id_servico" value="<?php echo $listaServ['id_servico']; ?>">

                                                            
                                                                           <div class="row font-weight-bolder">
                                                                           <div class="col-sm-12 col-lg-4">
                                                                                <p class=" font-weight-bolder">Nº serviço: <?php echo $listaServ['id_servico']; ?></p>
                                                                           </div>                                                                           
                                                                           <div class="col-sm-12 col-lg">
                                                                               <p class="">Data execução: <?php echo date('d-m-y', strtotime($listaServ['data_finalizacao'])) ?> </p>
                                                                           </div>
                                                                           </div>
                                                                           <div class="row font-weight-bolder">
                                                                           <div class="col-sm-12 col-lg-4">
                                                                               <p class="">Responsável: <?php echo $listaServ['nome_tecnico']; ?></p>                                                                           
                                                                           </div>
                                                                           <div class="col-sm-12 col-lg">
                                                                                <p class="">Autorizado por: <?php echo $listaServ['nome']; ?></p>
                                                                           </div>                                                                           
                                                                           </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-lg-4">
                                                                                    <p class=" font-weight-bolder">Conclusão do serviço:</p>
                                                                                </div>
                                                                                <div class="col-sm-12 col-lg">
                                                                                    <p> <?php echo $listaServ['detalhes_servico']; ?></p>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            
                                                                       <?php } ?>





                                                                   <?php endforeach; ?>

                                                                   <hr class="divider">


                                                                   <p class="card-text font-weight-bolder">Problema não foi resolvido?</p>
                                                                   <div class="form-group">
                                                                       <label for="detalhes">Detalhes:</label>
                                                                       <textarea class="form-control col-sm-12 col-lg-10" name="detalhes" id="detalhes" rows="3"></textarea>
                                                                   </div>
                                                                   <button type="submit" class="btn btn-primary mb-2">OK</button>
                                                               </form>
                                                           </div>
                                                       </div>                                                    
                                                            
                                                        
                                                

                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                        
                        
                        <!-- FIM MODAL REABRIR CHAMADO -->
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <!-- MODAL EDITAR CHAMADO -->
                        <div class="modal fade" id="ModalEditar<?php echo $lista['id_chamado']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Editar chamado</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                            </div>
                                            <div class="modal-body">
                                                <div class="card">
                                                    <div class="card">
                                                        <h5 class="card-header">Nº chamado <?php echo $lista['id_chamado']; ?></h5>
                                                        <div class="card-body">
                                                            
                                                            <form name="formChamado" id="formChamado" action="<?php echo DIRPAGE . 'controller/controllerChamado'; ?>" method="post">

                                                                <div class="form-group">

                                                                </div>

                                                                <input type="hidden" class="form-control" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION['id_usuario']; ?>">
                                                                <input type="hidden" class="form-control" name="id_chamado" id="id_chamado" value="<?php echo $lista['id_chamado']; ?>">
                                                                <input type="hidden" class="form-control" name="acao" id="acao" value="EditarChamado">

                                                                <div class="form-group">
                                                                    <p>Serviço solicitado: <?php echo $lista['servico']; ?></p>
                                                                    <p>Detalhes: <?php echo $lista['detalhes']; ?></p>

                                                                </div>                        

                                                                <div class="form-group">
                                                                    <label for="detalhes">Editar descrição do chamado:</label>
                                                                    <textarea class="form-control" name="detalhes" id="detalhes" rows="3" value="" ><?php echo $lista['detalhes']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">                                                                    
                                                                    <input type="file" class="form-control-file" id="imagem">
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Enviar</button>

                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>                                                       

                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                        
                        <!-- FIM DO MODAL EDITAR CHAMADO -->
                         
                        
                        <!-- modal cancelar chamado -->
                        
                         <div class="modal fade" id="ModalCancelar<?php echo $lista['id_chamado']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Cancelar chamado</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                            </div>
                                            <div class="modal-body">
                                               <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title">Nº chamado: <?php echo $lista['id_chamado']; ?></h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <form method="POST" action="<?php echo DIRPAGE . 'controller/controllerChamado'; ?>" enctype="multipart/form-data">
                                                            <input class="form-control" type="hidden" name="acao" id="acao" value="cancelarChamado">
                                                            <input class="form-control" type="hidden" name="id_chamado" id="id_chamado" value="<?php echo $lista['id_chamado']; ?>">
                                                            <input class="form-control" type="hidden" name="status" id="status" value="cancelado lojista">
                                                            
                                                                <p class="card-text">Deseja mesmo cancelar o chamado Nº <?php echo $lista['id_chamado'];?>?</p>
                                                                
                                                                <button type="submit" class="btn btn-primary mb-2">OK</button>
                                                         </form>
                                                    </div>
                                                </div>                                                    
                                                            
                                                        
                                                

                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                        
                        <!-- fim do modal encerrar chamado -->
                        
                        
                        
                        
                        
                        
                        
                        
                        
                               <?php } ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
            

        </div>


    
<!-- MODAL AVALIAR CHAMADO --> 
<div class="modal fade bd-example-modal-xl" id="ModalAvaliar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		  <div class="modal-dialog " role="document">
			<div class="modal-content">
			  <div class="modal-header">
                              <h4 class="modal-title" id="exampleModalLabel">Avaliar chamado</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				
			  </div>
                            <div class="modal-body">
                                <form method="POST" action="<?php echo DIRPAGE . 'controller/controllerChamado'; ?>" enctype="multipart/form-data">
                                    <input class="form-control" type="hidden" id="id_chamado" name="id_chamado">
                                    <input class="form-control" type="hidden" id="acao" name="acao" value="avaliarChamado">


                                    <div class="form-group">
                                        
                                        
                                        <h5 class="id-chamado" id="id-chamado">Chamado</h5>

                                    </div>
                                    <p>Como foi atendido?</p>
                                    	<div class="estrelas">
                                                <input type="radio" id="vazio" name="estrela" value="" checked>

                                                <label for="estrela_um"><i class="fa"></i></label>
                                                <input type="radio" id="estrela_um" name="estrela" value="1">

                                                <label for="estrela_dois"><i class="fa"></i></label>
                                                <input type="radio" id="estrela_dois" name="estrela" value="2">

                                                <label for="estrela_tres"><i class="fa"></i></label>
                                                <input type="radio" id="estrela_tres" name="estrela" value="3">

                                                <label for="estrela_quatro"><i class="fa"></i></label>
                                                <input type="radio" id="estrela_quatro" name="estrela" value="4">

                                                <label for="estrela_cinco"><i class="fa"></i></label>
                                                <input type="radio" id="estrela_cinco" name="estrela" value="5"><br><br>

                                                

                                        </div>
                                   
                                                               
                                    
                                    <button type="submit" class="btn btn-primary">Avaliar</button>

                                </form>
                            </div>			  
			</div>
		  </div>
		</div>                         
                        
<!-- FIM MODAL AVALIAR CHAMADO -->

<?php \Classes\ClassLayout::setFooter(); ?>


