<?php \Classes\ClassLayout::setHead('Novo informativo', 'Tela para criar novo informativo.'); ?>
<?php 

$lista = new Controllers\ControllerListar();
$informativos = $lista->listarInformativosAtivos(date("Y-m-d"));
$listaInfo = $informativos->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <br>


<a data-toggle="modal" data-target="#novoInfo" href="#" class="btn btn-primary btn-icon-split" >
    <span class="icon text-white-50">
        <i class="fas fa-reply-all"></i>
    </span>
    <span class="text">Novo informativo</span>
</a>

<!-- Modal CRIAR NOVO INFORMATIVO-->
<div class="modal fade" id="novoInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informativos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card">
    <div class="card-body">
        <form name="formInformativo" id="formInformativo" action="<?php echo DIRPAGE . 'controller/contollerInformativos'; ?>" method="post">
            <input type="hidden" class="form-control" name="acao" id="acao" value="novoInformativo">

            <div class="form-group">
                <label for="assunto">Assunto</label>
                <input type="text" class="form-control" id="assunto" name="assunto"  placeholder="Assunto" required>

            </div>
            <div class="form-group">
                <label for="mensagem">Mensagem</label>
                <textarea class="form-control" id="mensagem" name="mensagem" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="data_expiracao">Data expiração</label>
                <input class="form-control col-5" id="data_expiracao" name="data_expiracao" type="date" min="<?php echo date("Y-m-d"); ?>" max="<?php echo date('Y-m-d', strtotime('+1 year')); ?>" value="<?php echo date("Y-m-d"); ?>" required>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i></button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i></button>
            </div>
        </form>
    </div>
</div>
      </div>      
    </div>
  </div>
</div>
<!-- FIM MODAL CRIAR INFORMATIVO -->

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">assunto</th>
    <th scope="col">Visualizar</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($listaInfo as $lista) : ?>
      <tr>
              <th scope="row"><?php echo $lista['id_informativo']; ?></th>
              <td class="col-5"><?php echo $lista['assunto']; ?></td>      
              <td class=""><div class="row"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="
                                        #exampleModal<?php echo $lista['id_informativo']; ?>"> <i class="fas fa-eye"></i> 
                          </button>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="
                                        #editarInfo<?php echo $lista['id_informativo']; ?>"><i class="far fa-edit"></i></i>
                      </button></div>
              </td> 
      </tr>
    <!-- MODAL VISUALIZAR INFORMATIVO -->
    <div class="modal fade" id="exampleModal<?php echo $lista['id_informativo']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $lista['assunto']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <div class="modal-body">
          <p><?php echo $lista['conteudo']; ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i></button>
        
      </div>
    </div>
  </div>
</div>
    <!-- FIM MODAL VISUALIZAR INFORMATIVO-->

    <!-- MODAL EDITAR IFORMATIVO -->
    <div class="modal fade" id="editarInfo<?php echo $lista['id_informativo']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Informativos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <form name="formInformativo" id="formInformativo" action="<?php echo DIRPAGE . 'controller/contollerInformativos'; ?>" method="post">
                                    <input type="hidden" class="form-control" name="acao" id="acao" value="editarInformativo">
                                    <input type="hidden" class="form-control" name="id_informativo" id="id_informativo" value="<?php echo $lista['id_informativo']; ?>">

                                    <div class="form-group">
                                        <label for="assunto">Assunto</label>
                                        <input type="text" class="form-control" id="assunto" name="assunto"  value="<?php echo $lista['assunto']; ?>" required>

                                    </div>
                                    <div class="form-group">
                                        <label for="mensagem">Mensagem</label>
                                        <textarea class="form-control" id="mensagem" name="mensagem" rows="3"  required ><?php echo $lista['conteudo']; ?></textarea>
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="data_expiracao">Data expiração</label>
                                        <input class="form-control col-5" id="data_expiracao" name="data_expiracao" type="date" min="<?php echo date("Y-m-d"); ?>" max="<?php echo date('Y-m-d', strtotime('+1 year')); ?>" value="<?php echo $lista['data_expiracao']; ?>" required>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i></button>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>      
                </div>
            </div>
        </div>
    
    <!-- FIM MODAL EDITAR INFORMATIVO-->

 <?php endforeach; ?>
    
  </tbody>
</table>
</div>
<?php \Classes\ClassLayout::setFooter(); ?>