

<?PHP \Classes\ClassLayout::setHeadRestrito(); ?>
<?php \Classes\ClassLayout::setHead('Config preventivas', 'Tela de configuração dos tipos de manutenção preventiva'); ?>
  
<?php
$funcionarios = new Controllers\controllerListar();
$lista = $funcionarios->listarTipoPreventiva();
$listarTodos = $lista->fetchAll(PDO::FETCH_ASSOC);
?>




        <div class="card shadow mb-4">
            
            <div class="card-header py-3">
                 
                <h6 class="m-0 font-weight-bold text-primary">Lista de manutenção preventiva</h6>
                <a href="#" data-toggle="modal" data-target="#ModalNovo" class="btn btn-primary btn-icon-split" >
                    <span class="icon text-white-50">
                     <i class="fas fa-plus"></i> 
                    </span>
                    <span class="text">Novo</span>
                  </a>
            </div>
            <?php
					if(isset($_SESSION['msgErro'])){
						echo $_SESSION['msgErro'];
						unset($_SESSION['msgErro']);
					}
					if(isset($_SESSION['msgSucesso'])){
						echo $_SESSION['msgSucesso'];
						unset($_SESSION['msgSucesso']);
					}
				?>
            

            
            <div class="card-body">

                
                <div class="table-responsive-sm table-sm table-hover">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Descrição</th>                               
                                <th>Status</th>                               
                                <th>Ações</th>                               
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Descrição</th>                               
                                <th>Status</th>                               
                                <th>Ações</th> 
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($listarTodos as $lista) : ?>
                                <tr>

                                    <th scope="row"><?php echo $lista['id_preventiva']; ?></th>
                                    <td><?php echo $lista['nome_preventiva']; ?></td>
                                    <td><?php echo $lista['descricao']; ?></td>                                   
                                    <td><?php echo $lista['status_preventiva']; ?></td>                                   
                                    
                                    <td>   
                                        <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target=
                                        "#ModalEditar<?php echo $lista['id_preventiva']; ?>"><i class="far fa-edit"></i></button> 
                                    </td>
                                        
                                       

                                </tr>
                            
                            
                            
                            
                            <!-- INICIO MODAL EDITAR -->
                            <div class="modal fade" id="ModalEditar<?php echo $lista['id_preventiva']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Edição</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            
                                        </div>
                                        <div class="modal-body">

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title">ID manutenção: <?php echo $lista['id_preventiva']; ?></h5>
                                                    </div>
                                                    <div class="card-body">
                                                            <h5 class="card-title">Editar preventiva</h5>

                                                            <form name="formSubTipoPreventiva" id="formSubTipoPreventiva" action="<?php echo DIRPAGE . 'controller/controllerConfiguracao'; ?>" method="post">
                                                                    <div class="form-group col">
                                                                        <input type="hidden" class="form-control" name="acao" id="acao" value="editar_tipo_preventiva">
                                                                        <input type="hidden" class="form-control" name="id_manutencao_prev" id="id_manutencao_prev" value="<?php echo $lista['id_preventiva']; ?>">



                                                                        <div class="form-group">
                                                                            <label for="tipo_prev">Nome manutenção preventiva:</label>
                                                                            <input class="form-control" type="text" id="nome_preventiva" name="nome_preventiva" value="<?php echo $lista['nome_preventiva']; ?>" required>
                                                                        </div>       
                                                                        <div class="form-group">
                                                                            <label for="departamento">Descrição:</label>
                                                                            <input class="form-control" type="text" id="descricao" name="descricao" value="<?php echo $lista['descricao']; ?>" required>
                                                                        </div> 
                                                                        <div class="form-group col-4">
                                                                                <label for="status">Status:</label>
                                                                                <select class="form-control" name="status" id="status">
                                                                                    <option value="ativo" selected>ativo</option>                                                                        
                                                                                    <option value="inativo">inativo</option>                                                                        
                                                                                </select>
                                                                         </div>

                                                                        <button type="submit" class="btn btn-primary">Cadastrar</button>



                                                                </form>			

                                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM MODAL EDITAR -->
                            


                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
            

        </div>

    <!-- INICIO MODAL NOVA PREVENTIVA -->
                             <div class="modal fade" id="ModalNovo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Cadastro</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            
                                        </div>
                                        <div class="modal-body">

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title">Nova manutenção preventiva</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        
                                                        <form name="formSubTipoPreventiva" id="formSubTipoPreventiva" action="<?php echo DIRPAGE . 'controller/controllerConfiguracao'; ?>" method="post">
                                                            <div class="form-group col-5">
                                                                <input type="hidden" class="form-control" name="acao" id="acao" value="novo_tipo_preventiva">



                                                                <div class="form-group">
                                                                    <label for="tipo_prev">Tipo de manutenção preventiva:</label>
                                                                    <input class="form-control" type="text" id="nome_preventiva" name="nome_preventiva" placeholder="nome da nova manutenção preventiva:" required>
                                                                </div>       
                                                                <div class="form-group">
                                                                    <label for="departamento">Descrição:</label>
                                                                    <input class="form-control" type="text" id="descricao" name="descricao" placeholder="descrição:" required>
                                                                </div> 


                                                                <button type="submit" class="btn btn-primary">Cadastrar</button>



                                                        </form>			
                                                    </div>
                                                </div>

                                            </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <!-- FIM MODAL NOVA PREVENTIVA -->


    




<?php \Classes\ClassLayout::setFooter(); ?>




