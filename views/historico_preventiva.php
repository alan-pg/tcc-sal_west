<?PHP \Classes\ClassLayout::setHeadRestrito(); ?>

<?php
$lista = new Controllers\ControllerListar();
$l = $lista->listarHistoricoPreventiva();

$listarTodos = $l->fetchAll(PDO::FETCH_ASSOC);






?>


<?php \Classes\ClassLayout::setHead('Listar agenda preventiva', 'Tela lista agenda de manutenção preventiva'); ?>


        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Histórico manutenção preventiva</h6>
            </div>
            <div class="card-body">


                <div class="table-responsive table-sm">
                    
                   
                    
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>loja</th>
                                <th>preventiva</th>                                
                                <th>Data</th>                                
                                <th>Ações</th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>loja</th>
                                <th>preventiva</th>                                
                                <th>Data</th>                                
                                <th>Ações</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($listarTodos as $lista) : ?>
                                <tr>

                                    <th><?php echo $lista['id_historico']; ?></th>
                                    <td><?php echo $lista['localizacao']; ?></td>
                                    <td><?php echo $lista['nome_preventiva']; ?></td>                                   
                                    <td><?php echo date('d-m-Y', strtotime($lista['data_execucao'])); ?></td>
                                      
                                    <td>                                                        
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=
                                        "#myModal<?php echo $lista['id_historico']; ?>"><i class="fas fa-eye"></i></button> 
                                </tr>
                                
                                
                                
                               <!-- INICIO MODAL VISUALIZAR PREVENTIVA -->
                            <div class="modal fade" id="myModal<?php echo $lista['id_historico']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                                                 
                                                        <p class="card-text">Local loja: <?php echo $lista['localizacao']; ?></p>
                                                        <p class="card-text">Manutenção preventiva: <?php echo $lista['nome_preventiva']; ?></p>
                                                        <p class="card-text">Colaborador responsável: <?php echo $lista['nome_tecnico']; ?></p>
                                                        <p class="card-text">Data de execução: <?php echo $lista['data_execucao']; ?></p>
                                                        
                                                        
                                                    </div>
                                                </div> 
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM MODAL VISUALIZAR PREVENTIVA -->
                               <?php                                
                                   
                                    endforeach; 
                                    
                                ?>
                        </tbody>
                    </table>
                   
                </div>
            </div>
            
    

        </div>




<?php \Classes\ClassLayout::setFooter(); ?>



