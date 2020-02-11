<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">


      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="">
            
            
            <img srcset="/tcc/img/logosal-crop.png 300w,
	     /tcc/img/logosal-crop.png 400w,
	     /tcc/img/logosal-crop.png 600w,	     
	     /tcc/img/logosal.png 800w"
     sizes="(max-width: 799px) 100vw, (min-width: 800px) 800px"
     src="/tcc/img/logosal-crop.png.jpg">
            
          
          
          
          
          
        </div>
       
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
         
          <span>Menu lojista</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      

       <!-- Nav Item - Chamados Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-align-justify"></i>
          <span>Chamados</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Chamados</h6>
            <a class="collapse-item" target="Frame1" href="views/lojista/novoChamado">Novo chamado</a>
            <a class="collapse-item" target="Frame1" href="<?php echo DIRPAGE . 'views/lojista/listarChamadosLojista'; ?>">Meus chamados</a>
            <a class="collapse-item" target="Frame1" href="views/lojista/chamadosEncerradosLojista">Encerrados </a>
          </div>
        </div>
      </li>
      
  

      <!-- Divider -->
      <hr class="sidebar-divider">




      

      

      <li class="nav-item">
          <a class="nav-link" target="Frame1" href="views/lojista//informativosLojista">
          <i class="far fa-comment-dots"></i>
          <span>Informativos</span></a>
      </li>

      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
