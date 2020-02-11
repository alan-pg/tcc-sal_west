<?PHP \Classes\ClassLayout::setHeadRestrito(); ?>

<?php
$lista = new Controllers\ControllerListar();
$l = $lista->listarAgendaPreventiva();
$listarTodos = $l->fetchAll(PDO::FETCH_ASSOC);

$t = $lista->listarTenicos();
$listarTenicos = $t->fetchAll(PDO::FETCH_ASSOC);

$lojas = $lista->listarLojas();
$listarLojas = $lojas->fetchAll(PDO::FETCH_ASSOC);

$prev = $lista->listarTipoPreventiva();
$listaPrev = $prev->fetchAll(PDO::FETCH_ASSOC);

 $hoje= date("Y-m-d");
?>


<?php \Classes\ClassLayout::setHead('Listar agenda preventiva', 'Tela lista agenda de manutenção preventiva'); ?>

        <?php
        if (isset($_GET['retorno'])) {
            echo $_GET['retorno'];
        }
        ?>       
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Agenda de manutenção preventiva</h6>
                
                
                
                
                <a target="Frame1" href="agendar_nova_preventiva" class="btn btn-primary btn-icon-split" >
                    <span class="icon text-white-50">
                      <i class="far fa-calendar-plus"></i> 
                    </span>
                    <span class="text">Agendar</span>
                  </a>
                
            </div>
            <div class="card-body">


                <div class="table-responsive table-sm">
                    
                   
                    
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                
                                <th>loja</th>
                                <th>preventiva</th>                                
                                <th>Ultima</th>
                                <th>Próxima</th>
                                <th>Ações</th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                               
                                <th>loja</th>
                                <th>preventiva</th>                                
                                <th>Ultima</th>
                                <th>Próxima</th>
                                <th>Ações</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($listarTodos as $lista) : ?>
                                <tr>

                                    
                                    <td><?php echo $lista['localizacao']; ?></td>
                                    <td><?php echo $lista['nome_preventiva']; ?></td>                                   
                                    <td><?php echo $lista['ultima_prev']; ?></td>
                                      <td><?php if($lista['prox_prev'] < $hoje){ ?>
                                          <div class="badge badge-danger text-wrap" style="width: 6rem;">
                                                <?php echo date('d-m-Y', strtotime($lista['prox_prev']));?>
                                          </div>
                                          <?php }else{?><div class="badge badge-success text-wrap" style="width: 6rem;"> <?php echo date('d-m-Y', strtotime($lista['prox_prev']));} ?></div></td>
                                    <td>                                                        
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=
                                        "#myModal<?php echo $lista['id_manutencao_prev']; ?>"><i class="fas fa-eye"></i></button> 
                                        
                                        
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=
                                        "#ModalAgendar<?php echo $lista['id_manutencao_prev']; ?>"><i class="far fa-calendar-check"></i></button> 
                                        
                                        
                                         <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=
                                        "#ModalExcluir<?php echo $lista['id_manutencao_prev']; ?>"><i class="far fa-trash-alt"></i></button> 

                                </tr>
                                
                                
                                <!-- MODAL EXCLUIR -->
                                <div class="modal fade" id="ModalExcluir<?php echo $lista['id_manutencao_prev']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Detalhes do manutenção</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            
                                        </div>
                                        <div class="modal-body">
                                            
                                             <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title"><?php echo "Loja: ".$lista['localizacao']." - ". $lista['nome_preventiva']; ?></h5>
                                                    </div>
                                                    <div class="card-body">         
                                                    <form name="fomrExcluir" id="fomrExcluir" action="<?php echo DIRPAGE . 'controller/controllerPreventiva'; ?>" method="post">
                                                        <input type="hidden" class="form-control" name="acao" id="acao" value="excluirAgendamento">
                                                        <input type="hidden" class="form-control" name="id_manutencao_prev" id="id_manutencao_prev" value="<?php echo $lista['id_manutencao_prev']; ?>">
                                                        <p class="card-text">Deseja excluir esse agendamento?</p>         
                                                        <button type="submit" class="btn btn-primary mb-2">OK</button>
                                                    </form>   
                                                    </div>
                                                </div> 
                                            
                                        </div>
                                    </div> 
                                </div>
                            </div>
                                
                                
                                
                                
                                <!-- FIM MODAL EXCLUIR -->
                                
                                
                                
                                
                                
                                
                                
                                
                               <!-- INICIO MODAL VISUALIZAR PREVENTIVA -->
                            <div class="modal fade" id="myModal<?php echo $lista['id_manutencao_prev']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Detalhes da manutenção</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            
                                        </div>
                                        <div class="modal-body">
                                            
                                             <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title"><?php echo $lista['nome_preventiva']; ?></h5>
                                                    </div>
                                                    <div class="card-body">                                                                                                               
                                                        <p class="card-text">Descrição: <?php echo $lista['descricao']; ?></p>         
                                                        <p class="card-text">Local loja: <?php echo $lista['localizacao']; ?></p>
                                                        <p class="card-text">Próxima manutenção prevista para: <?php echo $lista['prox_prev']; ?></p>
                                                    </div>
                                                </div> 
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM MODAL VISUALIZAR PREVENTIVA -->
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <!-- INICIO MODAL CONTROLAR AGENDAMENTO -->
                               <div class="modal fade" id="ModalAgendar<?php echo $lista['id_manutencao_prev']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Agenda de prevenção</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            
                                        </div>
                                        <div class="modal-body">
                                            
                                             <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title"><?php echo "Loja: ".$lista['localizacao']." - ". $lista['nome_preventiva']; ?></h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <form name="formAgendar" id="formAgendar" action="<?php echo DIRPAGE . 'controller/controllerPreventiva'; ?>" method="post">
                                                            <input type="hidden" class="form-control" name="acao" id="acao" value="agendarProx">
                                                            
                                                            <input type="hidden" class="form-control" name="id_manutencao_prev" id="id_manutencao_prev" value="<?php echo $lista['id_manutencao_prev']; ?>">
                                                            
                                                            <input type="hidden" class="form-control" name="nome_preventiva" id="nome_preventiva" value="<?php echo $lista['nome_preventiva']; ?>">
                                                            
                                                            <input type="hidden" class="form-control" name="id_loja" id="id_loja" value="<?php echo $lista['fk_loja']; ?>">
                                                             
                                                             <p class="card-text">Descrição: <?php echo $lista['descricao']; ?></p>         
                                                             
                                                             <hr class="divider">
                                                             <h5>Manutenção preventiva realizada</h5>
                                                             <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="data_execucao"> Data da execucao:</label>
                                                                    <input class="form-control" id="ultima_prev" name="ultima_prev" type="date"  max="<?php echo date('Y-m-d');?>" value="<?php echo date("Y-m-d"); ?>">
                                                                </div>
                                                            
                                                            <div class="form-group col-6">
                                                                    <label for="id_tecnico">Colaborador responsável:</label>
                                                                    <select class="form-control" name="id_colaborador" id="id_colaborador">
                                                                           <option>Selecione o colaborador</option>                                                                    
                                                                    <?php
                                                                       foreach ($listarTenicos as $lista) :
                                                                           echo '<option value="' . $lista['id_tecnico'] . '">' . $lista['nome_tecnico'] . '</option>';
                                                                       endforeach;
                                                                    ?>
                                                                    </select>    
                                                                </div>
                                                             </div>
                                                            
                                                             <hr class="divider">
                                                             <div class="form-group">
                                                             <h5>Próxima manutenção</h5>
                                                             <label for="prox_prev"> Data proxima preventiva:</label>
                                                             <input class="form-control col-6" id="prox_prev" name="prox_prev" type="date" min="<?php echo date("Y-m-d"); ?>" value="<?php echo date("Y-m-d"); ?>">
                                                             </div>
                                                            
                                                                 <button type="submit" class="btn btn-primary mb-2">OK</button>
                                                            </form>
                                                        
                                                    </div>
                                                </div> 
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <!-- FIM MODAL CONTROLAR AGENDAMENTO -->
                            
                            
                            
                                <?php                                
                                   
                                    endforeach; 
                                    
                                ?>
                        </tbody>
                    </table>
                   
                </div>
            </div>
            <!-- MODAL AGENDAR NOVO -->
            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Novo agendamento</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        </div>
                        <div class="modal-body">

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Novo agendamento</h5>
                                    <div class="retornoCad text-danger"> </div>
                                </div>
                                <div class="card-body">                                                                                                               
                                    <p class="card-text">loja</p>  
                                    
                                <form name="formAgendar" id="formAgendar" action="<?php echo DIRPAGE . 'controller/controllerPreventiva'; ?>" method="post">
                                    <input type="hidden" class="form-control" name="acao" id="acao" value="agendarNovo">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="id_loja">Loja:</label>
                                            <select class="form-control" name="id_loja" id="id_loja">
                                            <option>Selecione a loja</option>
                                            <?php
                                            foreach ($listarLojas as $lista) :
                                                echo '<option value="' . $lista['id_loja'] . '">' . $lista['localizacao'] . '</option>';
                                            endforeach;
                                            ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-6">
                                            <label for="id_manutencao_prev">Tipo preventiva:</label>
                                            <select class="form-control" name="id_manutencao_prev" id="id_manutencao_prev">
                                            <option>Selecione a manutenção preventiva</option>
                                            <?php
                                            foreach ($listaPrev as $lista) :
                                                echo '<option value="' . $lista['id_preventiva'] . '">' . $lista['nome_preventiva'] . '</option>';
                                            endforeach;
                                            ?>
                                            </select>    
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group col-6">
                                        
                                        <label for="prox_prev"> Ultima manutenção preventiva:</label>
                                        <input class="form-control col-6" id="ultima_prev" name="ultima_prev" type="date" max="<?php echo date("Y-m-d"); ?>" value="<?php echo date("Y-m-d"); ?>">
                                    </div>
                                    
                                    <div class="form-group col-6">
                                        
                                        <label for="prox_prev"> Data proxima preventiva:</label>
                                        <input class="form-control col-6" id="prox_prev" name="prox_prev" type="date" min="<?php echo date("Y-m-d"); ?>" value="<?php echo date("Y-m-d"); ?>">
                                    </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary mb-2">OK</button>
                                    
                                </form>
                                </div>
                            </div> 

                        </div>
                    </div>
                </div>
            </div>

            <!-- FIM MODAL AGENDAR NOVO -->

            
            
            
        </div>




<?php \Classes\ClassLayout::setFooter(); ?>


