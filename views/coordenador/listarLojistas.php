<?PHP \Classes\ClassLayout::setHeadRestrito(); ?>
<?php
$lojistas = new Controllers\controllerListar();
$lista = $lojistas->listarLojistas();
$listarTodos = $lista->fetchAll(PDO::FETCH_ASSOC);
?>

<?php \Classes\ClassLayout::setHead('Listar lojistas', 'Tela lista todos os lojistas'); ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lojitas cadastrados</h6>
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
                                <th>Empresa</th>                               
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Empresa</th>                               
                                <th scope="col">Status</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($listarTodos as $lista) : ?>
                                <tr>

                                    <th scope="row"><?php echo $lista['id_lojista']; ?></th>
                                    <td><?php echo $lista['nome']; ?></td>
                                    <td><?php echo $lista['empresa']; ?></td>                                   
                                    <td><?php echo $lista['status']; ?></td>
                                    <td>                                                        
                                        <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target=
                                        "#myModal<?php echo $lista['id_lojista']; ?>"><i class="fas fa-eye"></i></button> 
                                        
                                        <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target=
                                        "#ModalEditar<?php echo $lista['id_lojista']; ?>"><i class="far fa-edit"></i></button> 
                                    </td>
                                        
                                       

                                </tr>
                           <!-- INICIO MODAL VISUALIZAR -->
                            <div class="modal fade" id="myModal<?php echo $lista['id_lojista']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Cadastro</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            
                                        </div>
                                        <div class="modal-body">

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title">ID lojista: <?php echo $lista['id_lojista']; ?></h5>                                                        
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="card">
                                                            
                                                            <div class="card-body">
                                                        <div class="row">                                                            
                                                            <div class="col">
                                                                <p class="card-title">Nome lojista: <br><?php echo $lista['nome']; ?></p>
                                                            </div>
                                                            <div class="col">
                                                                <p class="card-text">CNPJ: <br><?php echo $lista['cnpj']; ?></p>
                                                            </div>
                                                        </div>
                                                        <hr class="sidebar-divider">
                                                        Localizacao:
                                                        <div class="row">
                                                            <div class="col">
                                                                <p class="card-text">Loja: <?php echo $lista['localizacao']; ?></p>
                                                            </div>
                                                            <div class="col">
                                                                <p class="card-text">Empresa: <?php echo $lista['empresa']; ?></p>
                                                            </div>
                                                        </div>
                                                        <hr class="divider">
                                                        Contatos:
                                                         <div class="row">
                                                            <div class="col">
                                                                <p class="card-text">E-mail: <?php echo $lista['email']; ?></p>
                                                            </div>
                                                            <div class="col">
                                                                <p class="card-text">Telefone: <?php echo $lista['telefone']; ?></p>
                                                            </div>
                                                        </div>
                                                        <hr class="sidebar-divider">
                                                        <div class="col">                                          
                                                        <p class="card-text">Data cadastro: <?php echo date('d-m-y', strtotime($lista['data_cadastro']));  ?></p>
                                                        <p class="card-text">Status: <?php echo $lista['status']; ?></p>
                                                        </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM MODAL VISUALIZAR -->
                            
                            
                            <!-- INICIO MODAL EDITAR -->
                             <div class="modal fade" id="ModalEditar<?php echo $lista['id_lojista']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                                        
                                                        
                                                           
                                                                <div class="form-group row">
                                                                    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" readonly class="form-control-plaintext" id="nome" value="<?php echo $lista['nome']?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" readonly class="form-control-plaintext" id="email" value="<?php echo $lista['email']?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" readonly class="form-control-plaintext" id="telefone" value="<?php echo $lista['telefone']?>">
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group row">
                                                                    <label for="cnpj" class="col-sm-2 col-form-label">CNPJ</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" readonly class="form-control-plaintext" id="cnpj" value="<?php echo $lista['cnpj']?>">
                                                                    </div>
                                                                </div>
                                                            <form name="formAgendar" id="formAlterStatus" action="<?php echo DIRPAGE . 'controller/controllerCadastro'; ?>" method="post">
                                                                <input type="hidden" class="form-control" name="acao" id="acao" value="alterStatusLojista">
                                                                <input type="hidden" class="form-control" name="id_lojista" id="id_lojista" value="<?php echo $lista['id_lojista'] ?>">
                                                                <div class="form-group row">
                                                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                                                    <div class="col-sm-10">
                                                                        <select class="form-control col-3" name="status" id="status" value="<?php echo $lista['status'] ?>">
                                                                            
                                                                            <option value="null">status</option>
                                                                            <option value="ativo">Ativo</option>
                                                                            <option value="inativo">Inativo</option>
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


