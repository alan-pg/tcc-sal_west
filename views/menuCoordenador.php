<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
         <img src="/tcc/img/logosal.png" alt="...">
        </div>
        
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          
          <span>Menu coordenador</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Pedidos
      </div>

     

     <!-- Nav Item - Chamados Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-list-ul"></i>
          <span>Chamados</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Chamados</h6>
            <a class="collapse-item" target="Frame1" href="chamadosNovos">Novos chamados</a>
            <a class="collapse-item" target="Frame1" href="chamadosEmAndamentoEncarregado">Chamados em andamento</a>
            <a class="collapse-item" target="Frame1" href="chamadosFinalizados">Chamados finalizados </a>
          </div>
        </div>
      </li>
      
         <!-- Nav Item - Manutenção preventiva Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePreventiva" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-list-ul"></i>
          <span>Manutenção preventiva</span>
        </a>
        <div id="collapsePreventiva" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Preventiva</h6>            
            <a class="collapse-item" target="Frame1" href="agenda_preventiva">Agenda de manutanção</a>
            <a class="collapse-item" target="Frame1" href="historico_preventiva">Histórico de manutenção</a>
          </div>
        </div>
      </li>



      

      <!-- Divider -->
      <hr class="sidebar-divider">




      <!-- Heading -->
      <div class="sidebar-heading">
        Usuários
      </div>
      
         <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLojistas" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-users-cog"></i>
          <span>Lojistas</span>
        </a>
        <div id="collapseLojistas" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Lojistas</h6>            
            <a class="collapse-item" target="Frame1" href="views/coordenador/cadastroLojista">Novo lojista</a>
            <a class="collapse-item" target="Frame1" href="views/coordenador/listaSolicitacaoAcesso">Solicitação de acesso</a>
            <a class="collapse-item" target="Frame1" href="views/coordenador/listarLojistas">Listar lojistas</a>
          </div>
        </div>
      </li>
      
          <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFuncionarios" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-users-cog"></i>
          <span>Funcionários</span>
        </a>
        <div id="collapseFuncionarios" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Funcionários</h6>            
            <a class="collapse-item" target="Frame1" href="views/coordenador/cadastroFuncionario">Novo funcionário</a>
            <a class="collapse-item" target="Frame1" href="views/coordenador/listarFuncionarios">Listar funcionários</a>
          </div>
        </div>
      </li>

       <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
       Configurações
      </div>
      
         <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseConfig" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Configurações</span>
        </a>
        <div id="collapseConfig" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Configurações</h6>            
            <a class="collapse-item" target="Frame1" href="views/coordenador/colaboradores">Colaboradores</a>
            <a class="collapse-item" target="Frame1" href="views/coordenador/lojas">Lojas</a>
            <a class="collapse-item" target="Frame1" href="views/coordenador/config_preventiva">Manutenção preventiva</a>
            <a class="collapse-item" target="Frame1" href="views/coordenador/sub_departamento">Serviços</a>
          </div>
        </div>
      </li>
      
         <li class="nav-item">
           <a class="nav-link" target="Frame1" href="informativos">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Informativos</span></a>
      </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Relatórios
        </div>
      <li class="nav-item">
            <a class="nav-link" target="Frame1" href="relatorios">
                <i class="fas fa-chart-line"></i>
                <span>Relatórios</span></a>
        </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
        
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

