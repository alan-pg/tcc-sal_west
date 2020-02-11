<?PHP \Classes\ClassLayout::setHeadRestrito(); ?>

<?php
$lista = new Controllers\controllerListar();
$lista = $lista->listarDepartamentos();
$listarDepartamento = $lista->fetchAll(PDO::FETCH_ASSOC);
?>
<?php \Classes\ClassLayout::setHead('Tela principal', 'Tela principal do sistema.'); ?>


        <div class="card">
            <h5 class="card-header">Novo chamado</h5>
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
                <div class="card col-auto">
                  <form name="formChamado" id="formChamado" action="<?php echo DIRPAGE . 'controller/controllerChamado'; ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">

                    </div>
                    
                      <input type="hidden" class="form-control" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION['id_usuario']; ?>">
                      <input type="hidden" class="form-control" name="acao" id="acao" value="novoChamado">

                    <div class="form-group col-sm-12 col-md-12 col-lg-5">
                        <label for="departamento">Departamento</label>
                        <select class="form-control " name="departamento" id="departamento" required="">
                            <option>Selecione o departamento</option>
                            <?php
                            foreach ($listarDepartamento as $lista) :
                                echo '<option value="' . $lista['id_departamento'] . '">' . $lista['nome_departamento'] . '</option>';

                            endforeach;
                            ?>
                        </select>

                    </div>
                    
                    <div class="form-group col-sm-12 col-md-12 col-lg-5">
                        
                        <select class="form-control" name="subCategoria" id="subCategoria" style="display:none"></select> 
                        
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-5">
                        <label for="detalhes">Descrição do chamado:</label>
                        <textarea class="form-control" name="detalhes" id="detalhes" rows="3" required=""></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-5">
                        <label for="imagem">Adicione uma imagem se necessário</label>
                        <input type="file" class="form-control-file" id="imagem" name="imagem">
                    </div>
                      <div class="form-group col">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                      </div>
                </form>
                </div>

            </div>
        </div>
        




<?php \Classes\ClassLayout::setFooter(); ?>
