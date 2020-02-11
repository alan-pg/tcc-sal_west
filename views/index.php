<?php \Classes\ClassLayout::setHead('Homepage', 'Essa é a home page do nosso site.', 'Alan Goncalves'); ?>

<body class="bg-gradient-secondary">


  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center ">
            <!--  <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">LOGIN LOJISTA</h1>
                  </div>
                  
                    <form class ="user" name="formLogin" id="formLogin" action="<?php echo DIRPAGE . 'controller/controllerLogin'; ?>" method="post">

                        <input type="hidden" class="form-control" name="acao" id="acao" value="loginLojista">

                        <div class="resultadoForm float w100 center"></div>

                        <div class="form-group">
                            <input class="form-control form-control-user" type="email" name="email" id="email" placeholder="Email:" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-user" type="password" name="senha" id="senha" placeholder="Senha:" required>   
                        </div>
                        
                        <div class="form-group">
                            <button class="btn btn-primary btn-user btn-block" type="submit" value="Entrar">Entrar</button>
                        </div>

                    </form>
                  <hr>
                  <div class="text-center">
                      <a class="small" href="resetSenha">Esqueci minha senha</a>
                  </div>
                  <div class="text-center">
                      <a class="small" href="solicitarAcesso">Solicitar acesso</a>
                  </div>
                  
                  <div class="text-center">
                      <a class="small" href="loginFuncionario">login funcionário</a>
                  </div>
                  <div class="retornoCad"> </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
<?php \Classes\ClassLayout::setFooter(); ?>
