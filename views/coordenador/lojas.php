<?PHP \Classes\ClassLayout::setHeadRestrito(); ?>
<?php \Classes\ClassLayout::setHead('Cadastro funcionario', 'Tela de cadastro de novos funcionarios'); ?>
  
<?php
$funcionarios = new Controllers\controllerListar();
$lista = $funcionarios->listarLojas();
$listarTodos = $lista->fetchAll(PDO::FETCH_ASSOC);
// parei aqui, precisa mudar as variaveis para funcionarios
?>


<?php \Classes\ClassLayout::setHead('Listar colaboradore', 'Tela lista todos os colaboradores'); ?>

        <div class="card shadow mb-4">
            
            <div class="card-header py-3">
                <a href="#" data-toggle="modal" data-target="#ModalNovo" class="btn btn-primary btn-icon-split" >
                    <span class="icon text-white-50">
                     <i class="fas fa-user-plus"></i> 
                    </span>
                    <span class="text">Cadastrar</span>
                  </a>
                <h6 class="m-0 font-weight-bold text-primary">Lojas cadastradas</h6>
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
                                <th>Local</th>
                                <th>Status</th>                               
                                <th>Ações</th>                               
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Local</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($listarTodos as $lista) : ?>
                                <tr>

                                    <th scope="row"><?php echo $lista['id_loja']; ?></th>
                                    <td><?php echo $lista['localizacao']; ?></td>
                                    <td><?php echo $lista['status_loja']; ?></td>                                   
                                    
                                    <td>                                                        
                                        <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target=
                                        "#myModal<?php echo $lista['id_loja']; ?>"><i class="fas fa-eye"></i></button> 
                                        
                                        <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target=
                                        "#ModalEditar<?php echo $lista['id_loja']; ?>"><i class="far fa-edit"></i></button> 
                                    </td>
                                        
                                       

                                </tr>
                            <!-- INICIO MODAL VISUALIZAR -->
                            <div class="modal fade" id="myModal<?php echo $lista['id_loja']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Cadastro</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            
                                        </div>
                                        <div class="modal-body">

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title">Endereço loja</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title">Localização <?php echo $lista['localizacao']; ?></h5>
                                                        <p class="card-text">Status loja <?php echo $lista['status_loja']; ?></p>
                                                        
                                                    </div>
                                                </div>

                                            </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM MODAL VISUALIZAR -->
                            
                            
                            
                            <!-- INICIO MODAL EDITAR -->
                            <div class="modal fade" id="ModalEditar<?php echo $lista['id_loja']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Edição</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            
                                        </div>
                                        <div class="modal-body">

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title">ID Loja<?php echo $lista['id_loja']; ?></h5>
                                                    </div>
                                                    <div class="card-body">
                                                            <form name="formEditLoja" id="formEditLoja" action="<?php echo DIRPAGE . 'controller/controllerConfiguracao'; ?>" method="post">

                                                                <input type="hidden" class="form-control" name="acao" id="acao" value="editarLoja">
                                                                <input type="hidden" class="form-control" name="id_loja" id="id_loja" value="<?php echo $lista['id_loja']; ?>">
                                                                <div class="row">
                                                                    <div class="form-group col">
                                                                        <label for="nome">Endereço:</label>
                                                                        <input class="form-control" type="text" id="localizacao" name="localizacao" value="<?php echo $lista['localizacao']; ?>" required>
                                                                    </div>
                                                                    <div class="form-group col-4">
                                                                        <label for="status">Status:</label>
                                                                        <select class="form-control" name="status" id="status">
                                                                            <option value="<?php echo $lista['status_loja']; ?>" selected><?php echo $lista['status_loja']; ?></option>                                                                        
                                                                            <option value="ativo" selected>ativo</option>                                                                        
                                                                            <option value="inativo">inativo</option>                                                                        
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Editar</button>



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

    <!-- INICIO MODAL NOVA LOJA -->
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
                                                        <h5 class="card-title">Nova loja</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        
                                                        <h5 class="card-title">Dados da loja</h5>

                                                        <form name="formCadLoja" id="formCadLoja" action="<?php echo DIRPAGE . 'controller/controllerConfiguracao'; ?>" method="post">
                                                            
                                                                <input type="hidden" class="form-control" name="acao" id="acao" value="novaLoja">
                                                                <div class="row">
                                                                    <div class="form-group col">
                                                                        <label for="nome">Endereço:</label>
                                                                        <input class="form-control" type="text" id="localizacao" name="localizacao" placeholder="localizacao:" required>
                                                                    </div>
                                                                    <div class="form-group col-4">
                                                                        <label for="status">Status:</label>
                                                                        <select class="form-control" name="status" id="status">
                                                                            <option value="ativo" selected>ativo</option>                                                                        
                                                                            <option value="inativo">inativo</option>                                                                        
                                                                        </select>
                                                                    </div>
                                                        </div>
                                                                    <button type="submit" class="btn btn-primary">Cadastrar</button>



                                                           </form>				

                                                    </div>
                                                </div>

                                            </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <!-- FIM MODAL NOVO COLABORADOR -->



<?php \Classes\ClassLayout::setFooter(); ?>



            







