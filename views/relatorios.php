<?php 
$lista = new Controllers\ControllerListar();

$prev = $lista->listarAgendaPreventiva();

 $f=$prev->fetchAll(PDO::FETCH_ASSOC);
 $hoje= date("Y-m-d");
 $total = 0;
 $atrasados = 0;
 foreach ($f as $agenda): 
     $total++;
     if($agenda['prox_prev'] < $hoje){$atrasados++; }
endforeach;

$novoChamado = $lista->listarChamadosPorStatus("novo");
$chamadoAndamento = $lista->listarChamadosPorStatus("em andamento");
$fn = $novoChamado->fetchAll(PDO::FETCH_ASSOC);
$fa = $chamadoAndamento->fetchAll(PDO::FETCH_ASSOC);
$totalNovo = count($fn);
$totalAndamento = count($fa);

$totalUsurios = $lista->listarTotalUsuarios();

?>
<?php \Classes\ClassLayout::setHead('Tela de relatiros', 'relatios e graficos'); ?>

       <div class="container-fluid">

          <!-- Page Heading -->
          
          <!-- Content Row -->
          <div class="row">
              <!-- Pie Chart chamados -->
            <div class="col-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Chamados</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">chamados:</div>
                      <a class="dropdown-item" target="Frame1" href="chamadosNovos">Novos chamados</a>
                      <a class="dropdown-item" target="Frame1" href="chamadosEmAndamentoEncarregado">Chamados em andamento</a>
                      
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-info "></i> Novo
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Em andmaento
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Aguardando avaliação
                    </span>
                  </div>
                </div>
              </div>
            </div>
              
          <div class="card shadow mb-4 col-6">
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Manutenção preventiva</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">agenda:</div>
                      <a class="dropdown-item" target="Frame1" href="agenda_preventiva">Agenda preventiva</a>
                      
                      
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <div id="manuPrevBar"></div>
                </div>
              </div>
          </div>
              
              
              
              
       
          
          



          <div class="row">

            <!-- <div class="col-xl-12 col-lg-12"> -->
                
              <!-- Area Chart -->
              <div class="card shadow mb-4 col-8">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Chamados reabertos <?php echo date("Y");?></h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>                  
                  
                </div>
              </div>
              
               <!-- Illustrations -->
              <div class="card shadow mb-4 col-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Reabertos por departamento</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                  </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text " for="inputGroupSelect01">Mês</label>
                        </div>
                        <select class="custom-select col-3" id="pages-select">
                            
                            <option value="1" selected>Jan</option>
                            <option value="2">Fev</option>
                            <option value="3">Mar</option>
                            <option value="4">Abr</option>
                            <option value="5">Mai</option>
                            <option value="6">Jun</option>
                            <option value="7">Jul</option>
                            <option value="8">Ago</option>
                            <option value="9">Set</option>
                            <option value="10">Out</option>
                            <option value="11">Nov</option>
                            <option value="12">Dez</option>
                        </select>
                        
                    </div> 
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>Departamento</tr>
                            <tr>QTD</tr>
                        </thead>
                        <tbody id="pages">
                            
                        </tbody>
                    </table>
                    
                    
                    
                </div>
              </div>
               </div>
               <!-- </div> -->
               <div class="row">
              <!-- Bar Chart -->
              <div class="card shadow mb-4 col-6">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Chamados por departamento</h6>
                </div>
                <div class="card-body">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text " for="inputGroupSelect01">Mês</label>
                        </div>
                        <select class="custom-select col-3" id="mes-select">
                            
                            <option value="1" selected>Jan</option>
                            <option value="2">Fev</option>
                            <option value="3">Mar</option>
                            <option value="4">Abr</option>
                            <option value="5">Mai</option>
                            <option value="6">Jun</option>
                            <option value="7">Jul</option>
                            <option value="8">Ago</option>
                            <option value="9">Set</option>
                            <option value="10">Out</option>
                            <option value="11">Nov</option>
                            <option value="12">Dez</option>
                        </select>
                        
                    </div>
                  <div class="chart-bar">
                      <canvas id="myBarChart"></canvas>
                  </div>                  
                    
                </div>
              </div>

            
          
          <!-- Project Card chamados -->
              <div class="card shadow mb-4 col-6">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Chamados</h6>
                  <div class="teste" id="teste"> </div>
                </div>
                <div class="card-body">
                    <div id="testeBar"></div>
                </div>
              </div>

             
               </div>
               <div class="row">
                <div class="card shadow mb-4 col-6">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Avalições</h6>
                  <div class="teste" id="teste"> </div>
                </div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text " for="inputGroupSelect01">Mês</label>
                        </div>
                        <select class="custom-select col-3" id="avalia-select">
                            
                            <option value="1" selected>Jan</option>
                            <option value="2">Fev</option>
                            <option value="3">Mar</option>
                            <option value="4">Abr</option>
                            <option value="5">Mai</option>
                            <option value="6">Jun</option>
                            <option value="7">Jul</option>
                            <option value="8">Ago</option>
                            <option value="9">Set</option>
                            <option value="10">Out</option>
                            <option value="11">Nov</option>
                            <option value="12">Dez</option>
                        </select>
                        
                    </div> 
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>Departamentos</tr>
                            <tr></tr>
                        </thead>
                        <tbody id="avalia-tabela">
                            
                        </tbody>
                    </table>
                    
                    
                </div>
              </div>
               
               
             <div class="card shadow mb-4 col-6">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Cadastrados no sistema</h6>
                  <div class="teste" id="teste"> </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Lojistas
                            <span class="badge badge-primary badge-pill"><a href="views/coordenador/listarLojistas" class="stretched-link text-white"><?php echo $totalUsurios['totalLoj'] ?></a></span>
                        </li>
                         <li class="list-group-item d-flex justify-content-between align-items-center">
                            Solicitação de acesso
                            <span class="badge badge-primary badge-pill"><a href="views/coordenador/listaSolicitacaoAcesso" class="stretched-link text-white"><?php echo $totalUsurios['totalNov'] ?></a></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Encarregados
                            <span class="badge badge-primary badge-pill"><a href="views/coordenador/listarFuncionarios" class="stretched-link text-white"><?php echo $totalUsurios['totalFun'] ?></a></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Colaboradores
                            <span class="badge badge-primary badge-pill"><a href="views/coordenador/colaboradores" class="stretched-link text-white"><?php echo $totalUsurios['totalCol'] ?></a></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Lojas
                            <span class="badge badge-primary badge-pill"><a href="views/coordenador/lojas" class="stretched-link text-white"><?php echo $totalUsurios['totalLojas'] ?></a></span>
                        </li>
                    </ul>
                    
                   
                    
                </div>
              </div>
               </div>
       </div>
               
       
        

    <script src="lib/vendor/jquery/jquery.min.js"></script>
        <script src="lib/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="lib/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="lib/js/sb-admin-2.min.js"></script>
        
        <script src="lib/js/javascript.js"></script>
        
        <script src="lib/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="lib/vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="lib/js/demo/datatables-demo.js"></script>
        <script src="lib/vendor/chart.js/Chart.min.js"></script>
        <script src="lib/js/demo/chart-area-demo.js"></script>
        <script src="lib/js/demo/chart-pie-demo.js"></script>
        <script src="lib/js/demo/chart-bar-demo.js"></script>




        </body>
        </html>
