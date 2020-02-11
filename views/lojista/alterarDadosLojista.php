<?PHP \Classes\ClassLayout::setHeadRestrito(); ?>
<?php \Classes\ClassLayout::setHead('Cadastro', 'Tela de cadastro'); ?>

<?php
$lista = new Controllers\controllerListar();
$listaLojas = $lista->listarLojas();
$dadosLojista = $lista->listarDados_lojista($_SESSION['id_usuario']);
$dados = $dadosLojista->fetch(PDO::FETCH_ASSOC);


//$listarLoja = $lista->fetchAll(PDO::FETCH_ASSOC);
?>

        <div class="card">
            <h5 class="card-header">Alterar meus dados</h5>

            <div class="card-body">
                

                <form name="formEdtLojista" id="formEdtLojista" action="<?php echo DIRPAGE . 'controller/controllerCadastro'; ?>" method="post">
                    <div class="form-group col">
                        <input type="hidden" class="form-control" name="acao" id="acao" value="editarLojista">
                        <input type="hidden" class="form-control" name="id_lojista" id="id_lojista" value="<?php echo $_SESSION['id_usuario']?>">
                       

                    <div class="row">
                            <div class="form-group col-6">
                                <label for="nome">Nome:</label>
                                <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $dados['nome'];?>" required>
                            </div>
                            <div class="form-group col-4">
                                <label for="cnpj">CNPJ:</label>
                                <input class="form-control" type="text" id="cnpj" name="cnpj" value="<?php echo $dados['cnpj'];?>" required>
                                
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="email">Email:</label>
                                <input class="form-control" type="email" id="email" name="email" value="<?php echo $dados['email'];?>" required>
                            </div>
                            <div class="form-group col-4">
                                <label for="telefone">Telefone:</label>
                                <input class="form-control" type="text" id="telefone" name="telefone" value="<?php echo $dados['telefone'];?>" required>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="empresa">nome empresa:</label>
                                <input class="form-control " type="text" id="empresa" name="empresa" value="<?php echo $dados['empresa'];?>" required>
                            </div>
                            <div class="form-group col-2">
                                <label for="id_loja">Loja:</label>
                                <select class="form-control" name="id_loja" id="id_loja">
                                    <option value="<?php echo $dados['id_loja'];?>"><?php echo $dados['localizacao'];?></option>
                                    <?php
                                    foreach ($listaLojas as $lista) :
                                        echo '<option value="' . $lista['id_loja'] . '">' . $lista['localizacao'] . '</option>';

                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                    
                                        
                    <button type="submit" class="btn btn-primary">Salvar</button>


                </form>				

            </div>
        </div>




<?php \Classes\ClassLayout::setFooter(); ?>




