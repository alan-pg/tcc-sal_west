<?PHP \Classes\ClassLayout::setHeadRestrito(); ?>
<?php
$funcionarios = new Controllers\controllerListar();
$lista = $funcionarios->listarFuncionarios();
$listarTodos = $lista->fetchAll(PDO::FETCH_ASSOC);
// parei aqui, precisa mudar as variaveis para funcionarios
?>


<?php \Classes\ClassLayout::setHead('Listar funcionarios', 'Tela lista todos os funcionarios'); ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Funcionarios cadastrados</h6>
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
                                <th>E-mail</th>                               
                                <th>Telefone</th>
                                <th>Cargo</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>E-mail</th>                               
                                <th>Telefone</th>
                                <th>Cargo</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($listarTodos as $lista) : ?>
                                <tr>

                                    <th scope="row"><?php echo $lista['id_funcionario']; ?></th>
                                    <td><?php echo $lista['nome']; ?></td>
                                    <td><?php echo $lista['email']; ?></td>                                   
                                    <td><?php echo $lista['telefone']; ?></td>                                   
                                    <td><?php echo $lista['cargo']; ?></td>                                   
                                    <td><?php echo $lista['status']; ?></td>
                                    <td>                                                        
                                        <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target=
                                        "#myModal<?php echo $lista['id_funcionario']; ?>"><i class="fas fa-eye"></i></button> 
                                        
                                        <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target=
                                        "#ModalEditar<?php echo $lista['id_funcionario']; ?>"><i class="far fa-edit"></i></button> 
                                    </td>
                                        
                                       

                                </tr>
                            <!-- INICIO MODAL VISUALIZAR -->
                            <div class="modal fade" id="myModal<?php echo $lista['id_funcionario']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Cadastro</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            
                                        </div>
                                        <div class="modal-body">

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title"><?php echo $lista['nome']; ?></h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title">ID usuário: <?php echo $lista['id_funcionario']; ?></h5>
                                                        <p class="card-text">E-mail: <?php echo $lista['email']; ?></p>
                                                        <p class="card-text">Telefone: <?php echo $lista['telefone']; ?></p>
                                                        <p class="card-text">Cargo: <?php echo $lista['cargo']; ?></p>
                                                        <p class="card-text">CNPJ: <?php echo $lista['cpf']; ?></p>                                                        
                                                        <p class="card-text">Data do cadastro: <?php echo $lista['data_cadastro']; ?></p>
                                                        <p class="card-text">Status: <?php echo $lista['status']; ?></p>
                                                    </div>
                                                </div>

                                            </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM MODAL VISUALIZAR -->
                            
                            
                            <!-- INICIO MODAL EDITAR -->
                             <div class="modal fade" id="ModalEditar<?php echo $lista['id_funcionario']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Cadastro</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            
                                        </div>
                                        <div class="modal-body">

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title">ID funcionário: <?php echo $lista['id_funcionario']; ?></h5>
                                                    </div>
                                                    <div class="card-body">
                                                        
                                                        <form name="formAgendar" id="formAlterStatus" action="<?php echo DIRPAGE . 'controller/controllerCadastro'; ?>" method="post">
                                                            <input type="hidden" class="form-control" name="acao" id="acao" value="editarFuncionario">
                                                            <input type="hidden" class="form-control" name="id_funcionario" id="id_funcionario" value="<?php echo $lista['id_funcionario'] ?>">
                                                           
                                                                <div class="form-group row">
                                                                    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                                                                    <div class="col-sm-10">
                                                                        <input class="form-control"type="text"  name="nome" id="nome" value="<?php echo $lista['nome']?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                                                                    <div class="col-sm-10">
                                                                        <input class="form-control" type="text"  name="email" id="email" value="<?php echo $lista['email']?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="telefone" class="col-sm-2 col-form-label">Tel</label>
                                                                    <div class="col-sm-10">
                                                                        <input class="form-control" type="text"  name="telefone" id="telefone" value="<?php echo $lista['telefone']?>">
                                                                    </div>
                                                                </div>
                                                                 
                                                            
                                                                <div class="form-group row">
                                                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                                                    <div class="col-sm-10">
                                                                        <select class="form-control col-4" name="status" id="status" value="<?php echo $lista['status'] ?>">
                                                                            
                                                                            <option value="<?php echo $lista['status'] ?>"><?php echo $lista['status'] ?></option>
                                                                            <option value="ativo">ativo</option>
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
                            
                            
                            
                            <!-- FIM MODAL EDITAR -->



                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
            

        </div>

    


<?php \Classes\ClassLayout::setFooter(); ?>


