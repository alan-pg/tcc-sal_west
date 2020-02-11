
<?php \Classes\ClassLayout::setHead('Cadastro', 'Tela de cadastro'); ?>



        <div class="card">
            <h5 class="card-header">Configuraçao de departamentos</h5>

            <div class="card-body">
                <h5 class="card-title">Cadastrar departamentos</h5>

                <form name="formSubDepartamento" id="formSubDepartamento" action="<?php echo DIRPAGE . 'controller/controllerServico'; ?>" method="post">
                    <div class="form-group col-5">
                        <input type="hidden" class="form-control" name="acao" id="acao" value="novo_departamento">

                    

                    <div class="form-group">
                        <label for="departamento">novo departamento:</label>
                        <input class="form-control" type="text" id="departamento" name="departamento" placeholder="subCategoria:" required>
                    </div>                
                    
                                        
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    


                </form>				

            </div>
        </div>




<?php \Classes\ClassLayout::setFooter(); ?>



