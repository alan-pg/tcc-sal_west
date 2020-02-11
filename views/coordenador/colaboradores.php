<?PHP \Classes\ClassLayout::setHeadRestrito(); ?>
<?php \Classes\ClassLayout::setHead('Cadastro funcionario', 'Tela de cadastro de novos funcionarios'); ?>
  
<?php
$funcionarios = new Controllers\controllerListar();
$lista = $funcionarios->listarTenicos();
$listarTodos = $lista->fetchAll(PDO::FETCH_ASSOC);
// parei aqui, precisa mudar as variaveis para funcionarios
?>


<?php \Classes\ClassLayout::setHead('Listar colaboradore', 'Tela lista todos os colaboradores'); ?>

        <div class="card shadow mb-4">
            
            <div class="card-header py-3">
                 
                <h6 class="m-0 font-weight-bold text-primary">Colaboradores cadastrados</h6>
                <a href="#" data-toggle="modal" data-target="#ModalNovo" class="btn btn-primary btn-icon-split" >
                    <span class="icon text-white-50">
                     <i class="fas fa-user-plus"></i> 
                    </span>
                    <span class="text">Cadastrar</span>
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

                                    <th scope="row"><?php echo $lista['id_tecnico']; ?></th>
                                    <td><?php echo $lista['nome_tecnico']; ?></td>
                                    <td><?php echo $lista['email_tecnico']; ?></td>                                   
                                    <td><?php echo $lista['tel_tecnico']; ?></td>                                   
                                    <td><?php echo $lista['area_tecnico']; ?></td>                                   
                                    <td><?php echo $lista['status_tecnico']; ?></td>
                                    <td>                                                        
                                        <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target=
                                        "#myModal<?php echo $lista['id_tecnico']; ?>"><i class="fas fa-eye"></i></button> 
                                        
                                        <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target=
                                        "#ModalEditar<?php echo $lista['id_tecnico']; ?>"><i class="far fa-edit"></i></button> 
                                    </td>
                                        
                                       

                                </tr>
                            <!-- INICIO MODAL VISUALIZAR -->
                            <div class="modal fade" id="myModal<?php echo $lista['id_tecnico']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Cadastro</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            
                                        </div>
                                        <div class="modal-body">

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title"><?php echo $lista['nome_tecnico']; ?></h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title">ID colaborador: <?php echo $lista['id_tecnico']; ?></h5>
                                                        <p class="card-text">E-mail: <?php echo $lista['email_tecnico']; ?></p>
                                                        <p class="card-text">Telefone: <?php echo $lista['tel_tecnico']; ?></p>
                                                        <p class="card-text">Cargo: <?php echo $lista['area_tecnico']; ?></p>
                                                        <p class="card-text">Status: <?php echo $lista['status_tecnico']; ?></p>
                                                    </div>
                                                </div>

                                            </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM MODAL VISUALIZAR -->
                            
                            
                            
                            <!-- INICIO MODAL EDITAR -->
                            <div class="modal fade" id="ModalEditar<?php echo $lista['id_tecnico']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Edição</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            
                                        </div>
                                        <div class="modal-body">

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title"><?php echo $lista['nome_tecnico']; ?></h5>
                                                    </div>
                                                    <div class="card-body">
                                                    <form name="formEditColaborador" id="formEditColaborador" action="<?php echo DIRPAGE . 'controller/controllerCadastro'; ?>" method="post">
                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control" name="acao" id="acao" value="editarColaborador">
                                                                <input type="hidden" class="form-control" name="id_colaborador" id="id_colaborador" value="<?php echo $lista['id_tecnico']; ?>">
                                                                <div class="row">
                                                                    <div class="form-group col">
                                                                        <label for="nome">Nome:</label>
                                                                        <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $lista['nome_tecnico']; ?>" required>
                                                                    </div>

                                                                    <div class="form-group col">
                                                                        <label for="mail">Email:</label>
                                                                        <input class="form-control" type="email" id="email" name="email" value="<?php echo $lista['email_tecnico']; ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col">
                                                                        <label for="telefone">Telefone:</label>
                                                                        <input class="form-control" type="text" id="telefone" name="telefone" value="<?php echo $lista['tel_tecnico']; ?>" required>
                                                                    </div>


                                                                    <div class="form-group col">
                                                                        <label for="cpf">cpf:</label>
                                                                        <input class="form-control" type="text" id="cpf" name="cpf" value="<?php echo $lista['cpf']; ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                <div class="form-group col-4">
                                                                    <label for="area_colaborador">Área:</label>
                                                                    <select class="form-control" name="area_colaborador" id="area_colaborador">
                                                                        <option value="<?php echo $lista['area_tecnico']; ?>" ><?php echo $lista['area_tecnico']; ?></option>
                                                                        <option value="SERVIÇOS GERAIS" >SERVIÇOS GERAIS</option>
                                                                        <option value="HIDRÁULICA" >HIDRÁULICA</option>
                                                                        <option value="ELÉTRICA" >ELÉTRICA</option>
                                                                        <option value="MANUTENÇÃO PREDIAL" >MANUTENÇÃO PREDIAL</option>
                                                                        <option value="OBRA" >OBRA</option>
                                                                        <option value="SEGURANÇA PATRIMONIAL" >SEGURANÇA PATRIMONIAL</option>
                                                                        <option value="BOMBEIRO CIVIL" >BOMBEIRO CIVIL</option>

                                                                    </select>                                                                    
                                                                </div>                    
                                                                <div class="form-group col-4">
                                                                    <label for="status">Status:</label>
                                                                    <select class="form-control" name="status" id="status">
                                                                        <option value="<?php echo $lista['status_tecnico']; ?>"><?php echo $lista['status_tecnico']; ?></option>
                                                                        <option value="ativo">ativo</option>                                                                        
                                                                        <option value="inativo">inativo</option>                                                                        
                                                                    </select>
                                                                </div>
                                                                </div>



                                                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                                                                <div class="retornoCad text-danger"> </div>


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

    <!-- INICIO MODAL NOVO COLABORADOR -->
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
                                                        <h5 class="card-title">Novo colaborador</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        
                                                        <h5 class="card-title">Dados do colaborador</h5>

                                                        <form name="formCadastr" id="formCadastr" action="<?php echo DIRPAGE . 'controller/controllerCadastro'; ?>" method="post">
                                                                <div class="form-group">
                                                                    <input type="hidden" class="form-control" name="acao" id="acao" value="novoTecnico">
                                                                    <div class="row">
                                                                    <div class="form-group col">
                                                                        <label for="nome">Nome:</label>
                                                                        <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome:" required>
                                                                    </div>

                                                                    <div class="form-group col">
                                                                        <label for="mail">Email:</label>
                                                                        <input class="form-control" type="email" id="email" name="email" placeholder="Email:" required>
                                                                    </div>
                                                                    </div>
                                                                    <div class="row">
                                                                    <div class="form-group col">
                                                                        <label for="telefone">Telefone:</label>
                                                                        <input class="form-control" type="text" id="telefone" name="telefone" placeholder="Telefone:" required>
                                                                    </div>


                                                                    <div class="form-group col">
                                                                        <label for="cpf">cpf:</label>
                                                                        <input class="form-control" type="text" id="cpf" name="cpf" placeholder="cpf:" required>
                                                                    </div>
                                                                    </div>
                                                                      <div class="row">
                                                                <div class="form-group col-4">
                                                                    <label for="area_colaborador">Área:</label>
                                                                    <select class="form-control" name="area_colaborador" id="area_colaborador">
                                                                        
                                                                        <option value="SERVIÇOS GERAIS" >SERVIÇOS GERAIS</option>
                                                                        <option value="HIDRÁULICA" >HIDRÁULICA</option>
                                                                        <option value="ELÉTRICA" >ELÉTRICA</option>
                                                                        <option value="MANUTENÇÃO PREDIAL" >MANUTENÇÃO PREDIAL</option>
                                                                        <option value="OBRA" >OBRA</option>
                                                                        <option value="SEGURANÇA PATRIMONIAL" >SEGURANÇA PATRIMONIAL</option>
                                                                        <option value="BOMBEIRO CIVIL" >BOMBEIRO CIVIL</option>

                                                                    </select>                                                                    
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
                                                                    <div class="retornoCad text-danger"> </div>


                                                            </form>				

                                                    </div>
                                                </div>

                                            </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <!-- FIM MODAL NOVO COLABORADOR -->



<?php \Classes\ClassLayout::setFooter(); ?>



            







