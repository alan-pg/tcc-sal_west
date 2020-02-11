<?php \Classes\ClassLayout::setHead('Novo informativo', 'Tela para criar novo informativo.'); ?>
<?php 

$lista = new Controllers\ControllerListar();
$informativos = $lista->listarInformativosAtivos(date("Y-m-d"));
$listaInfo = $informativos->fetchAll(PDO::FETCH_ASSOC);
?>


<table class="table">
  <thead>
    <tr>
      
      <th scope="col">assunto</th>
    <th scope="col">Visualizar</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($listaInfo as $lista) : ?>
    <tr>
      
      <td class="col-10"><?php echo $lista['assunto']; ?></td>      
      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $lista['id_informativo']; ?>">
  <i class="fas fa-eye"></i>
</button> </td>      
    </tr>
    
    <div class="modal fade" id="exampleModal<?php echo $lista['id_informativo']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
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
      
    </div>
  </div>
</div>
    
 <?php endforeach; ?>
    
  </tbody>
</table>

<?php \Classes\ClassLayout::setFooter(); ?>
