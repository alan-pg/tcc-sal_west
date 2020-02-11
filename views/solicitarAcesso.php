<?php \Classes\ClassLayout::setHead('solicitar acesso', 'tela de solicitacao de acesso'); ?>
<?php
$lista = new Controllers\controllerListar();
$listaLojas = $lista->listarLojas();

//$listarLoja = $lista->fetchAll(PDO::FETCH_ASSOC);
?>
<body class="bg-gradient-secondary">
<div class="container justify-content-center">
    <br>
    <div class="row justify-content-center">
    <div class="card col-10">
        
        
            <h5 class="card-header">Solicitar acesso</h5>

            <div id="solicita" name="solicita" class="card-body col">
                <h5 class="card-title">Dados do lojista</h5>

                <form name="formAcesso" id="formAcesso" action="<?php echo DIRPAGE . 'controller/controllerSolicitarAcesso'; ?>" method="post">
                   
                        <input type="hidden" class="form-control" name="acao" id="acao" value="solicitaAcesso">
                        <input type="hidden" class="form-control" name="status" id="status" value="novo">

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="nome">Nome:</label>
                                <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome:" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="cnpj">CNPJ:</label>
                                <input class="form-control" type="text" id="cnpj" name="cnpj" placeholder="CNPJ:" required>
                                
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="email">Email:</label>
                                <input class="form-control" type="email" id="email" name="email" placeholder="Email:" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="telefone">Telefone:</label>
                                <input class="form-control" type="text" id="telefone" name="telefone" placeholder="Telefone:" required>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="empresa">nome empresa:</label>
                                <input class="form-control " type="text" id="empresa" name="empresa" placeholder="empresa:" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="id_loja">Loja:</label>
                                <select class="form-control" name="id_loja" id="id_loja">

                                    <?php
                                    foreach ($listaLojas as $lista) :
                                        echo '<option value="' . $lista['id_loja'] . '">' . $lista['localizacao'] . '</option>';

                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                    
                    <div class="form-row">
                    <div class="form-group col-4">
                        <label for="senha">senha:</label>
                        <input class="form-control" type="password" id="senha" name="senha" placeholder="Senha:" required>
                    </div>

                    <div class="form-group col-4">
                        <label for="senhaConf">senha conf:</label>
                        <input class="form-control" type="password" id="senhaConf" name="senhaConf" placeholder="Confirmação da Senha:" required>
                    </div>
                        
                    </div>                   
                                        
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    


                </form>				

            </div>
            <div class="retornoCad"> </div>
        </div>
    </div>
        
    
    
    
    
    
    
    
    
</div>





<?php \Classes\ClassLayout::setFooter(); ?>