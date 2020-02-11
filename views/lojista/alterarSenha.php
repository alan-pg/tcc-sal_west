<?PHP \Classes\ClassLayout::setHeadRestrito(); ?>
<?php \Classes\ClassLayout::setHead('Alterar senha', 'tela de alteração de senha'); ?>

<div class="card col-10">
        
        
            <h5 class="card-header">Alterar senha</h5>

            <div id="solicita" name="solicita" class="card-body col">
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
                <h5 class="card-title">Dados do lojista</h5>

                <form name="formAlterSenhaLojista" id="formAlterSenhaLojista" action="<?php echo DIRPAGE . 'controller/controllerCadastro'; ?>" method="post">
                   
                    <input type="hidden" class="form-control" name="acao" id="acao" value="alterSenhaLojista">
                    <input type="hidden" class="form-control" name="email" id="email" value="<?php echo $_SESSION['email']?>">
                    <input type="hidden" class="form-control" name="id_lojista" id="id_lojista" value="<?php echo $_SESSION['id_usuario']?>">
                        

                    <div class="form-group col-4">
                        <label for="senha">senha atual:</label>
                        <input class="form-control" type="password" id="senha" name="senha" placeholder="Senha:" required>
                    </div>
                    
                    <div class="form-row">
                    <div class="form-group col-4">
                        <label for="senha">Nova senha:</label>
                        <input class="form-control" type="password" id="nova_senha" name="nova_senha" placeholder="Senha:" required>
                    </div>

                    <div class="form-group col-4">
                        <label for="senhaConf">confirmar nova senha:</label>
                        <input class="form-control" type="password" id="senhaConf" name="senhaConf" placeholder="Confirmação da Senha:" required>
                    </div>
                        
                    </div>                   
                                        
                    <button type="submit" class="btn btn-primary">Alterar</button>
                    


                </form>				

            </div>
            <div class="retornoCad"> </div>
        </div>
<?php \Classes\ClassLayout::setFooter(); ?>