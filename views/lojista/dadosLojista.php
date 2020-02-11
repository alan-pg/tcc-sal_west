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
            <h5 class="card-header">Meus dados</h5>

            <div class="card-body">
                
                    <div class="form-group col">
                        
                    <div class="row">
                            <div class="form-group col-6">
                                <label for="nome">Nome:</label>
                                <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $dados['nome'];?>" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label for="cnpj">CNPJ:</label>
                                <input class="form-control" type="text" id="cnpj" name="cnpj" value="<?php echo $dados['cnpj'];?>" readonly>
                                
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="email">Email:</label>
                                <input class="form-control" type="email" id="email" name="email" value="<?php echo $dados['email'];?>" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label for="telefone">Telefone:</label>
                                <input class="form-control" type="text" id="telefone" name="telefone" value="<?php echo $dados['telefone'];?>" readonly>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="empresa">nome empresa:</label>
                                <input class="form-control " type="text" id="empresa" name="empresa" value="<?php echo $dados['empresa'];?>" readonly>
                            </div>
                            <div class="form-group col-2">
                                <label for="id_loja">Loja:</label>
                                <input class="form-control " type="text" id="id_loja" name="id_loja" value="<?php echo $dados['localizacao'];?>" readonly>
                                
                            </div>
                        </div>
                    
            </div>
        </div>




<?php \Classes\ClassLayout::setFooter(); ?>




