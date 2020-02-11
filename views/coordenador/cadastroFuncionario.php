<?php \Classes\ClassLayout::setHead('Cadastro funcionario', 'Tela de cadastro de novos funcionarios'); ?>



        <div class="card">
            <h5 class="card-header">Cadastro</h5>

            <div class="card-body">
                <h5 class="card-title">Cadastrar novo funcionario</h5>

                <form name="formCadastro" id="formCadastro" action="<?php echo DIRPAGE . 'controller/controllerCadastro'; ?>" method="post">
                    <div class="form-group col-5">
                    <input type="hidden" class="form-control" name="acao" id="acao" value="novoFuncionario">

                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome:" required>
                    </div>

                    <div class="form-group">
                        <label for="mail">Email:</label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="Email:" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="telefone">Telefone:</label>
                        <input class="form-control" type="text" id="telefone" name="telefone" placeholder="Telefone:" required>
                    </div>
                    

                    <div class="form-group">
                        <label for="cpf">cpf:</label>
                        <input class="form-control" type="text" id="cpf" name="cpf" placeholder="cpf:" required>
                    </div>

                    <div class="form-group">
                        <label for="cargo">cargo:</label>
                         <select class="form-control" name="cargo" id="cargo">
                            <option value="coordenador" >Coordenador</option>
                            <option value="encarregado" >Encarregado</option>
                           
                        </select>
                    </div>                    
                   
                    
                    <div class="form-row">
                    <div class="form-group col-5">
                        <label for="senha">senha:</label>
                        <input class="form-control" type="password" id="senha" name="senha" placeholder="Senha:" required>
                    </div>

                    <div class="form-group col-5">
                        <label for="senha">senha conf:</label>
                        <input class="form-control" type="password" id="senhaConf" name="senhaConf" placeholder="Confirmação da Senha:" required>
                    </div>
                        
                    </div>                   
                                        
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    <div class="retornoCad text-danger"> </div>


                </form>				

            </div>
        </div>




<?php \Classes\ClassLayout::setFooter(); ?>



