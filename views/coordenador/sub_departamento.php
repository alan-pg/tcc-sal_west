<?php
$listaDep = new Controllers\controllerListar();
$lista = $listaDep->listarDepartamentos();
$listarDepartamento = $lista->fetchAll(PDO::FETCH_ASSOC);
?>
<?php \Classes\ClassLayout::setHead('Cadastro', 'Tela de cadastro'); ?>



        <div class="card">
            <h5 class="card-header">Configuraçao de departamentos</h5>

            <div class="card-body">
                <h5 class="card-title">Cadastrar serviço</h5>

                <form name="formSubDepartamento" id="formSubDepartamento" action="<?php echo DIRPAGE . 'controller/controllerServico'; ?>" method="post">
                    <div class="form-group col-5">
                        <input type="hidden" class="form-control" name="acao" id="acao" value="novoSub_departamento">

                    <div class="form-group">
                        <select class="form-control" name="departamento" id="departamento">
                            <option>Selecione o departamento</option>
                            <?php
                            foreach ($listarDepartamento as $lista) :
                                echo '<option value="' . $lista['id_departamento'] . '">' . $lista['nome_departamento'] . '</option>';

                            endforeach;
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="mail">novo serviço:</label>
                        <input class="form-control" type="text" id="subCategoria" name="subCategoria" placeholder="subCategoria:" required>
                    </div>                
                    
                                        
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    


                </form>				

            </div>
        </div>




<?php \Classes\ClassLayout::setFooter(); ?>



