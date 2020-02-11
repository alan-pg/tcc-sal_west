<?php \Classes\ClassLayout::setHead('agendar manutenção preventiva', 'Tela de agendamento'); ?>
<?php
$lista = new Controllers\ControllerListar();

$lojas = $lista->listarLojas();
$listarLojas = $lojas->fetchAll(PDO::FETCH_ASSOC);

$prev = $lista->listarTipoPreventiva();
$listaPrev = $prev->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Novo agendamento</h5>
                                    <div class="retornoCad text-danger"> </div>
                                </div>
                                <div class="card-body">                                                                                                               
                                      
                                    
                                <form name="formAgendar" id="formAgendar" action="<?php echo DIRPAGE . 'controller/controllerPreventiva'; ?>" method="post">
                                    <input type="hidden" class="form-control" name="acao" id="acao" value="agendarNovo">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="id_loja">Loja:</label>
                                            <select class="form-control" name="id_loja" id="id_loja">
                                            <option>Selecione a loja</option>
                                            <?php
                                            foreach ($listarLojas as $lista) :
                                                echo '<option value="' . $lista['id_loja'] . '">' . $lista['localizacao'] . '</option>';
                                            endforeach;
                                            ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-6">
                                            <label for="id_manutencao_prev">Tipo preventiva:</label>
                                            <select class="form-control" name="id_manutencao_prev" id="id_manutencao_prev">
                                            <option>Selecione a manutenção preventiva</option>
                                            <?php
                                            foreach ($listaPrev as $lista) :
                                                echo '<option value="' . $lista['id_preventiva'] . '">' . $lista['nome_preventiva'] . '</option>';
                                            endforeach;
                                            ?>
                                            </select>    
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group col-6">
                                        
                                        <label for="ultima_prev"> Última manutenção preventiva:</label>
                                        <input class="form-control col-6" id="ultima_prev" name="ultima_prev" type="date" max="<?php echo date("Y-m-d"); ?>" >
                                    </div>
                                    
                                    <div class="form-group col-6">
                                        
                                        <label for="prox_prev"> Data proxima preventiva:</label>
                                        <input class="form-control col-6" id="prox_prev" name="prox_prev" type="date" min="<?php echo date("Y-m-d"); ?>" required="">
                                    </div>
                                        
                                    </div>
                                    <div>
                                        <input type="checkbox" id="dataNull" name="dataNull">
                                        <label for="dataNull">Não existe ultima manutenção preventiva</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">OK</button>
                                    
                                </form>
                                </div>
                            </div> 



<?php \Classes\ClassLayout::setFooter(); ?>
