<?php \Classes\ClassLayout::setHead('Cadastro', 'Tela de cadastro'); ?>

<?php
$lista = new Controllers\controllerListar();
$listaLojas = $lista->listarLojas();

//$listarLoja = $lista->fetchAll(PDO::FETCH_ASSOC);
?>

        <div class="card">
            <h5 class="card-header">Cadastro</h5>

            <div class="card-body">
                <h5 class="card-title">Cadastrar novo lojista</h5>

                <form name="formCadastro" id="formCadastro" action="<?php echo DIRPAGE . 'controller/controllerCadastro'; ?>" method="post">
                    <div class="form-group col-5">
                        <input type="text" class="form-control" name="acao" id="acao" value="novoLojista">
                        <input type="text" class="form-control" name="status" id="status" value="ativo">

                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome:" required>
                    </div>

                    <div class="form-group">
                        <label for="mail">Email:</label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="Email:" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="telefone">Telefone:</label>
                        <input class="form-control" type="text" id="telefone" name="telefone" placeholder="Telefone:" required>
                    </div>
                    

                    <div class="form-group">
                        <label for="cnpj">CNPJ:</label>
                        <input class="form-control" type="text" id="cnpj" name="cnpj" placeholder="CNPJ:" required>
                    </div>

                    <div class="form-group">
                        <label for="empresa">nome empresa:</label>
                        <input class="form-control" type="text" id="empresa" name="empresa" placeholder="empresa:" required>
                    </div>
                        <div class="form-group">
                         <label for="id_loja">Loja:</label>
                         <select class="form-control" name="id_loja" id="id_loja">
                            
                            <?php
                            foreach ($listaLojas as $lista) :
                                echo '<option value="' . $lista['id_loja'] . '">' . $lista['localizacao'] . '</option>';

                            endforeach;
                            ?>
                        </select>
                        </div>
                           
                   
                    
                    <div class="form-row">
                    <div class="form-group col-5">
                        <label for="senha">senha:</label>
                        <input class="form-control" type="password" id="senha" name="senha" placeholder="Senha:" required>
                    </div>

                    <div class="form-group col-5">
                        <label for="senha">senha conf:</label>
                        <input class="form-control" type="password" id="senhaConf" name="senhaConf" placeholder="Confirmação da Senha:" required>
                    </div>
                        
                    </div>                   
                                        
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    <div class="retornoCad text-danger"> </div>


                </form>				

            </div>
        </div>




<?php \Classes\ClassLayout::setFooter(); ?>



