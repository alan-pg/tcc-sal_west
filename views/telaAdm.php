<!-- telaAdm.php -->
<?PHP \Classes\ClassLayout::setHeadRestrito(); ?>

<?php \Classes\ClassLayout::setHead('Tela principal', 'Tela principal do sistema.'); ?>


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    
    <?php
    if ($_SESSION['permition'] == "lojista") {include_once 'menuLojista.php'; $home="lojista/listarChamadosLojista";}
    if ($_SESSION['permition'] == "encarregado") {include_once 'menuManutencao.php';$home="chamadosNovos";}
    if ($_SESSION['permition'] == "coordenador") {include_once 'menuCoordenador.php';$home="relatorios";}

    ?>
    
       
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">




      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button> 






          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>

              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>



       



            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['name']; ?></span>
                <img class="img-profile rounded-circle" src="img/user.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php if($_SESSION['permition'] == "lojista" ){?>
                <a class="dropdown-item" target="Frame1" href="lojista/dadosLojista">
                  <i class="fas fa-user"></i>
                  Meus dados
                </a>
                  <a class="dropdown-item" target="Frame1" href="lojista/alterarDadosLojista">
                  <i class="fas fa-user-edit"></i>
                  Editar
                </a>
                  <a class="dropdown-item" target="Frame1" href="lojista/alterarSenha">
                  <i class="fas fa-user-cog"></i>
                 Alterar senha
                </a>
                <?php } ?>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal" >
                 <i class="fas fa-sign-out-alt"></i>
                  Sair
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">


         
        <!-- dashboard -->
        
        <?php 
        if($_SESSION['permition']=="manutencao"){ 
            include_once 'dashboard.php'; 
            
        }?>

         
          
          

          <!-- Content Row -->
          <div class="row">
              <div class="col-lg-12 col-md-12 col-lg-12">
                  <br>
                  <iframe name="Frame1"  style="border:none" onscroll="auto" src="<?php echo $home?>" width="100%" height="2000px"></iframe> 
              </div>
              
          </div>

         

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pronto para sair?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione "Logout" para encerrar sua sessão.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="controller/controllerLogout">Logout</a>
        </div>
      </div>
    </div>
  </div>

 

		
<?php \Classes\ClassLayout::setFooter(); ?>
