<?PHP \Classes\ClassLayout::setHeadRestrito(); ?>

<!DOCTYPE html>
<html lang="pt_Br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title></title>

        

    </head>
    <body style="background-color: #ffffff">
        <div class="container" >
            <div class="row">
                <div class="jumbotron">
                    <h3>Tela home do sistema </h3>
                    <p> dados da sessão: </p>
                    <p><?php echo $_SESSION['name']; ?></p>
                    <p><?php echo $_SESSION['login']; ?></p>
                    <p><?php echo $_SESSION['time']; ?></p>
                    <p><?php echo $_SESSION['email']; ?></p>
                    <p><?php echo $_SESSION['id_usuario']; ?></p>
                    <p><?php echo $_SESSION['permition']; ?></p>
                    
                     
       
        
                    

                </div>
            </div>
        </div>
    </body>
</html>
