<?php
require (dirname(__FILE__) . '/layout/header.php');
require dirname(__FILE__) . '/controller/BeanCliente.class.php';
BeanCliente::autentica($_REQUEST);
?>

<div class="container">

    <!-- Corpo da página -->
    <div class="container">
       
        <div class="col-md-12">
 <ol class="breadcrumb"><strong>Você está em:</strong> <li>Camino 1</li><li>Caminho 2 </li><li>Caminho 3</li></ol>
            <div class="row">
                <div class="col-md-6">
                    <div class='thumbnail center'>
                        Login
                        
                       <form action="<?php echo $_SERVER['SCRIPT_NAME'];?>" method="POST">
                        <label class="label label-info" for="email">Email:</label> 
                        <input type="text" name="email"/><br>
                        <label class="label label-info" for="senha"> Senha:</label>
                        <input type="password" name="senha"/><br>
                        <button class="btn btn-success" type="submit">Login</button>
                    </form>
                    </div>
                </div>

         
            <div class="col-md-6">
                <div class='thumbnail center'>
                    Cadastro
                    
                    Usuario:
                    Senha:

                </div>

            </div>
        </div>
    </div>


    <!-- Barra lateral direita -->
</div>

</div>

<?php
include (dirname(__FILE__) . '/layout/footer.php');
?>

