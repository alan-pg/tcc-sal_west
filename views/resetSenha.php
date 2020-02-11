<?php \Classes\ClassLayout::setHead('Reset senha', 'reset senha padrao'); ?>

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
                    <h1 class="h4 text-gray-900 mb-4">Reset senha</h1>
                  </div>
                    <div id="reset" name="reset">
                    <form class ="user" name="formReset" id="formReset" action="<?php echo DIRPAGE . 'controller/controllerResetSenha'; ?>" method="post">

                        <input type="hidden" class="form-control" name="acao" id="acao" value="resetSenha">

                        <div class="resultadoForm float w100 center"></div>

                        <div class="form-group">
                            <input class="form-control form-control-user" type="email" name="email" id="email" placeholder="Email:" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-user" type="text" name="cnpj" id="cnpj" placeholder="cnpj:" required>   
                        </div>
                        
                        <div class="form-group">
                            <button class="btn btn-primary btn-user btn-block" type="submit" value="Entrar">Reset</button>
                        </div>

                    </form>
                    </div>
                    <div class="retornoCad"> </div>
                  <hr>
                  
                  <div class="text-center">
                      <a class="small" href="index">Login</a>
                  </div>
                  
                  
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
<?php \Classes\ClassLayout::setFooter(); ?>

